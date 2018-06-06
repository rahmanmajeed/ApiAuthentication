@extends('layouts.app')

@section('content')
<div class="container">
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

                  <table class="table table-bordered">
                  <thead>
                  <th>#</th>
                  <th>Role</th>
                  <th>Permissions</th>
                  <th>Perform</th>
                  </thead>
                  <tbody>
                  @foreach($roles as $role)
                  <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$role->name}}</td>
                  <td>
                  @foreach($role->permissions as $key=>$value)
                  <b>{{$key.': '}}</b>{{$value==1 ? 'true' : 'false'}}{{','}}
                  @endforeach
                  </td>
                  <td>
                  <a href="{{route('role.permissions.edit',$role->id)}}"><i class="btn btn-info">Edit</i></a>
                  <a href="#"><i class="btn btn-success">View</i></a>
                  </td>
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