<?php

namespace App\Exports\Admin;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BooksExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $datas = [];
        $books = DB::table('books')->select('kategori_id', 'title', 'author', 'penerbit', 'year_terbit', 'desc')->get();
        foreach ($books as $book) {
            $name_category = DB::table('kategoris')->select('name_category')->where('id', '=', $book->kategori_id)->first();
            array_push($datas, ["name_category" => $name_category->name_category, "title" => $book->title, "author" => $book->author, "year_terbit" => $book->year_terbit, "desc" => $book->desc]);
        }
        // @dd(, $books);
        return collect($datas);
    }

    public function headings(): array
    {
        return [
            'kategori',
            'title',
            'author',
            'penerbit',
            'tahun terbit',
            'desc'
        ];
    }
}