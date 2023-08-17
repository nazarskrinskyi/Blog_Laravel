<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Category $category): View
    {
        return view('admin.category.edit', compact('category'));
    }
}
