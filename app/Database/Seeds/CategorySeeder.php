<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = model(CategoryModel::class);

        foreach (['Work', 'Personal', 'Study', 'Errands'] as $name) {
            $categories->insert(['name' => $name]);
        }
    }
}
