<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categories = 
            [
                [
                    'name'     =>'Minuman',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ],
                [
                    'name'     =>'Makanan',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ]
            ];
        Category::insert($Categories);
    }
}
