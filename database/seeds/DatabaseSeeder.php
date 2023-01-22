<?php

use Illuminate\Database\Seeder;
use App\Database\Seeds\ComicsSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ComicsSeeder::class);
    }
}
