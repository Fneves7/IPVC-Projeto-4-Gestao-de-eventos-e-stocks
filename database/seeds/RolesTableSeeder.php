<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Warehouse']);
        Role::create(['name' => 'Supplier']);
        Role::create(['name' => 'Bar']);
    }
}
