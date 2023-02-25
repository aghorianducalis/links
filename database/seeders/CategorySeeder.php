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
            'chrome',
            'android',
            'docker',
            'dou.ua',
            'evolution redis',
            'git',
            'laravel',
            'laravel tags',
            'laravel selectize',
            'laravel eloquent',
            'laravel datatables',
            'laravel package development',
            'laravel composer',
            'laravel media library',
            'laravel auth',
            'music',
            'self projects',
            'social',
            'software ubuntu',
            'software jetbrains',
            'software',
            'ssl',
            'smartphone_tabs',
        ];

        foreach ($names as $name) {
            $category = Category::query()
                ->where('name', 'like', "%$name%")
                ->firstOrCreate([
                    'name' => $name,
                ]);
        }
    }
}
