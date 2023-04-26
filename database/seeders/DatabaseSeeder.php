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
        if (app()->isProduction()) {
            //
        } else {
            $this->call([
                CategorySeeder::class,
                SourceSeeder::class,
                ContentTypeSeeder::class,
            ]);
        }
    }
}
