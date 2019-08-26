@extends('admin.master')

@section('mainContent')

<div class="container">
  <h3 class="text-center pb-4">Manage Category List</h3> 
  <h4 style="color: green;">{{Session::get('message')}}</h4>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Publication Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->CategoryName}}</td>
        <td>{{$category->description}}</td>
        <td>{{$category->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
        <td>
        	<a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success">Edit</a>
        	<a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure?');">Delete</a>
        </td>
      </tr>
  	@endforeach
    </tbody>
  </table>
</div>
@endsection