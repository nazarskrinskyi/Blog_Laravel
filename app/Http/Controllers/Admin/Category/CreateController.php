<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {

        return view('admin.category.create');
    }
}
