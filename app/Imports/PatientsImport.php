<?php

namespace App\Imports;

use App\Patients;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PatientsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new Patients([
            'pet_type'     => $collection['pet_type'],
            'pet_name'    => $collection['pet_name'],
            'user_id' => $collection['user_id'],
            'gender' => $collection['gender'],
            'blood_type' => $collection['blood_type'],
            'weight' => $collection['weight'],
            'height' => $collection['height'],
            'image' => $collection['image']
        ]);

    }
}
