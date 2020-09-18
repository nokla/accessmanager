<?php 

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class HistoryExport implements FromArray
{
    protected $aDataArray;

    public function __construct(array $aData)
    {
        $this->aDataArray = $aData;
    }

    public function array(): array
    {
        return $this->aDataArray;
    }
}
