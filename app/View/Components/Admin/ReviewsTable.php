<?php

namespace App\View\Components\Admin;

use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewsTable extends AbstractTable
{
    protected string $model = Review::class;
    protected string $view = 'components.admin.reviews-table';
}
