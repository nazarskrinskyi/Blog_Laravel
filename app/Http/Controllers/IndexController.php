<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{


    public function __invoke(): View|RedirectResponse
    {
        $auth = Auth::user();
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $sidePosts = Post::withCount('likedUsers')->orderBy("liked_users_count",'DESC')->get()->take(4);
        $sliderPosts = Post::get()->random(3);
        if (isset($_GET['page'])) {
            if ($_GET['page'] < 1 || $_GET['page'] > $posts->lastPage()) {
                return redirect(explode('?', $_SERVER['REQUEST_URI'])[0] . "?page=1");
            }
        }
        return view('main', compact('auth', 'posts', 'randomPosts', 'sliderPosts', 'sidePosts'));
    }


}
