<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Resources\Category\CategoryResource;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): CategoryResource|string
    {

        $data = $request->validated();
        $category = $this->service->store($data);
        return redirect()->route('admin.category.index', $category->id);
    }
}
