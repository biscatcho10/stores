<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Admin::create([
              'name'  => 'Karim Osama',
              'email'  => 'admin@admin.com',
              'password'  => bcrypt('11445522'),

         ]);
    }
}
