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
        $colors = [
            [
                'product_id'  =>  $p,
                'color'  => 'GREEN',
                'stock' => rand(0,3),
            ],
            [
                'product_id'  =>  $p,
                'color'  => 'GRAY',
                'stock' => rand(0,3),
            ],
            [
                'product_id'  =>  $p,
                'color'  => 'SILVER',
                'stock' => rand(0,3),
            ]
        ];
        foreach ($colors as $color) {
            Stock::create($color);
        }
        $p++;
    }
}
