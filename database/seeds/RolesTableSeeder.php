<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建普通用户
        $role1 = new Role();
        $role1->name = 'commonUser';
        $role1->description = '普通用户';
        $role1->level = 1;
        $role1->save();

        //创建管理员
        $role9 = new Role();
        $role9->name = 'admin';
        $role9->description = '管理员';
        $role9->level = 9;
        $role9->save();
    }
}
