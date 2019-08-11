<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndicatorCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =  IndicatorCategory::get();
        return view('category.index', ['categories' => $categories]);
    }

    public function add()
    {
        $category =  IndicatorCategory::get();
        return view('category.add', ['category' => $category]);
    }

    public function store(Request $request)
    {
        try {
            $category = new IndicatorCategory();
            $category->name = $request->name;
            $category->label = $request->label;
            $category->parent_category_id = $request->parent;
            $category->save();

            return redirect('/admin/category/')->with('status', 'Success create category ' . $request->name);
        } catch (\Exception $e) {
            return redirect('/admin/category/add')->with('error', $e->getMessage());
        }
    }

    public function del($id)
    {
        IndicatorCategory::where(['id' => $id])->delete();
        return redirect('/admin/category/')->with('status', 'Success delete category '.$id);
    }
}
