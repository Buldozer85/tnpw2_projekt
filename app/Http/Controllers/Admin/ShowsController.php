<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;

class ShowsController extends Controller
{
    public function detail(Show $show)
    {
        return view('admin.shows.detail')->with(['show' => $show]);
    }

    public function showCreate()
    {
        return view('admin.shows.new');
    }
}
