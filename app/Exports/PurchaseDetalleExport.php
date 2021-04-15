<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseDetalleExport implements FromView
{

    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function view(): View
    {
        return view('admin.purchase.purchase_detalle_excel', [
            'purchase' => $this->purchase,
        ]);
    }

}
