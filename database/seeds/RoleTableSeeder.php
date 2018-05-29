<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user=new Role();
        $role_user->name="User";
        $role_user->slug="User";
        $role_user->description="This is an User";
        $role_user->permissions=array('create'=>true,'read'=>true);
        $role_user->save();

        $role_author=new Role();
        $role_author->name="Author";
        $role_author->slug="Author";
        $role_author->description="This is an Author";
        $role_author->permissions=array('create'=>true,'read'=>true,'update'=>true);
        $role_author->save();

        $role_admin=new Role();
        $role_admin->name="Admin";
        $role_admin->slug="Admin";
        $role_admin->description="This is an Admin";
        $role_admin->permissions=array('create'=>true,'read'=>true,'update'=>true,'delete'=>true);
        $role_admin->save();
    }
}
