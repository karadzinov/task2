<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;
use App\Models\CartItem;
use Carbon\Carbon;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            // Create 5 orders for each customer
            for ($i = 0; $i < 5; $i++) {
                $order = Order::create([
                    'customer_id' => $customer->id,
                    'status' => rand(0, 1) ? 'completed' : 'pending',
                    'created_at' => Carbon::now()->subDays(rand(1, 30)),
                    'updated_at' => Carbon::now(),
                ]);

                // Create cart items for the order
                $products = Product::inRandomOrder()->take(3)->get();
                foreach ($products as $product) {
                    CartItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => rand(1, 3),
                        'price' => $product->price,
                        'created_at' => $order->created_at,
                    ]);
                }
            }
        }
    }
}
