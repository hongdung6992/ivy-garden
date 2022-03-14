<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'          => 'Admin',
                'email'         => 'admin@gmail.com',
                'avatar'        => 'avatar-admin.jpg',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
                'password'      => Hash::make('12345678'),
            ],
            [
                'name'          => 'Nguyen Hong Dung',
                'email'         => 'hongdung@gmail.com',
                'avatar'        => 'avatar2.jpg',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
                'password'      => Hash::make('12345678'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
