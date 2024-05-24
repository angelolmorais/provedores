<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'DTI OEI',
            'email' => 'angelolmorais@gmail.com',
            'company' => 'I',
            'password' => Hash::make('$up0rt3@'),
            'cnpj' => '12.345.678/0003-00',
            'nit' => 'NIT-99959',
            'business' => 'DTI-OEI LTDA',
            'telephone' => '61 3321-99555',
            'state_province' => 'DF',
            'address' => 'Brasil 21, Sala 919',
            'activity' => '1,5',
            'country' => 1,
            'city' => 'Brasilia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
