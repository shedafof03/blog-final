<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User();
        $admin->name = "Admin";
        $admin->email = "admin@myblog.com";
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->assignRole('admin');
    }
}
