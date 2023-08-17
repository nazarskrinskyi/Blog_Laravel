<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Category;
use App\Models\Tag;
use Illuminate\View\View;
class CreateController extends BaseController
{
    public function __invoke(): View
    {
        $categories = Category::where('status', '=', 1)->get();
        $tags = Tag::all();
        return view('admin.post.create',compact('categories','tags'));
    }
}
