<?php

namespace App\View\Components\Admin;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UsersTable extends AbstractTable
{
    protected string $model = User::class;
    protected string $view = 'components.admin.users-table';

    protected function query()
    {
        return $this->basicQuery()
            ->where('id', '!=', Auth::user()->id)
            ->paginate($this->perPage);
    }

}
