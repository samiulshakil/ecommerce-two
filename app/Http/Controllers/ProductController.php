<?php

namespace App\Http\Controllers;
use App\Category;
use App\Manufacturer;
use App\Productmodel;
use DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct(){
    	$categories = Category::where('publicationStatus', 1)->get();
    	$manufacturers = Manufacturer::where('publicationStatus', 1)->get();
    	return view('admin.product.createProduct',
    	 ['categories' => $categories, 'manufacturers' => $manufacturers]); 
    }

    public function saveProduct(Request $request){
    	$this->validate($request, [  // required add info in 3 field
    		'productName' => 'required',
    		'productPrice' => 'required',
    		'productImage' => 'required',
    	]);

    	$productImage = $request->file('productImage'); //store all info about image like extension name..
    	
    	$Name = $productImage->getClientOriginalName();

    	$uploadPath = 'public/productImage/';

    	$productImage->move($uploadPath,$Name);

    	$imageUrl = $uploadPath.$Name;

    	$product = new Productmodel(); // Create model object

    	$product->productName = $request->productName;
    	$product->categoryId = $request->categoryId;
    	$product->manufacturerId = $request->manufacturerId;
    	$product->productPrice = $request->productPrice;
    	$product->productQuantity = $request->productQuantity;
    	$product->productShortDescription = $request->productShortDescription;
    	$product->productLongDescription = $request->productLongDescription;
    	$product->productImage = $imageUrl;
    	$product->publicationStatus = $request->publicationStatus;
    	$product->save();

    	return redirect('/product/add')->with('message','Saved Successfully...');

    }

    public function manageProduct(){
    	$products = DB::table('productmodels') // join 3 three class 
    	->join('categories', 'productmodels.categoryId', '=', 'categories.id')
    	->join('manufacturers', 'productmodels.manufacturerId', '=', 'manufacturers.id')
    	->select('productmodels.id', 'productmodels.productName', 'productmodels.productPrice', 'productmodels.productQuantity', 'productmodels.publicationStatus', 'categories.CategoryName', 'manufacturers.ManufacturerName')
    	->get();
    	return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function viewProduct($id){
    	$product = DB::table('productmodels')
    	->join('categories', 'productmodels.categoryId', '=', 'categories.id')
    	->join('manufacturers', 'productmodels.manufacturerId', '=', 'manufacturers.id')
    	->select('productmodels.*', 'categories.CategoryName', 'manufacturers.ManufacturerName')
    	->where('productmodels.id', $id)
    	->first();

    	return view('admin.product.viewProduct', ['product' => $product]);
    }

    public function editProduct($id){
    	$productId = Productmodel::where('id', $id)->first(); // get single info from database by model class
    	$categories = Category::where('publicationStatus', 1)->get();
    	$manufacturers = Manufacturer::where('publicationStatus', 1)->get();
    	return view('admin.product.editProduct', ['productId' => $productId , 'categories' => $categories, 'manufacturers' => $manufacturers] );
    }


    public function updateProduct(Request $request){

    	$imageUrl = $this->imageExistStatus($request); //get img url with uplod image and delete old img

    	$productId = Productmodel::where('id', $request->productId)->first();

    	$productId->productName = $request->productName;
    	$productId->categoryId = $request->categoryId;
    	$productId->manufacturerId = $request->manufacturerId;
    	$productId->productPrice = $request->productPrice;
    	$productId->productQuantity = $request->productQuantity;
    	$productId->productShortDescription = $request->productShortDescription;
    	$productId->productLongDescription = $request->productLongDescription;
    	$productId->productImage = $imageUrl;
    	$productId->publicationStatus = $request->publicationStatus;
    	

        $productId->save();
        return redirect('/product/manage')->with('message', 'Product Updated Successfully...');


    }

    	private function imageExistStatus($request){

    		$productId = Productmodel::where('id', $request->productId)->first(); //information from database

    		$productImage = $request->file('productImage'); // info from input field  by request

    		if ($productImage) { // get new image url and all information if upload new image
    			$name = $productImage->getClientOriginalName();
    			$uploadPath = 'public/productImage/';
    			$productImage->move($uploadPath,$name); // upload new image 
    			$imageUrl = $uploadPath.$name;

                unlink($productId->productImage); // delete old image 

    		}else{
    			$imageUrl = $productId->productImage;
    		}
    			return $imageUrl; //return old or new image path 
    	}


    	public function deleteProduct($id){
    		$deleteProduct = Productmodel::find($id);
    		$deleteProduct->delete();
    		return redirect('product/manage')->with('message', 'Product Deleted Successfully...');
    	}









}
