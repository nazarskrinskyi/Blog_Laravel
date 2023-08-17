<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Requests\Admin\Category\FilterRequest;
use App\Models\Category;
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

        $filter = app()->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);
        $categories  = Category::filter($filter)->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
}
