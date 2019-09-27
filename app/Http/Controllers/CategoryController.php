<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','Category Added Successfully');
        }

        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category',['levels'=>$levels]);

    }
    public function editCategory(Request $request, $id = null){
         if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect('/admin/view-categories')->with('flash_message_success','Category Updated Successfully!');
         }
          $levels = Category::where(['parent_id'=>0])->get();
         $categoryDetails = Category::where(['id'=>$id])->first();
         return view('admin.categories.edit_category',['categoryDetails'=>$categoryDetails],['levels'=>$levels]);
    }

    public function deleteCategory($id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category Deleted Successfully!');
        }
    }
    public function viewCategories(){
         $categories = Category::get();
         return view('admin.categories.view_categories')->with(compact('categories'));
    }


}
