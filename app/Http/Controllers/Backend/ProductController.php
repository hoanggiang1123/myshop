<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        // $products = new Product();
        // $res = $products->getAllItem();
        //return Product::with('productTranslations')->get()->toArray();
        Product::find(1)->delete();
        
    }
}