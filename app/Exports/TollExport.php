<?php

namespace App\Exports;

use App\Models\Toll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TollExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $toll = Toll::select('id', 'AreaName', 'VendorName', 'Address', 'Rate', 'Location', 'Mobile')
            ->get();
        return $toll;
    }

    public function headings(): array
    {
        return [
            'id',
            'AreaName',
            'VendorName',
            'Address',
            'Rate',
            'Location',
            'Mobile'
        ];
    }
}
