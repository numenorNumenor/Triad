<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Auth;
use Session;

class CategoriesController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function allCategories() {
    $categories = Category::orderBy('id', 'desc')->paginate(10);

    return view('categories.index')->withCategories($categories);
  }

  public function storeCategory(Request $request) {
    $this->validate($request,[
      'category_name' => 'required|unique:categories|max:25'
    ]);

    $category = new Category;

    $category->category_name = $request->category_name;

    $category->save();

    Session::flash('success', 'Your category was successfully created !');

    return redirect()->route('all.categories');
  }

  public function showCategory($id) {
    $category = Category::find($id);

    return view('categories.show')->withCategory($category);
  }

  public function editCategory($id) {
    $category = Category::find($id);

    return view('categories.edit')->withCategory($category);
  }

  public function updateCategory(Request $request, $id) {
    $this->validate($request,[
      'category_name' => 'required|max:25'
    ]);

    $category = Category::find($id);

    $category->category_name = $request->category_name;

    $category->save();

    Session::flash('success', 'Your category was successfully updated !');

    return redirect()->route('all.categories');
  }

  public function deleteCategory($id) {
    $category = Category::find($id);

    $category->delete();

    Post::whereCategoryId($id)->update(['category_id' => null]);

    Session::flash('success', 'Your category was successfully deleted !');

    return redirect()->route('all.categories');
  }
}
