@extends('admin.master')

@section('mainContent')

<div class="container">
  <h3 class="text-center pb-4">Manage Manufacturer List</h3> 
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
    @foreach($manufacturer as $manufacturer)
      <tr>
        <td>{{$manufacturer->id}}</td>
        <td>{{$manufacturer->ManufacturerName}}</td>
        <td>{{$manufacturer->description}}</td>
        <td>{{$manufacturer->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
        <td>
        	<a href="{{url('/manufacturer/edit/'.$manufacturer->id)}}" class="btn btn-success">Edit</a>
        	<a href="{{url('/manufacturer/delete/'.$manufacturer->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure?');">Delete</a>
        </td>
      </tr>
  	@endforeach
    </tbody>
  </table>
</div>
@endsection