<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ItemExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Item::orderBy('created_at', 'desc')->get();
        // var_dump($data);
        return $data;
    }

    /**
     * @param Item $item
     * @return array
     */

    public function map($item): array
    {
        return [
            $item->nama,
            $item->price,
            $item->stock,
            $item->discount,
            $item->merkk->nama,
            $item->supplierr->nama,
            $item->kategorii->nama,
            $item->keterangan,
            $item->buy,
            $item->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Harga',
            'Stok',
            'Diskon',
            'Merk',
            'Supplier',
            'Kategori',
            'Keterangan',
            'Harga Beli',
            'Created at'
        ];
    }
}
