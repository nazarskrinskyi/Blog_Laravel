<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $post_comment_count = Comment::all()->count();
        $comment_like_count = CommentLike::all()->count();
        $comment_reply_count = CommentReply::all()->count();
        $post_like_count = PostUserLike::all()->count();
        return view('personal.index', compact('post_like_count', 'post_comment_count', 'comment_reply_count', 'comment_like_count'));
    }


}
