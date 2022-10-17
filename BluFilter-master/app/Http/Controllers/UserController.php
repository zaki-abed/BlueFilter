<?php

namespace App\Http\Controllers;

use App\Models\ServiceProviderClicks;
use App\Models\User;
use App\Notifications\RequestApproved;
use App\Notifications\RequestRejected;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{
    // public function allRequests() {
    //     $requests = User::where('type', 'service_provider')->paginate(config('items_per_page'));

    //     return view('back.service-provider-requests', [
    //         'users' => $requests,
    //         'title' => __('messages.users.service_provider_requests')
    //     ]);
    // }

    public function serviceProviderViews() {
        $users = User::serviceProvider()->paginate(config('items_per_page'));

        return view('back.service-provider-views', [
            'users' => $users,
            'title' => __('messages.users.service_provider_views')
        ]);
    }
}
