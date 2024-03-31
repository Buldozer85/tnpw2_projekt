<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewsController extends Controller
{
    public function delete(Review $review)
    {
        $review->delete();

        return redirect()->back();
    }
}
