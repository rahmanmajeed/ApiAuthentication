@extends('layouts.app')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <form action="{{route('assign.role')}}" method="post">
                {{csrf_field()}}
                 <table class="table table-bordered">
                     <tr>
                         <td>E-mail</td><td colspan="5">{{$user->email}}<input type="hidden" name="email" value="{{$user->email}}"></td>
                     </tr>
                     <tr>
                         <td>Role</td>@foreach($roles as $role)<td>{{$role->name}}</td> @endforeach
                     </tr>
                     <tr>
                         <td></td>

                  @foreach($roles as $role)
                
              <td><input type="checkbox" name="role[]" value="{{$role->id}}" {{ $user->roles->contains($role) ? 'checked' : '' }}></td>
                  @endforeach
                  
                     </tr>
                      <tr>
                         <td colspan="10"><button type="submit">Assign</button></td>
                      </tr>
                 </table>
             </form>
         </div>
     </div>
 </div>
   
@endsection
<script src="https://code.jquery.com/jquery-3.3.0.js" integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script>
