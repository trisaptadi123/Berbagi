<?php

namespace App\Imports;

use App\Rekening;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RekeningImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $data = [];
        return new $data([
            'tgl' => $rows[0],
            'transaksi' => $rows[1],
        ]);
    }
}
