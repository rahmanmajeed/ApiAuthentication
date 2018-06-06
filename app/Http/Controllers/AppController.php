<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;


class AppController extends Controller
{
    function __construct()
    {
        $this->middleware(['check.roles','auth']);
    }
    public function admin()
    {
        $users = User::with('roles')->get();
        
        foreach($users as $user){
            foreach($user->roles as $role)
            {
               //return $role->permissions;
       
            }
        
        }

      
      
    	return view('admin',compact('users'));
    }

    public function author()
    {
        return "Author Access";
    }

    public function user()
    {
        return "User Area";
    }


    //user profile part.

    public function userprofile($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::all();
        
    	return view('role_assign',compact('user','roles'));
    }


    public function assignrole(Request $request)
    {
        /**Detach or Remove User previous Role */
        $user=User::where('email',$request['email'])->first();
        $user->roles()->detach();

        /** Change or Update Role */

        if(is_array($request['role']))
        {
            foreach($request['role'] as $role)
            {
                $user->roles()->attach(Role::where('id',$role)->first());
            }
        }
        return redirect()->route('adminaccess');

    }

    public function role_permissions()
    {
        $roles=Role::all();
        return view('permissions',compact('roles'));
    }

    public function role_permissions_edit($id)
    {
        $role=Role::find($id);
     
        
        return view('permissions-edit',compact('role'));
    }

    public function role_permissions_update(Request $request, $id)
    {
        // $permit = array(
        //     'create' => $request->permission['create'] == 'true' ? true : false,
        //     'read' => $request->permission['read']== 'true' ? true : false,
        //     'update' => $request->permission['update']== 'true' ? true : false,
        //     'delete' => $request->permission['delete']== 'true' ? true : false,
        // );
        $permissions;

        foreach ($request->permissions as $key => $value) {
         $permissions[$key] = $value=='true' ? true : false;
        }
        $role=Role::find($id);
        $role->name=$request->role;
        $role->permissions=$permissions;
        $role->save();
        return redirect()->route('role.permissions');
        
    }


   
}
