<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'chrome bookmarks',
            'chrome tabs',
            'android tabs',
        ];

        foreach ($names as $name) {
            $source = Source::query()->firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
