<?php

declare (strict_types = 1);

namespace App\Charts;

use App\Models\Sale;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class VentasChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $vtas_diarias = Sale::orderBy('sale_date')->pluck('total', 'sale_date');
        $vtas_diarias->keys();
        $vtas_diarias->values();
        return Chartisan::build()
            ->labels([$vtas_diarias->keys()])
            ->dataset('Ventas diarias', [$vtas_diarias->values()]);

        /*return Chartisan::build()
    ->labels(['First', 'Second', 'Third'])
    ->dataset('Sample', [1, 2, 3])
    ->dataset('Sample 2', [3, 2, 1]);*/
    }
}
