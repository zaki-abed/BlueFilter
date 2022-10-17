<?php

namespace App\Http\Controllers\API;

use App\Http\APIResources\AdsResource;
use Auth;
use Validator;
use App\Models\City;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\Review;
use GuzzleHttp\Client;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Category;
use App\Models\UserRequest;
use App\Models\ContactQuery;
use Illuminate\Http\Request;
use App\Models\PushNotification;
use Illuminate\Support\Facades\File;
use App\Models\ServiceProviderClicks;
use Intervention\Image\Facades\Image;
use App\Http\APIResources\PageResource;
use App\Http\APIResources\PostResource;
use App\Models\ServiceProviderResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\APIResources\PostsResource;
use Illuminate\Database\Eloquent\Builder;
use App\Http\APIResources\CategoryResource;
use App\Http\APIResources\CategoriesResource;
use App\Models\Ads;
use App\Http\Controllers\API\BaseController;
use App\Notifications\UserRequestNotification;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rule;

class MiscController extends BaseController
{
    public function getAllCities()
    {
        return City::get()->makeHidden(['City_Name_Ar', 'City_Name_En', 'created_at', 'countries']);
    }

    public function getAllCountries()
    {

        $response = [];
        $response['country'] = Country::with('city')->get()->makeHidden(['Country_Name_Ar', 'Country_Name_En', 'created_at']);
        foreach ($response['country'] as $country) {
            $r = $country->city->makeHidden(['countries', 'country_name', 'created_at', 'City_Name_En', 'City_Name_Ar', 'Country_ID']);
        }
        //$response['cities']= City::where('Country_ID' , $response['country']->Country_ID)->get()->makeHidden(['City_Name_Ar' , 'City_Name_En' , 'Country_ID' , 'country_name' ,'countries','created_at']);
        return $response;
    }

    public function contact(Request $request)
    {

        $validator = Validator::make($request->only(['name', 'email', 'subject', 'message']), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'max:255',
            'message' => 'required'
        ]);

        if ($validator->fails())
            return $this->sendError(__('Validation error.'), $validator->errors(), 400);

