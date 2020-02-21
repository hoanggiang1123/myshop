<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
   public function Index() {
        return Category::select('Name','Description')->paginate(1);
   }
}