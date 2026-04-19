<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\User;
// si usas DB::  en vez de User::create
use Illuminate\support\facades\DB;
// si usas el hash habra que llamarlo
use Illuminate\support\facades\hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // desde laravel docs
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.cat',
            // bcrypt ?? bcrypt('admin1234') ?
            'password' => Hash::make('admin1234'),
        ]);
    }
}
