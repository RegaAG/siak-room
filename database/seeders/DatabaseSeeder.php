<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'class' => 'admin',
            'faculty' => 'admin',
            'program' => 'admin',
            'semester' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('root'),
            'is_admin' => '1',
        ]);
    }
}