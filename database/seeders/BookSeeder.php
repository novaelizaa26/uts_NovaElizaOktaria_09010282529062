<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['Pemrograman Web dengan Laravel', 'Budi Santoso', 'Informatika', 2022, 10, 1],
            ['Basis Data Lanjut', 'Siti Aminah', 'Andi Offset', 2021, 7, 1],
            ['Laskar Pelangi', 'Andrea Hirata', 'Bentang', 2005, 5, 2],
            ['Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 1980, 4, 2],
            ['Fisika Dasar', 'Halliday', 'Erlangga', 2018, 6, 3],
        ];

        foreach ($books as [$title, $author, $publisher, $year, $stock, $categoryId]) {
            Book::create([
                'title' => $title,
                'author' => $author,
                'publisher' => $publisher,
                'year' => $year,
                'stock' => $stock,
                'category_id' => $categoryId,
            ]);
        }
    }
}
