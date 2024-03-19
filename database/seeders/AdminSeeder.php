<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = DB::table('users')->where('email', 'admin@admin.com')->get();

        if ($admin->isEmpty()) {
            DB::table('users')->insert([
                'name' => 'super admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'is_admin' => 1
            ]);

            dump('The admin user was created with the following specifications:');
            dump('email: admin@admin.com');
            dump('password: admin');
        }

    }
}
