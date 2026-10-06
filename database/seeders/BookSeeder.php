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
            // Kategori Teknologi (category_id = 1)
            ['Pemrograman Web dengan Laravel', 'Budi Santoso', 'Informatika', 2022, 10, 1], 
            ['Basis Data Lanjut', 'Siti Aminah', 'Andi Offset', 2021, 7, 1], 
            ['Belajar Python untuk Pemula', 'Andi Pratama', 'Elex Media Komputindo', 2023, 8, 1], 
            ['Dasar-Dasar Pemrograman', 'Rudi Hermawan', 'Informatika', 2020, 6, 1], 
            ['Pengembangan Aplikasi Mobile', 'Dimas Saputra', 'Informatika', 2024, 5, 1], 

            // Kategori Fiksi (category_id = 2)
            ['Laskar Pelangi', 'Andrea Hirata', 'Bentang', 2005, 5, 2], 
            ['Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 1980, 4, 2], 
            ['Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia Pustaka Utama', 2009, 6, 2], 
            ['Perahu Kertas', 'Dee Lestari', 'Bentang', 2009, 5, 2], 
            ['Dilan 1990', 'Pidi Baiq', 'Pastel Books', 2014, 8, 2], 

            // Kategori Sains (category_id = 3)
            ['Fisika Dasar', 'Halliday', 'Erlangga', 2018, 6, 3], 
            ['Biologi Dasar', 'Neil A. Campbell', 'Pearson', 2017, 5, 3], 
            ['Kimia Dasar', 'Raymond Chang', 'Erlangga', 2016, 4, 3], 
            ['Matematika Dasar', 'John A. Carter', 'Gramedia', 2020, 7, 3], 
            ['Pengantar Astronomi', 'A. Gunawan', 'Erlangga', 2021, 3, 3], 
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