<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Post $post): View
    {
        $tags = Tag::all();
        $post_tags = PostTag::where('post_id','=',$post->id)->get();
        $categories = Category::where('status', '=', 1)->get();
        return view('admin.post.edit', compact('post','categories', 'tags','post_tags'));
    }
}
