<?php

namespace App\Imports;

use App\Staff;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StaffImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new Staff([
            'name'     => $collection['name'],
            'email'    => $collection['email'],
            'password' => \Hash::make($collection['password']),
        ]);
    }
}
