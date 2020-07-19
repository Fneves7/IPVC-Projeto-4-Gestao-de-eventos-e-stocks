<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $warehouseRole = Role::where('name', 'warehouse')->first();
        $supplierRole = Role::where('name', 'supplier')->first();
        $barRole = Role::where('name', 'bar')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'vat' => 999999999,
            'address' => 'Street 0, door 1',
            'zip_code' =>'Universe00',
            'contact' => 999999999,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        $warehouse = User::create([
            'name' => 'Warehouse User',
            'vat' => 999999999,
            'address' => 'Street 0, door 1',
            'zip_code' =>'Universe00',
            'contact' => 999999999,
            'email' => 'warehouse@warehouse.com',
            'password' => Hash::make('warehouse')
        ]);

        $supplier = User::create([
            'name' => 'Supplier User',
            'vat' => 999999999,
            'address' => 'Street 0, door 1',
            'zip_code' =>'Universe00',
            'contact' => 999999999,
            'email' => 'supplier@supplier.com',
            'password' => Hash::make('supplier')
        ]);

        $bar = User::create([
            'name' => 'Bar User',
            'vat' => 999999999,
            'address' => 'Street 0, door 1',
            'zip_code' =>'Universe00',
            'contact' => 999999999,
            'email' => 'bar@bar.com',
            'password' => Hash::make('bar')
        ]);

        $admin->roles()->attach($adminRole);
        $warehouse->roles()->attach($warehouseRole);
        $supplier->roles()->attach($supplierRole);
        $bar->roles()->attach($barRole);
    }
}
