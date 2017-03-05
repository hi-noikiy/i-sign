<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建管理员
        \App\Models\User::create([
            'role_level' => 9,
            'name' => 'admin',
            'mobile' => 18916550105,
            'password' => Hash::make('admin'),
            'sex' => (boolean)1,
            'company' => '上海中青旅行社有限公司',
            'position' => '开发工程师'
        ]);

        //模拟普通用户
        factory(App\Models\User::class, 50)->create();
    }
}
