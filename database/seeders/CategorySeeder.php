<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Services\Contract\CategoryConstants;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (CategoryConstants::CATEGORIES as $name) {
            $category = Category::query()
                ->where('name', 'like', "%$name%")
                ->firstOrCreate([
                    'name' => $name,
                ]);
        }
    }
}
