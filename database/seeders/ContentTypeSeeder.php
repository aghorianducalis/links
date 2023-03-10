<?php

namespace Database\Seeders;

use App\Models\ContentType;
use App\Services\Contract\ContentTypeConstants;
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
        foreach (ContentTypeConstants::CONTENT_TYPES as $name) {
            $source = ContentType::query()->firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
