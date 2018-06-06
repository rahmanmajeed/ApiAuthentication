@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Role Permissions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 
                  <form action="{{route('role.permissions.update',$role->id)}}" method="post">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <table class="table table-bordered">
                   <tr>
                   <td>Role Name</td><td colspan="5"><input type="text" name="role" id="role" value={{$role->name}}></td>
                   </tr>
                   <tr>
                   <td>Role Permissions</td>@foreach($role->permissions as $key=>$value)<td>{{$key}}</td>@endforeach
                   </tr>
                   <tr>
                   <td></td> 
                   @foreach($role->permissions as $key=>$value)
                   <td>
                   <input type="hidden" name="permissions[{{$key}}]" class="role" value="false" {{ $value==0 ? 'checked' : '' }}>
                   <input type="checkbox" name="permissions[{{$key}}]" class="role" value="true"  {{ $value==1 ? 'checked' : '' }}></td>
                   @endforeach
                   </tr>
                  </table>
                
                  <input type="submit" value="Update">
                  </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    
});
</script>
@endsection