        ContactQuery::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return $this->sendResponse([], __('Query received successfully'));
    }

    public function service_provider_click(Request $request)
    {
        $validator = Validator::make($request->only(['id']), ['id' => 'required']);

        if ($validator->fails())
            return $this->sendError(__('Validation error.'), $validator->errors(), 400);

        $clicks = ServiceProviderClicks::firstWhere('service_provider_id', $request->id);

        if (!$clicks) {
            ServiceProviderClicks::create(['service_provider_id' => $request->id, 'click_count' => 1]);
        } else {
            $clicks->click_count++;
            $clicks->save();
        }


        return $this->sendResponse([], __('click received successfully'));
    }

    public function createRequest(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'service_provider_id' => 'required',
                'comment' => 'required',
                'image' => 'nullable|file|mimes:jpeg,jpg|max:8096',
            ],
            [
                'service_provider_id.required' => __('messages.api.service_provider_required'),
                'comment.required' => __('messages.api.comment_required'),
            ]
        );

        if ($validator->fails())
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);

        $hasOldRequests = UserRequest::where([
            'User_ID' => $request->user()->id,
            'Service_Provider_ID' => $request->service_provider_id,
            'Request_Status' => 0,
        ])->exists();
        if ($hasOldRequests) {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.twice_error'), 409);
        }

        $user = User::where('id', $request->service_provider_id)->where('id', '!=', $request->user()->id)->first();
        if (empty($user) || !$user->isServiceProvider()) {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.service_provider_not_found'), 400);
        }


        $user_request = new UserRequest();
        $user_request->Request_Comment = $request->comment;
        $user_request->Service_Provider_ID = $request->service_provider_id;
        $user_request->User_ID = $request->user()->id;
        $user_request->Request_Status = 0;

        if ($request->hasFile('image')) {
            $user_request->image = img_upload($request->file('image'), 'requests/');
        }

        $user_request->save();

        $user->notify(new UserRequestNotification(__('messages.api.request_created')));

        if ($user->firebase_token != null) {

            $response = $this->sendNotification($user, $request, __('messages.api.request_created'));

            if ($response) {
                $this->sendResponse('notification-sent', ['message' => __('messages.notifications.created')]);
            } else {
                $this->sendError('notification-error', ['message' => __('messages.notifications.not_created')]);
            }
        }

        return $this->sendResponse([], __('messages.api.request_sent'));
    }

    public function createResponse(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_request_id' => 'required',
                'comment' => 'required',
                'status' => 'required|in:1,2',
            ],
            [
                'user_request_id.required' => __('messages.api.user_request_id'),
                'comment.required' => __('messages.api.comment_required'),
                'status.required' => __('messages.Validation.Status'),
                'status.in' => __('messages.Validation.Status_range'),

            ]
        );

        if ($validator->fails())
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);


        if ($userrequest = UserRequest::where('Request_id', $request->user_request_id)->first()) {
            try {
                $response = new ServiceProviderResponse();
                $response->Response_Comment = $request->comment;
                $response->Service_Provider_ID = $request->user()->id;
                $response->User_Request_ID = $request->user_request_id;
                $response->save();

                $userrequest->Request_Status = $request->status;
                $userrequest->save();

                $userrequest->user->notify(new UserRequestNotification(__('messages.api.response_created')));

                if ($userrequest->user->firebase_token != null) {

                    $response = $this->sendNotification($userrequest->user, $request, __('messages.api.response_created'));
                    if ($response) {
                        $this->sendResponse('notification-sent', ['message' => __('messages.notifications.created')]);
                    } else {
                        $this->sendError('notification-error', ['message' => __('messages.notifications.not_created')]);
                    }
                }

                return $this->sendResponse([], __('messages.api.response_sent'));
            } catch (\Exception $ex) {
                return $this->sendError(__('messages.api.validation_error'), __('messages.api.twice_response'), 400);
            }
        } else {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.user_request_id'), 400);
        }
    }

    public function outgoingRequests(Request $request)
    {
        if ($request->user()->type != 'customer') {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.no_authorized'), 400);
        } else {
            $user_request = UserRequest::where('User_ID', $request->user()->id)->with('service_provider')->get();
            if ($user_request->isNotEmpty()) {
                foreach ($user_request as $req) {
                    $req->response = $req->response;
                    $req->service_provider->rating_avg = $req->service_provider->rating_avg;
                }
            }

            if (count($user_request) == 0) {
                return $this->sendResponse($user_request, __('messages.request.no_request'), 200);
            } else {
                return $this->sendResponse($user_request, __('messages.request.request_count') . count($user_request), 200);
            }
        }
    }

    public function incomingRequests(Request $request)
    {
        if ($request->user()->type != 'customer') {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.no_authorized'), 400);
        } else {
            $user_request = UserRequest::where('Service_Provider_ID', $request->user()->id)->with('user')->get();
            if ($user_request->isNotEmpty()) {
                foreach ($user_request as $req) {
                    $req->response = $req->response;
                    $req->user->rating_avg = $req->user->rating_avg;
                }
            }

            if (count($user_request) == 0) {
                return $this->sendResponse($user_request, __('messages.request.no_request'), 200);
            } else {
                return $this->sendResponse($user_request, __('messages.request.request_count') . count($user_request), 200);
            }
        }
    }

    public function review(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_request_id' => 'required',
                'rating' => 'required|integer|min:1|max:5',
                'body' => 'nullable',
            ],
            [
                'user_request_id.required' => __('messages.api.user_request_id'),
                'rating.required' => __('messages.api.rating_required'),
                'rating.integer' => __('messages.api.rating_integer'),
                'rating.min' => __('messages.api.rating_min'),
                'rating.max' => __('messages.api.rating_max'),
            ]
        );

        if ($validator->fails())
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);

        if (!$userrequest = UserRequest::where('Request_id', $request->user_request_id)->first()) {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.user_request_id'), 400);
        }

        if ($userrequest->User_ID != $request->user()->id) {
            return $this->sendError(__('messages.api.validation_error'), __('messages.api.cant_review'), 400);
        }

        Review::updateOrCreate(['User_Request_ID' => $request->user_request_id], ['rating' => $request->rating, 'body' => $request->body]);
        return $this->sendResponse([], __('messages.api.reviewed'));
    }

    public function addToken(Request $request)
    {
        $validator = Validator::make($request->only(['device_token']), ['device_token' => 'required|max:255']);

        if ($validator->fails())
            return $this->sendError(__('Validation error.'), $validator->errors(), 400);

        $request->user()->update(['firebase_token' => $request->device_token]);

        return $this->sendResponse([], __('Token received successfully'));
    }

    public function category($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    public function posts()
    {
        return PostResource::collection(Post::where('lang', app()->currentLocale())->where('published', true)->orderBy('id', 'DESC')->paginate(10));
    }
    public function ads()
    {

            $ads = AdsResource::collection(Ads::where('published', true)->orderBy('id', 'DESC')->paginate(10));
        return $this->sendResponse($ads, __('messages.api.all_ads'));
    }

    public function categories()
    {
        return CategoriesResource::collection(Category::all());
    }

    public function oneAd($id)
    {
        $ad = Ads::find($id);
        if (!$ad) {
           return $response = ['success' => false, 'message' =>  __('messages.api.ads_not_found') ];
        }
        $Ad = new AdsResource(Ads::where('published', true)->find($id));
        return $this->sendResponse($Ad, __('messages.api.ad'));
    }

    public function latestAds()
    {

        $ads =  new AdsResource(Post::where('lang', app()->currentLocale())->where('published', true)->latest()->firstOrFail());
        return $this->sendResponse($ads, __('messages.api.latest_ad'));
    }

    public function pages(Request $request)
    {
        return PageResource::collection(Page::where('lang', app()->currentLocale())->where('published', true)->orderBy('id', 'DESC')->paginate(10));
    }

    public function page($id)
    {
        return new PageResource(Page::where('lang', app()->currentLocale())->where('published', true)->findOrFail($id));
    }

    public function settings()
    {
        return Setting::where('key', 'homepage')->value('value');
    }
    public function storeAd(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'brief' =>  'nullable',
            'featured_image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'lang' => ['required', Rule::in(['ar', 'en'])]
        ]);
        if ($validator->fails()) {
            return $this->sendError(__('messages.api.validation_error'), $validator->errors());
        }
        $ad = Ads::create($request->all());
        if ($request->hasFile('featured_image')) {
            $path =  'public/images';
            $image = $request->featured_image->getClientOriginalName();
            $image_name = rand(1,100).time().$image;
            $ad->featured_image = $image_name;
            $ad->save();
            $fullPath = $request->file('featured_image')->  storeAs($path,$image_name);
        }
        return $this->sendResponse($ad, __('messages.api.ads_created'));
    }
    public function updateAd(Request $request, $id)
    {
        
        $ad = Ads::find($id);
        if (!$ad) {
            return $response = ['success' => false, 'message' =>  __('messages.api.ads_not_found') ];
        }
        $validator = FacadesValidator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'brief' =>  'nullable',
            'featured_image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'lang' => ['required', Rule::in(['ar', 'en'])]
        ]);
        if ($request->hasFile('featured_image')) {
            $request->featured_image = img_upload($request->file('featured_image'), '/images/');
        }

        if ($validator->fails()) {
            return $this->sendError(__('messages.api.validation_error'), $validator->errors());
        }
        
        $ad->update($request->all());
        return $this->sendResponse($ad, __('messages.api.ads_updated'));
    }
    public function destroyAd($id)
    {
        $ad = Ads::find($id);
        if (!$ad) {
            return $response = ['success' => false, 'message' =>  __('messages.api.ads_not_found') ];;
        }
        $ad->delete();
        return $this->sendResponse($ad, __('messages.api.ads_deleted'));
    }
    /**
     * @param $user
     * @param Request $request
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendNotification($user, $request, $title)
    {
        $push_message = [
            'to' => $user->firebase_token,
            'notification' => [
                'title' =>  $title,
                'body' => $request->comment
            ]

        ];
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . config('app.fcm_server_key')
            ]
        ]);

        $response = $client->post('https://fcm.googleapis.com/fcm/send', ['body' => json_encode($push_message)]);

        $response = json_decode($response->getBody(), true);

        // if (isset($response['success']) && $response['success']) {
        //     PushNotification::create(["title" => $title, "message" => $request->comment]);
        //     return true;
        // }
        // return false;
        return true;
    }
}

function img_upload($image, $path)
{
    $image_name = $path . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    $checkPath = Storage::disk('public')->path($path);
    $storage_path = Storage::disk('public')->path($image_name);

    if (!File::exists($checkPath)) {
        File::makeDirectory($checkPath, 0775, true);
    }

    Image::make($image)->save($storage_path);

    return $image_name;
}
