<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();

        $users = [
        	[
        		"id" => 1,
        		"name" => "John Smith",
        		"comments" => "Lorem Ipsum Donor",
        		"password" => bcrypt("password"),
        		"created_at" => date('Y-m-d H:i:s')
        	],
        	[
        		"id" => 2,
        		"name" => "John Doe",
        		"comments" => "Lorem Ipsum Donor",
        		"password" => bcrypt("password"),
        		"created_at" => date('Y-m-d H:i:s')
        	]
        ];

        DB::table('users')->insert($users);
    }
}
