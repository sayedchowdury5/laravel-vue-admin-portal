<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Floor::factory(10)->create();
        \App\Models\ProductCategory::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\SubBrand::factory(10)->create();
        \App\Models\Mall::factory(10)->create();
        \App\Models\Merchant::factory(10)->create();
        \App\Models\SellingIdentity::factory(10)->create();
        \App\Models\NewShop::factory(10)->create();
        \App\Models\UsedShop::factory(10)->create();
        \App\Models\OtherMall::factory(10)->create();
        \App\Models\Promotion::factory(10)->create();
        \App\Models\Voucher::factory(10)->create();
        \App\Models\ADClient::factory(10)->create();
        \App\Models\CreateAD::factory(10)->create();
        \App\Models\ADSchedule::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
    }
}
