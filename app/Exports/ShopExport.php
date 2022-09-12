<?php

namespace App\Exports;

use App\Models\Shop;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ShopExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $shop = Shop::select('ShopNo', 'Circle', 'Allottee', 'Rate', 'Arrear', 'Address', 'ContactNo', 'Longitude', 'Latitude')
            ->get();
        return $shop;
    }

    public function headings(): array
    {
        return [
            'ShopNo',
            'Circle',
            'Allottee',
            'Rate',
            'Arrear',
            'Address',
            'ContactNo',
            'Longitude',
            'Latitude'
        ];
    }
}
