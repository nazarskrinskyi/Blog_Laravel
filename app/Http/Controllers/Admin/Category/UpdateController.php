<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();

        $category = $this->service->update($data, $category);
        return redirect()->route('admin.category.show', $category->id);
    }
}
