<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;
class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class,10)->create()->each(function($c){
            for($i=0; $i<2; $i++){
                $c->items()->save(factory(OrderItem::class)->make([
                    'product_id'=>rand(1,10),
                    'price'=>rand(5,100),
                    'qtd'=>2,
                    ]
                ));
            }
        });
    }
}
