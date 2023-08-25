<?php

namespace App\Exports;

use App\Models\logistik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use function PHPUnit\Framework\returnSelf;
use Illuminate\Support\Facades\DB;

class LogistikExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        #return logistik::all();
        return $dataFElogistik = DB::table('tbllogistik')->orderBy('kondisi','ASC')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->simplePaginate(115);
    }
    public function headings(): array
    {
        return[
            'No Seri',
            'Name Device',
            'Vendor',
            'Status',
            'Lokasi',
            'Keterangan Device',
            'created_at',
        ];
    }
}
