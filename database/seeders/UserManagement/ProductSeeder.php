<?php

namespace Database\Seeders\UserManagement;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserManagement\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name'           => 'Realme 8i',
                'price'          => 2599000,
                'discount'       => 10,
                'image'          => 'Realme.jpg',
                'price_discount' => 2599000- (2599000*10/100)
            ],
            [
                'name'           => 'Huawei Y7 Pro',
                'price'          => 2000000,
                'discount'       => 20,
                'image'          => 'huawei.jpg',
                'price_discount' => 2000000- (2000000*20/100)
            ],
            [
                'name'           => 'Vivo Y12',
                'price'          => 2100000,
                'discount'       => null,
                'image'          => 'vivo.jpg',
                'price_discount' => 2100000
            ],
        ];
        Product::insert($datas);
    }
}
