<?php

namespace App\Http\Controllers;

use \App\Models\Subscribe;

use Illuminate\Http\Request;
use DataTables;

class SubscribeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('subscribe');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = __('messages.subscribe.name');


        $subscribes = Subscribe::orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.showSubscribe' , compact('title' , 'subscribes'));
    }



    public function subscribe(Request $request)
    {

        $validator = $request->validate(
            [
                'Subscribe_Name' => 'required',
                'Subscribe_Email' => 'required|unique:subscriptions,Subscription_Email',
            ],
            [
                'Subscribe_Name.required' =>  __('customeValidation.ContactName'),
                'Subscribe_Email.unique' =>  __('customeValidation.EmailUnique'),
                'Subscribe_Email.required' =>  __('customeValidation.Email')

            ]
        );

        $subscriber = new Subscribe();
        $subscriber->Subscription_Name = $request->Subscribe_Name;
        $subscriber->Subscription_Email = $request->Subscribe_Email;

        if ($subscriber->save()) {
            $result['status'] = true;
            $result['code'] = 200;
            $result['message'] = __('successMessages.SubscribtionAdded');
            return response()->json($result);
        } else {
            $result['status'] = false;
            $result['code'] = 200;
            $result['message'] = __('errorMessages.SomethingWentWrong');
            return response()->json($result);
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  SubscribeController  $tagController
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $subscribe = Subscribe::find($id);

    //     if ($subscribe->delete()) {
    //         $result['status'] = true;
    //         $result['code'] = 200;
    //         $result['message'] = __('successMessages.SubscribeDelete');
    //         return response()->json($result);
    //     } else {
    //         $result['status'] = false;
    //         $result['code'] = 200;
    //         $result['message'] = __('errorMessages.SomethingWentWrong');
    //         return response()->json($result);
    //     }
    // }


}
