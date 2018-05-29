@extends('layouts.app')
@section('content')
 <div class="container">
 	 <table class="table table-bordered">
    	<thead>
		<th>Name</th>
		<th>E-mail</th>
		<th>Role</th>
		<th>Assign New Role</th>
	    </thead>
     <tbody>
     	@foreach($users as $user)
     	  <tr>

        <td>{{$user->name}}</td>
        <td>{{$user->email}} <input type="hidden" name="email" value="{{$user->email}}"></td>
        <td>{{$user->roles->implode('name', ', ')}}</td>
     
        <td> <a href="{{route('user.profile',$user->id)}}"><span class="button">Edit</span></a></td>
    </tr>
     @endforeach 
     </tbody>
    </table>
 </div>
   
   
@endsection
<script src="https://code.jquery.com/jquery-3.3.0.js" integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script>
