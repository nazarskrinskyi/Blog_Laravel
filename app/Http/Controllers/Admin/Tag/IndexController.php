<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Filters\TagFilter;
use App\Http\Requests\Admin\Tag\FilterRequest;
use App\Models\Tag;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class IndexController extends Controller
{

    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): View
    {

        $data = $request->validated();

        $filter = app()->make(TagFilter::class, ['queryParams' => array_filter($data)]);
        $tags  = Tag::filter($filter)->paginate(10);
        return view('admin.tag.index', compact('tags'));
    }
}
