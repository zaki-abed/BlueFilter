<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactQuery;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard() {

   
        $data = [
            'total_customers' => User::where('type', 'customer')->count(),
            'total_categories' => Category::count(),
            'total_queries' => ContactQuery::count(),
            'title' => __('messages.dashboard.index')
        ];

        return view('back.dashboard', $data);
    }
}
