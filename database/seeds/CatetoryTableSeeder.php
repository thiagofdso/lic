<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Category;
use CodeDelivery\Models\Product;
class CatetoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,5)->create()->each(function($c){
           for($i=0; $i<5; $i++){
               $c->products()->save(factory(Product::class)->make());
           }
        });
    }
}
