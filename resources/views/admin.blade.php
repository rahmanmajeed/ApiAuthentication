@extends('layouts.app')
@section('content')
 <div class="container">
 <style>
 .pull-left {
  float: left !important;
}
.pull-right-admin {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 18px;
}

 </style>
  <a href="#" class="btn btn-success">+Create New Role</a><br>
 <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Roles 
             
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

 	 <table class="table table-bordered">
    	<thead>
		<th>Name</th>
		<th>E-mail</th>
		<th>Role</th>
        <th>Permission</th>
		<th>Assign New Role</th>
	    </thead>
     <tbody>
     	@foreach($users as $user)
     	  <tr>

        <td>{{$user->name}}</td>
        <td>{{$user->email}} <input type="hidden" name="email" value="{{$user->email}}"></td>
    
       
      
        <td>{{$user->roles->implode('name', ', ')}}</td>
        <!-- <td>{{$user->roles->pluck('permissions')}}</td> -->
        <td>
        @foreach($user->roles as $role)
        
         @foreach($role->permissions as $permission=>$value)
       <b> {{$permission.': '}}</b>{{$value==1 ? 'true' : 'false'}}
         @endforeach
        
       @endforeach
     </td>
     
        <td> <a href="{{route('user.profile',$user->id)}}"><span class="btn btn-primary">Edit</span></a></td>
    </tr>
     @endforeach 
     </tbody>
    </table>
            </div>
           </div>
         </div>
        </div>
      </div>
   
@endsection
<script src="https://code.jquery.com/jquery-3.3.0.js" integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script>
