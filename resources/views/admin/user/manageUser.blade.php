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
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php $i=1; ?>
    	@foreach($users as $user)
    	<tr>
    		<td>{{$i++}}</td>
    		<td>{{$user->name}}</td>
    		<td>{{$user->name}}</td>
    		<td>{{$user->address}}</td>
    	</tr>
    	@endforeach
	</tbody>
  </table>
  <div>
  	{{$users->links()}}
  </div>
</div>
@endsection