<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        return view('admin.users.users');
    }

    public function shows()
    {
        return view('admin.shows.shows');
    }

    public function reviews()
    {
        return view('admin.reviews.reviews');
    }
}
