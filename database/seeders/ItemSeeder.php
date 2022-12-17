<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = 
            [
                [
                    'category_id'      =>'1',
                    'name'     =>'Air Mineral',
                    'price'  =>'4500',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ],
                [
                    'category_id'      =>'2',
                    'name'     =>'Nasi Kulit Sambal Telor',
                    'price'  =>'35000',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ]
            ];

            Item::insert($items);
    }
}
