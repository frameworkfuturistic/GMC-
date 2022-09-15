<?php

namespace App\Exports;

use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ShopExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = "SELECT 
                        s.Circle,
                        s.Market,
                        s.Allottee,
                        s.ShopNo,
                        s.Address,
                        s.Rate,
                        s.Arrear,
                        monthyear(p.PaidFrom) AS Fromm,
                        monthyear(p.PaidTo) AS Too,
                        p.PaidTo,
                        p.Amount,
                        p.PmtMode,
                        p.Months,
                        @b:=case
                        when @a:=date_format(CURDATE(),'%Y')*12+date_format(CURDATE(),'%m')-p.PaidTo > 0 then @a
                        ELSE '0'
                        END AS remaining_month,
                        (@b*s.Rate)+s.Arrear AS new_demand
                    FROM shops s
                    LEFT JOIN shop_payments p ON p.id=s.LastTranID
                ";
        $shop = DB::select($query);
        return collect($shop);
    }

    public function headings(): array
    {
        return [
            'Circle',
            'Market',
            'Allottee',
            'ShopNo',
            'Address',
            'Rate',
            'Arrear',
            'From',
            'To',
            'PaidTo',
            'Amount',
            'PmtMode',
            'Months',
            'RemainingMonth',
            'NewDemand'
        ];
    }
}
