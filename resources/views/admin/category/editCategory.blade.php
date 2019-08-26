@extends('admin.master')

@section('title')

Edit Category

@endsection

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
                <div class="p-5">
                  <form class="user" method="POST" action="{{url('/category/update')}}" name="editCategoryForm">
                      {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('CategoryName') ? ' has-error' : '' }}">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Category Name..." name="CategoryName" value="{{$categoryById->CategoryName}}">
                      <input type="hidden" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Category Name..." name="id" value="{{$categoryById->id}}">
                      @if ($errors->has('CategoryName'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('CategoryName') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <textarea type="text" class="form-control" id="exampleInputPassword" placeholder="Enter Category Description" name="description" cols="30" rows="5">{{$categoryById->description}}</textarea>
                      @if ($errors->has('description'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group">
						<label>Publication Status</label>
						<select class="form-control" name="publicationStatus" id="publicationStatus">
							<option>Select Publication Status</option>
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
                    </div>
                    <div class="form-group pt-2">
                      <input class="btn btn-primary btn-block" type="submit" name="btn" value="Update Category Info">
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("publicationStatus").value = {{$categoryById->publicationStatus}}
  </script>

@endsection