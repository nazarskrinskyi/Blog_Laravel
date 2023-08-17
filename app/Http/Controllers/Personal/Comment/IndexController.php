<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\FilterRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class IndexController extends Controller
{

    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): View
    {
        $comments = auth()->user()->commentedPosts()->paginate(10);
        return view('personal.comment.index', compact('comments'));
    }
}
