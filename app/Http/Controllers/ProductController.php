<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listproduct()
    {
        return view('product.listproduct');
    }
    public function addproduct()
    {
        return view('product.addproduct');
    }
}
