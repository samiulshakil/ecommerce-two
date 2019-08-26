@extends('admin.master')

@section('mainContent')

<hr>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                <div class="p-3">
                  <div class="text-center pb-3">
                    <h4 style="color: green;">{{Session::get('message')}}</h4>
                  </div>
                  <form class="user" method="POST" action="{{url('/product/save')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('ProductName') ? ' has-error' : '' }}">
                    	<label for="forProductName" class="col-form-label">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Product Name..." name="productName">

                      @if ($errors->has('productName'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('productName') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group">
						<label for="forCategoryName" class="col-form-label">Category Name</label>
						<select class="form-control" name="categoryId">
							<option>Select CategoryName</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->CategoryName}}</option>
							@endforeach
						</select>
                    </div>

                    <div class="form-group">
						<label for="forManufacturerName" class="col-form-label">Manufacturer Name</label>
						<select class="form-control" name="manufacturerId">
							<option>Select Manufacturer</option>
							@foreach($manufacturers as $manufacturer)
							<option value="{{$manufacturer->id}}">{{$manufacturer->ManufacturerName}}</option>
							@endforeach
						</select>
                    </div>

                    <div class="form-group {{ $errors->has('productPrice') ? ' has-error' : '' }}">
                    	<label for="forProductPrice" class="col-form-label">Product Price</label>
                      <input type="number" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Product Price..." name="productPrice">
                      @if ($errors->has('productPrice'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('productPrice') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('productQuantity') ? ' has-error' : '' }}">
                    	<label for="forProductQuantity" class="col-form-label">Product Quantity</label>
                      <input type="number" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Product Price..." name="productQuantity">
                      @if ($errors->has('productQuantity'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('productQuantity') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('productShortDescription') ? ' has-error' : '' }}">
                      <label for="forproductShortDescription" class="col-form-label">Product Short Description</label>
                      <textarea type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Product Short Description..." name="productShortDescription" rows="4"></textarea>
                      @if ($errors->has('productShortDescription'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('productShortDescription') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('productLongDescription') ? ' has-error' : '' }}">
                    	<label for="forproductLongDescription" class="col-form-label">Product Long Description</label>
                      <textarea type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Product Short Description..." name="productLongDescription" rows="4"></textarea>
                      @if ($errors->has('productLongDescription'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('productLongDescription') }}</strong>
                          </span>
                      @endif
                    </div>
					
				    <div class="form-group {{ $errors->has('productImage') ? ' has-error' : '' }}">
                    	<label for="forImage" class="col-form-label">Product Image: </label>
                      <input type="file" accept="image/*" name="productImage">
                      @if ($errors->has('productImage'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('productImage') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group">
						<label>Publication Status</label>
						<select class="form-control" name="publicationStatus">
							<option>Select Publication Status</option>
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
                    </div>
                    <div class="form-group pt-2">
                      <input class="btn btn-primary btn-block" type="submit" name="btn" value="Save Product Info">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

@endsection