<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $names = [
            'mind map',
            'evolution',
            'books',
            'media',
            'civilization',
            'ai',
            'physics',
            'culture',
            'cell',
            'manifold',
            'math',
            'it',
            'games',
//            '',
        ];

        foreach ($names as $name) {
            $category = Category::create([
                'name' => $name,
            ]);
        }
    }
}
