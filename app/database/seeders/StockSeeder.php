<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        static $p = 1;
        $names = [
            [
                'product_id'  =>  $p,
                'name'  => 'Moscow',
                'stock' => $p==1 ? 0 : rand(0,3),
            ],
            [
                'product_id'  =>  $p,
                'name'  => 'London',
                'stock' => $p==1 ? 0 : rand(0,3),
            ],
            [
                'product_id'  =>  $p,
                'name'  => 'Berlin',
                'stock' => $p==1 ? 0 : rand(0,3),
            ]
        ];
        foreach ($names as $name) {
            Stock::create($name);
        }
        $p++;
    }
}
