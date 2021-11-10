<?php

namespace App\Imports;

use App\Models\MultipleUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MultipleUploadsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            DB::table('multipleuploads')->insert([
                'ref_no' => $row['ref_no'],
                'bban' => $row['bban'],
                'name' => $row['name'],
                'amount' => $row['amount'],
                'transaction_description' => $row['transaction_description'],
            ]);
        }


    }
}
