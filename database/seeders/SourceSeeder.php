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
            'chrome', // tabs
            'android', // tabs
            'chrome bookmarks',
//            '',
        ];

        foreach ($names as $name) {
            $source = Source::create([
                'name' => $name,
            ]);
        }
    }
}
