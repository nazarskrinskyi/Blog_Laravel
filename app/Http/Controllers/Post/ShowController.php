<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ShowController extends Controller
{

    public function __invoke(Post $post): View
    {
        $date = Carbon::parse($post->created_at);
        $auth = Auth::user();
        $author = User::find($post->user_id);
        $comments = $post->comments()->paginate(5);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->paginate(3);
        return view('show', compact('post','date', 'comments', 'author', 'relatedPosts', 'auth'));
    }

}
