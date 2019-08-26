@extends('admin.master')

@section('title')

Add Category

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
                  <div class="text-center pb-3">
                    <h4 style="color: green;">{{Session::get('message')}}</h4>
                  </div>
                  <form class="user" method="POST" action="{{url('/category/save')}}">
                      {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('CategoryName') ? ' has-error' : '' }}">
                      <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Category Name..." name="CategoryName">
                      @if ($errors->has('CategoryName'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('CategoryName') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <textarea type="text" class="form-control" id="exampleInputPassword" placeholder="Enter Category Description" name="description" cols="30" rows="5"></textarea>
                      @if ($errors->has('description'))
                          <span style="color: red;">
                              <strong>{{ $errors->first('description') }}</strong>
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
                      <input class="btn btn-primary btn-block" type="submit" name="btn" value="Save Category Info">
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