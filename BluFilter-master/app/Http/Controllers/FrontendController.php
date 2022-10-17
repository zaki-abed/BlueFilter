<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Setting;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Models\Setting as Settings;
use App\Models\Post;
use App\Models\User;
use App\Models\Subscribe;
//use Auth;

class FrontendController extends Controller
{


    public function getHomepage($lang="ar") {

        app()->setLocale($lang);
        session()->put('front_locale' , $lang);
        $settings = Settings::where('key' , 'homepage')->first();
        $howtouse = Settings::where('key' , 'howtouse')->first();
        $vision = Settings::where('key' , 'vision')->first();
        $features = Settings::where('key' , 'features')->first();
        $aboutus = Settings::where('key' , 'aboutus')->first();

        $postcount = Post::all()->count();
        $ads = Ads::all();  
        $user = User::where('type','customer')->get()->count();

        return view('Frontend.index' , compact('settings', 'howtouse' , 'vision' , 'postcount' , 'ads', 'user' , 'features' , 'aboutus'));
    }

    public function getPost($lang, $id) {

        app()->setLocale($lang);

        $dir = $lang == 'ar' ? 'rtl' : 'ltr';

       $post = Post::find($id);
        
        return view('Frontend.post', compact('post', 'lang', 'dir'));
    }
    public function getAds($lang, $id) {

        app()->setLocale($lang);

        $dir = $lang == 'ar' ? 'rtl' : 'ltr';

       $ads = Ads::find($id);

        return view('Frontend.ads', compact('ads', 'lang', 'dir'));
    }
    public function createForm(Request $request) {

        app()->setLocale(session()->get('front_locale'));
        $validator = $request->validate(
            [
                'email' => 'unique:subscribes,subscribe_email',

            ],
            [
                'email.unique' =>  __('messages.general.duplicateEmail'),

            ]
        );
        $form = new Subscribe();
        $form->subscribe_name= $request->name;
        $form->subscribe_email = $request->email;
        if($form->save()){
            $result['status'] = true;
            $result['code'] = 200;
            $result['message'] = __('frontend.Form_Added');
            return response()->json($result);
        }else{
            $result['status'] = true;
            $result['code'] = 200;
            $result['message'] = __('messages.general.duplicateEmail');
            return response()->json($result);
        }
        // return view('Frontend.post', compact('post'));
     }
}
