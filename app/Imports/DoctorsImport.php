<?php

namespace App\Imports;

use App\Doctor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DoctorsImport implements ToCollection
{
    /**
     * @param Collection $collection
     * @param $row
     * @return Doctor
     */
    public function collection(Collection $collection)
    {
        return new Doctor([
            'name'     => $collection['name'],
            'email'    => $collection['email'],
            'password' => \Hash::make($collection['password']),
        ]);
    }
}
