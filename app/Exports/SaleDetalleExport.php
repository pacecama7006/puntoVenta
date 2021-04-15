<?php

namespace App\Exports;

use App\Models\Sale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SaleDetalleExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function view(): View
    {
        return view('admin.sale.sale_detalle_excel', [
            'sale' => $this->sale,
        ]);
    }

}
