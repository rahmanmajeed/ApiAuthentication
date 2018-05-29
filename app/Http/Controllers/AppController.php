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
    	$roles = Role::get();
    	return view('admin',compact('users','roles'));
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
    	$roles = Role::get();
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


   
}
