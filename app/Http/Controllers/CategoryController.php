<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.Category',[
            'categories'=>Category::all()
        ]);
    }


    public function store(Request $request)
    {
       $data =  [
           'category_name'=>$request->category_name,
            'sub_category'=>'sub_category',
       ];

       $category = Category::create($data);
       if ($category){
           return redirect(url('admin/category'))->with('message','Category created');
       }
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy($id)
    {
       Category::find($id)->delete();
       return redirect(url('admin/category'))->with('message','Category Deleted');
    }
}
