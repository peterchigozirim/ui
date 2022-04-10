<?php

namespace App\Exports;

use App\Models\emailExcel;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return emailExcel::select("id", "name", "email")->get();
    }
        /**

     * Write code on Method

     *

     * @return response()

     */

    public function headings(): array

    {

        return ["ID", "Name", "Email"];

    }

}
