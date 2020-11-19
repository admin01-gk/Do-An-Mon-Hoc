<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use Illuminate\Support\Str;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    public function getCate()
    {
        $data['catelist'] = Category::all();
        return view('backend.category',$data);
    }
    public function postEditCate(AddCateRequest $request)
    {
        $category = new Category;
        $category->category_name = $request->name;
        $category->category_slug = str::slug($request->name);
        $category->save();
        return back();
    }
    public function getEditCate($id)
    {
        $data['cate'] = Category::find($id);
        return view('backend.editcategory',$data);
    }
    public function getDeleteCate($id)
    {
        Category::destroy($id);
        return back();
    }
}