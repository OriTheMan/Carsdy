<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserTableSeeder extends Seeder {


    public function run(){

        DB::table('users')->delete();
        User::create([
            'username' => 'OneTwo',
            'email' => 'onetwo@onetwo.com',
            'password' => Hash::make('onetwo'),
        ]);
    }



}
?>