<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all()->count();
        $users = User::all()->count();
        $categories = Category::all()->count();
        $posts = Post::all()->count();
        return view('admin.index', compact('users','categories','tags','posts'));
    }


}
