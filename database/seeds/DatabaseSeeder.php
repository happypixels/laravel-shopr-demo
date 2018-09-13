<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('migrate:fresh');
        factory(Product::class, 25)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
