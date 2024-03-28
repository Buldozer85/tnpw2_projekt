<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

abstract class AbstractTable extends Component
{

    protected string $model = Model::class;

    protected string $view = '';

    protected int $perPage = 25;

    public function render(): View
    {
        return view($this->view)->with(['data' => $this->query()]);
    }

    protected function basicQuery()
    {
        return $this->model::query();
    }

    protected function query() {
        return $this->basicQuery()->paginate(25);
    }
}
