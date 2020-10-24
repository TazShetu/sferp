<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(CustomertypesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CustomerrelationsTableSeeder::class);
        $this->call(FactoriesTableSeeder::class);
        $this->call(MachinesTableSeeder::class);
        $this->call(SparepartsTableSeeder::class);
        $this->call(RawmaterialsTableSeeder::class);
        $this->call(SparepartspurchasesTableSeeder::class);
        $this->call(RawmaterialpurchasesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(Hrseeder::class);
        $this->call(DsddSeeder::class);
    }
}
