<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productmodel;

class WelcomeController extends Controller
{
    public function index(){
    	$publishedProduct = Productmodel::where('publicationStatus',1)->get();
		return view('fontEnd.home.homeContent', ['publishedProduct' => $publishedProduct]);
	}

	 // view all product of where category = 1 or 2 all category

	public function category($id){
		$publishedCategoryProduct = Productmodel::where('categoryId', $id)
		->where('publicationStatus',1)
		->get();

		return view('fontEnd.category.categoryContent', ['publishedCategoryProduct' => $publishedCategoryProduct]);
	}

	public function productDetails($id){
		$productById = Productmodel::where('id', $id)->first();
		return view('fontEnd.productDetails.productContent', ['productById'=> $productById]);
	}

	public function Contact(){
		return view('fontEnd.Contact.contactContent');
	}

}
