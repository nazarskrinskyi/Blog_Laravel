<?php

namespace App\Http\Controllers\Admin\Tag;

use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {

        return view('admin.tag.create');
    }
}
