<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Create 10 customers (adjust count as needed)
        Customer::factory()->count(10)->create();
    }
}
