@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Role</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('role.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                    <div class="col-md-5">
                    <div class="form-group {{$errors->has('role_name')? 'has-error' : ''}}">
                    <label for="">Role Name</label>
                    <input type="text" name="role_name" id="" class="form-control">
                    <span class="text-danger">{{$errors->first('role_name')}}</span>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-5">
                    <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                    <label for="">Role Slug</label>
                    <input type="text" name="slug" id="" class="form-control">
                    <span class="text-danger">{{$errors->first('slug')}}</span>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-5">
                    <div class="form-group {{$errors->has('role_des') ? 'has-error' : ''}}">
                    <label for="">Role Description</label>
                    <textarea name="role_des" id="" cols="10" rows="5" class="form-control"></textarea>
                    <span class="text-danger">{{$errors->first('role_des')}}</span>
                    </div>
                    </div>
                    </div>

                    <table class="table table-bordered">
                    <tr>
                    <td> <label for="">Role Permission</label></td>
                    <td> <label for="">Role Permission</label></td>
                    <td> <label for="">Role Permission</label></td>
                    <td> <label for="">Role Permission</label></td>
                    
                    </tr>
                    <tr>
                    <td class="form-group" {{$errors->has('permsn_name1' ? 'has-error' : '')}}>
                    <input type="text" name="permsn_name1" id="" class="form-control">
                    <span class="text-danger">{{$errors->first('permsn_name1')}}</span>
                    </td>
                    <td class="form-group" {{$errors->has('permsn_name2' ? 'has-error' : '')}}>
                    <input type="text" name="permsn_name2" id="" class="form-control">
                    <span class="text-danger">{{$errors->first('permsn_name2')}}</span>
                    </td>
                    <td class="form-group" {{$errors->has('permsn_name3' ? 'has-error' : '')}}>
                    <input type="text" name="permsn_name3" id="" class="form-control">
                    <span class="text-danger">{{$errors->first('permsn_name3')}}</span>
                    </td>
                    <td class="form-group" {{$errors->has('permsn_name4' ? 'has-error' : '')}}>
                    <input type="text" name="permsn_name4" id="" class="form-control">
                    <span class="text-danger">{{$errors->first('permsn_name4')}}</span>
                    </td>
                     
                    </tr>
                    <tr>
                    <td><input type="checkbox" name="permsn1" id="" class="form-control" value="true"></td>
                    <td><input type="checkbox" name="permsn2" id="" class="form-control" value="true"></td>
                    <td><input type="checkbox" name="permsn3" id="" class="form-control" value="true"></td>
                    <td><input type="checkbox" name="permsn4" id="" class="form-control" value="true"></td>
                     
                    </tr>
                   
                    </table>

                    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <input type="submit" value="Create" class="form-control btn btn-success">
                    </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    </div>
                 
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
