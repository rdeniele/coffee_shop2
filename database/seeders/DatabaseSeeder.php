<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\tbl_item_list;
use App\Models\tbl_add_ons;
use App\Models\tbl_customers;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Seed coffee types
        tbl_item_list::create([
            'item_name' => 'Black Coffee',
            'item_description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'item_amount' => 1,
            'item_price' => 2.50,
        ]);

        // Seed Latte
        tbl_item_list::create([
            'item_name' => 'Latte',
            'item_description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'item_amount' => 1,
            'item_price' => 3.00,
        ]);

        // Seed Cappuccino
        tbl_item_list::create([
            'item_name' => 'Cappuccino',
            'item_description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'item_amount' => 1,
            'item_price' => 3.50,
        ]);

        // Seed addons
        tbl_add_ons::create([
            'add_on_name' => 'Milk',
            'add_on_price' => 0.50,
        ]);

        tbl_add_ons::create([
            'add_on_name' => 'Sugar',
            'add_on_price' => 0.25,
        ]);

        tbl_add_ons::create([
            'add_on_name' => 'Whipped Cream',
            'add_on_price' => 0.75,
        ]);

        tbl_customers::create([
            'customer_name' => 'Martin',
            'email' => 'martin@yahoo.com',
            'phone_number' => 123123132,
        ]);
    }
}
