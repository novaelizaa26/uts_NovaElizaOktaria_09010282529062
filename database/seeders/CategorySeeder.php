<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Teknologi', 'Fiksi', 'Sains'] as $name) {
            Category::create([
                'name' => $name,
                'description' => "Buku kategori $name",     
            ]);
        }
        
    }
}
