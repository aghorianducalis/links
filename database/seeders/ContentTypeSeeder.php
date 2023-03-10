<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'video',
            'book',
            'news',
            'article',
            'social network page',
            'education material',
        ];

        foreach ($names as $name) {
            $source = ContentType::query()->firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
