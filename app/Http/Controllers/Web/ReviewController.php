<?php

namespace App\Http\Controllers\Web;

use App\Enums\ShowType;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\ReviewRequest;
use App\Models\Review;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function createReview(Show $show, ReviewRequest $request)
    {
        if(!is_null(Auth::user()->reviews->where('show_id', '=', $show->id)->first())) {
            return to_route('serial.show', $show->id);
        }

        $review = new Review();

        $review->content = $request->get('review');
        $review->rating = $request->get('rating');
        $review->user_id = Auth::user()->id;
        $review->show_id = $show->id;
        $review->save();


        if ($show->type = ShowType::MOVIE) {
            return to_route('movie.show', $show->id);
        }

        return to_route('serial.show', $show->id);

    }

    public function delete(Review $review)
    {
        $review->delete();

        if ($review->show->type = ShowType::MOVIE) {
            return to_route('movie.show', $review->show->id);
        }

        return redirect()->route('serial.show', $review->show->id);

    }

    public function update(Review $review, ReviewRequest $request)
    {
        $review->content = $request->get('review');
        $review->rating = $request->get('rating');
        $review->save();


        if ($review->show->type = ShowType::MOVIE) {
            return to_route('movie.show', $review->show->id);
        }

        return to_route('serial.show', $review->show->id);

    }
}
