<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $admin = new Admin;
        $admin->name = 'Peter Kyalo';
        $admin->email = 'admin@admin.com';
        $admin->password = $password;
        $admin->role = 'admin';
        $admin->mobile = '0705376543';
        $admin->status = 1;
        $admin->save();
    }
}
