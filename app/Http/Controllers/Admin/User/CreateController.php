<?php

namespace App\Http\Controllers\Admin\User;


use Illuminate\View\View;
class CreateController extends BaseController
{
    public function __invoke(): View
    {
        return view('admin.user.create');
    }
}
