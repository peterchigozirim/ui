<?php

namespace App\Imports;

use App\Models\emailExcel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EmailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new emailExcel([
            
            'name'     => $row['name'],

            'email'    => $row['email'], 

            'password' => Hash::make($row['password']),

        ]);
    }
}
