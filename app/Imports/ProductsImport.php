<?php

namespace App\Imports;

use App\Products;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;



class ProductsImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        return new Products([
            'product_name'     => $collection['product_name'],
            'product_quantity'    => $collection['product_quantity'],
            'category_id' => $collection['category_id'],
            'product_description' => $collection['product_description'],
            'product_price' => $collection['product_price'],
        ]);
    }
}
