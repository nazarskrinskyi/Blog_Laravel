<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Admin\Post\FilterRequest;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends BaseController
{

    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): View|RedirectResponse
    {
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $postsQuery = Post::filter($filter);

        if (!empty($data['tags'])) {
            $posts_id = PostTag::where('tag_id', '=', $data['tags'])->get();
            $postIds = $posts_id->map->post_id->toArray();
            $postsQuery = $postsQuery->whereIn('id', $postIds);
        }

        $posts = $postsQuery->paginate(10);



        if (isset($_GET['page'])) {
            if ($_GET['page'] < 1 || $_GET['page'] > $posts->lastPage()) {
                $tag = isset($_GET['tags']) ? "&tags=$_GET[tags]" : '';
                return redirect(explode('?', $_SERVER['REQUEST_URI'])[0] . "?page=1" . $tag);
            }
        }

        return view('admin.post.index', compact('posts'));
    }
}
