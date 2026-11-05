<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        return view('category.listcategory');
    }
    public function create()
    {
        return view('category.addcategory');
    }
}
