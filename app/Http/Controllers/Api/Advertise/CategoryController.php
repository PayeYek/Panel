<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories(Category $category)
    {
        return responder()->success(Category::grandChildrenGroupedByParent())->respond();
    }
}
