<?php

namespace App\Exports;

use App\Doctor;
use Maatwebsite\Excel\Concerns\FromCollection;

class DoctorsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Doctor::all();
    }
}
