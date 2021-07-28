<?php

namespace App\Exports;

use App\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class StockExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'stock_ids',
            'sku'
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $sql = "SELECT GROUP_CONCAT(id) AS stock_id,variant FROM stocks GROUP BY variant";
        //Stock::select('variant', DB::raw('CONCAT(id) AS id'))->groupBy('variant')->get();
        return collect(DB::select($sql, []));
        //return collect(Stock::$sql);
    }
}
