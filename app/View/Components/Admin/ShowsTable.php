<?php

namespace App\View\Components\Admin;

use App\Models\Show;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowsTable extends AbstractTable
{

    protected string $model = Show::class;
    protected string $view = 'components.admin.shows-table';
}
