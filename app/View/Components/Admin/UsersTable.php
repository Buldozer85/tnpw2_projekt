<?php

namespace App\View\Components\Admin;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UsersTable extends AbstractTable
{
    protected string $model = User::class;
    protected string $view = 'components.admin.users-table';

}
