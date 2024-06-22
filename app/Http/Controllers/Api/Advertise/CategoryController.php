<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::grandChildren()
            ->get();

        return responder()->success($categories)->respond(); // Transforms from model
    }
}
