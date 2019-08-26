<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function createCategory(){
    	return view('admin.category.createCategory');
    }

    public function saveCategory(Request $request){

        $this->validate($request, [
            'CategoryName' => 'required',
             'description' => 'required', 
        ]);

    	//return $request->all();
    	//$Category = new Category();
    	//$Category->CategoryName = $request->CategoryName;
    	//$Category->description = $request->description;
    	//$Category->publicationStatus = $request->publicationStatus;
    	//$Category->save();
    	//return 'Category Info Save Successfully...';


    	//Category::create($request->all());
    	//return 'Category Info Save Successfully...';

    	DB::table('categories')->insert([
    		'categoryName' => $request->CategoryName,
    		'description' => $request->description,
    		'publicationStatus' => $request->publicationStatus,
    	]);

    	return redirect('/category/add')->with('message','Category Info Save Successfully...');
    }

    public function manageCategory(){
    	$categories = Category::all();
    	return view('admin.category.manageCategory', ['categories' => $categories]);
    }

    public function editCategory($id){ 
        $categoryById = Category::where('id',$id)->first();
        return view('admin.category.editCategory', ['categoryById' => $categoryById]);
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->id); 
        $category->categoryName = $request->CategoryName;
        $category->description = $request->description;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/category/manage')->with('message', 'Category Updated Successfully...');

    }

    public function deleteCategory($id){
        $category = Category::find($id); 
        $category->delete();
        return redirect('/category/manage')->with('message', 'Category Deleted Successfully...');
    }
}
