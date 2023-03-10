<?php

namespace Database\Seeders;

use App\Models\Source;
use App\Services\Contract\SourceConstants;
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
        foreach (SourceConstants::SOURCES as $name) {
            $source = Source::query()->firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
