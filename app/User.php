<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Role;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_roles');
    }

     //===== This is the one way to ACL with middleware =====//
    /**
     * hasAnyRole methods parameter $roles recieve data from CheckRole middleware 
     * check the $roles parameter is it array or not if is_array() return true
     * then check every role in the array using foreach loop and send the every single role
     * value to hasRole method.
     */
    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if( $this->hasRole($roles))
            {
              return true;
            }
        }
        return false;
    }

    /**
     * hasRole method recieve a role string value and it check with DB role table value
     * if it's match then Grant the role otherwise close the given role access. 
     */
  
    public function hasRole($role)
    {
        if($this->roles()->where('slug',$role)->first())
        {
            return true;
        }
        return false;
    }


    public function useroles()
    {
        $data=Auth::user()->roles;
        $role=array();
        foreach($data as $d)
        {
           // echo $d->id;
            $role[]= $d->slug;
        }
        return $role;
    }
}
