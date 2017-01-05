<?php

use CodeDelivery\Models\Category;
use CodeDelivery\Models\Product;
use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert(
        [[
           'id'=>'appid01',
           'secret'=>'secret',
           'name'=>'DeliveryApp',

        ]
        ]);
    }
}
