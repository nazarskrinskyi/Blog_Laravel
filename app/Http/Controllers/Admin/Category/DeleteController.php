<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Category $category): RedirectResponse
    {

        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
