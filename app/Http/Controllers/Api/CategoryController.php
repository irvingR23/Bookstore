<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {
      $categories = Category::all();

      return response()->json([
        'status' =>'ok',
        'data' => $categories
      ], 200);
    }


    public function store(Request $request) {
        //
    }


    public function show(Category $category) {
        //
    }


    public function update(Request $request, Category $category) {
        //
    }


    public function destroy(Category $category) {
        //
    }
}
