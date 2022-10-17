<?php

namespace App\Http\Controllers\API;

use App\Http\APIResources\UserMainDataResource;
use App\Http\APIResources\UserResource;
use App\Models\LoginHistory;
use App\Models\User;
use App\Notifications\PasswordUpdated;
use App\Notifications\UserRequestNotification;
use App\Traits\ImageUpload;
use Arr;
use Auth;
use DB;
use Illuminate\Http\Request;
use Validator;

class UserController extends BaseController
{
    use ImageUpload;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'City' => 'required',
            'longitude' => 'numeric',
            'latitude' => 'numeric',
            'name' => 'required',
            'phone' => 'required|integer|min:0',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'max:16'],
        ]);

        if ($validator->fails()) {
            return $this->sendError(__('Validation error.'), $validator->errors(), 400);
        }

        $data = [
            'name' => $request->name,
            'type' => 'customer',
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'locale' => 'ar',
            'City' => 1,
        ];

        $user = User::create($data);

        $user->loginHistory()->saveMany([new LoginHistory(['ip' => $request->ip()])]);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['user'] = new UserMainDataResource($user);

        return $this->sendResponse($success, __('messages.api.user_registered'));
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->only(['password', 'email']), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'type' => 'customer',
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $success['token'] = $user->createToken('auth_token')->plainTextToken;

            $user->loginHistory()->saveMany([new LoginHistory(['ip' => $request->ip()])]);

            $success['user'] = new UserMainDataResource($user);

            return $this->sendResponse($success, __('messages.api.login_success'));
        }

        return $this->sendError(__('messages.api.login_failed'), ['error' => __('messages.api.login_failed')], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->sendResponse('', __('messages.api.logged_out'));
    }

    public function sendPassword(Request $request)
    {

        $validator = Validator::make($request->only(['email']), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $user = User::firstWhere([['email', '=', $request->email], ['type', '=', 'customer']]);

        if (!$user) {
            return $this->sendError(__('messages.api.user_not_found'), [], 404);
        }

        $new_password = $this->generatePassword(8);
        $user->password = $new_password;
        $user->save();

        $user->notify(new PasswordUpdated($new_password));

        return $this->sendResponse([], __('messages.api.check_for_pass'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->only([
            'name', 'locale', 'password', 'phone', 'bio', 'City',
            'email', 'profile_image', 'category_ids', 'address',
        ]);

        $validator = Validator::make($data, [
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'password' => 'nullable|min:8|max:16',
            'name' => 'required|string|max:255',
            'profile_image' => 'sometimes|nullable|image',
            'locale' => 'required|in:ar,en',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'integer|exists:categories,id',
            'City' => 'required',
            'bio' => 'nullable|string',
            'phone' => 'required|integer|min:0',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);
        }

        if (array_key_exists('profile_image', $data)) {
            $data['profile_image'] = $this->storeImage($data['profile_image']);
        }

        $user = User::find(Auth::user()->id);

        if (array_key_exists('category_ids', $data)) {
            $user->categories()->sync($data['category_ids']);
        }

        $data = Arr::except($data, 'category_ids');

        $user->update($data);

        $success['user'] = new UserResource(User::find(Auth::user()->id));

        return $this->sendResponse($success, __('messages.api.profile_updated'));
    }

    public function updateLocation(Request $request)
    {
        $data = $request->only(['longitude', 'latitude']);

        $validator = Validator::make($data, [
            'longitude' => 'numeric',
            'latitude' => 'numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);
        }

        $request->user()->update($data);

        return $this->sendResponse('', __('messages.api.profile_updated'));

    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $result = User::serviceProvider()->where('id', '<>', optional($request->user())->id)
            ->when($query, fn($q) => $q->where(fn($q) => $q->where('name', 'like', "%$query%")->orWhere('address', 'like', "%$query%")))
            ->when($request->city_id, fn($q) => $q->where('City', $request->city_id))
            ->when($request->category_id, fn($q) => $q->whereRelation('categories', 'categories.id', $request->category_id))
            ->when($latitude && $longitude && $request->location, function ($q) use ($latitude, $longitude) {
                $q->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . ")) * cos(radians(latitude))
                    * cos(radians(longitude) - radians(" . $longitude . ")) + sin(radians(" . $latitude . "))
                    * sin(radians(latitude))) AS distance")
                )
                    ->having('distance', '<', 10)
                    ->orderBy('distance', 'asc');
                    
            }
            )
            ->paginate(10)
            ->appends($request->except('page'));

        return UserResource::collection($result);
    }

    public function notifications(Request $request)
    {
        return response()->json([
            'notifications' => $request->user()->notifications()->latest()->paginate(10),
            'notifications_count' => $request->user()->notifications()->whereNull('read_at')->count(),
        ], 200);
    }

    public function markAsReadNotifications(Request $request)
    {
        $request->user()->unreadNotifications->where('type', UserRequestNotification::class)->markAsRead();
        return response()->json(['count' => 0]);
    }

    public function generatePassword($len)
    {
        $lower = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        $upper = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        $specials = array('!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~');
        $digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $all = array($lower, $upper, $specials, $digits);

        $pwd = $lower[array_rand($lower, 1)];
        $pwd = $pwd . $upper[array_rand($upper, 1)];
        $pwd = $pwd . $specials[array_rand($specials, 1)];
        $pwd = $pwd . $digits[array_rand($digits, 1)];

        for ($i = strlen($pwd); $i < max(8, $len); $i++) {
            $temp = $all[array_rand($all, 1)];
            $pwd = $pwd . $temp[array_rand($temp, 1)];
        }
        return str_shuffle($pwd);
    }
    public function destroyUser(Request $request, $id)
    {
        $validator = Validator::make($request->only(['password']), [
            'password' => ['required', 'min:8', 'max:16'],
        ]);
        if ($validator->fails()) {
            return $this->sendError(__('messages.api.validation_error'), $validator->errors(), 400);
        }
        $user = User::find($id);
        if (!$user) {
            return $this->sendError(__('messages.api.user_not_found'), $validator->errors(), 400);
        }
        $password = $user->password_confirmation;
        if ($request->password == $password) {

            $user->delete();

            return $this->sendResponse(null, __('messages.api.user_delete'));
        }
        return $this->sendError(__('messages.api.user_not_found'), $validator->errors(), 400);
    }
}
