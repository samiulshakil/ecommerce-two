
@extends('admin.master')

@section('mainContent')

<div class="container">
  <h3 class="text-center pb-4">Product Single View</h3>       
  <table class="table table-hover">
    <tr>
    	<th>Product Id</th>
    	<th>{{$product->id}}</th>
    </tr>

    <tr>
    	<th>Product Name</th>
    	<th>{{$product->productName}}</th>
    </tr>

    <tr>
    	<th>Category Name</th>
    	<th>{{$product->CategoryName}}</th>
    </tr>

    <tr>
    	<th>Manufactrurer Name</th>
    	<th>{{$product->ManufacturerName}}</th>
    </tr>
    
    <tr>
    	<th>Product Price</th>
    	<th>{{$product->productPrice}}</th>
    </tr>
    	<tr>
    	<th>Product Quantity</th>
    	<th>{{$product->productQuantity}}</th>
    </tr>

    <tr>
    	<th>Product Short Description</th>
    	<th>{!! $product->productShortDescription !!}</th>
    </tr>

    <tr>
    	<th>Product Long Description</th>
    	<th>{!! $product->productLongDescription !!}</th>
    </tr>

	<tr>
    	<th>Product Image</th>
    	<th><img src="{{ asset($product->productImage) }}" alt="productImage" height="50px" width="50px"></th>
    </tr>

    <tr>
    	<th>Product Publication Status</th>
    	<th>{{$product->productImage == 1 ? 'Published' : 'Unpublished'}}</th>
    </tr>
  </table>
</div>
@endsection