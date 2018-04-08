<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    $sort = 1;
    $i= 5;
    for ($i=0; $i < 6; $i++) {
        DB::table('categoryproducts')->insert([
              'namacategory' => str_random(10),
              'publish' => 1,
              'sort' => $sort++,
          ]);
        }
    }
}
