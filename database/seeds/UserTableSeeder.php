<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //retrieve the roles by eloquent
         $role_user=Role::where('slug','User')->first();
         $role_author=Role::where('slug','Author')->first();
         $role_admin=Role::where('slug','Admin')->first();
 
         $user = new User();
         $user->name="User";
         $user->email="user@example.com";
         $user->password=bcrypt('user');
         $user->save();
         //attach the role with user
         $user->roles()->attach($role_user);
        
 
         $author = new User();
         $author->name="Author";
         $author->email="author@example.com";
         $author->password=bcrypt('author');
         $author->save();
         //attach the role with author
         $author->roles()->attach($role_author);
        
         
         $admin = new User();
         $admin->name="Admin";
         $admin->email="admin@example.com";
         $admin->password=bcrypt('admin');
         $admin->save();
         //attach the role with admin;
         $admin->roles()->attach($role_admin);
    }
}
