<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['technology', 'sports', 'fashion'];
        foreach ($categories as $category) {
            Category::create(['title' => $category]);
        }
    }
}
