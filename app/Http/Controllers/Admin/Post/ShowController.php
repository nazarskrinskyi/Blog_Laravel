<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post_tags = PostTag::where('post_id','=',$post->id)->get();
        $tags_id = [];
        foreach ($post_tags as $tag) {
            $tags_id[] = $tag->tag_id;
        }
        $tags = [];
        foreach ($tags_id as $tag_id){
            $tags[] = Tag::find($tag_id);
        }
        return view('admin.post.show', compact('post', 'tags'));
    }
}
