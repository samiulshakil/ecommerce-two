@extends('admin.master')

@section('mainContent')

<div class="container">
  <h3 class="text-center pb-4">Manage Product List</h3> 
  <h4 style="color: green;">{{Session::get('message')}}</h4>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Category Name</th>
        <th>Manufacturer Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Publication Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
        <td>{{$product->productName}}</td>
        <td>{{$product->CategoryName}}</td>
        <td>{{$product->ManufacturerName}}</td>
        <td>{{$product->productPrice}}</td>
        <td>{{$product->productQuantity}}</td>
        <td>{{$product->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
        <td>
        	<a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="View">View</a>
          <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Edit">Edit</a>
        	<a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure?');" title="Delete">Delete</a>
        </td>
      </tr>
  	@endforeach
    </tbody>
  </table>
</div>
@endsection