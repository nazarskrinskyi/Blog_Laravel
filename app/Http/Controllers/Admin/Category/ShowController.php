<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Resources\Post\UserResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Category $category)
    {

        return view('admin.category.show', compact('category'));
    }
}
