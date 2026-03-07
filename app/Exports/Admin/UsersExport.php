<?php

namespace App\Exports\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('users')->select('name', 'email', 'role')->where('role', '=', 'admin')->get();
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'role'
        ];
    }
}