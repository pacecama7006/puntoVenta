<?php

namespace App\Exports;

use App\Models\Measure;
use Maatwebsite\Excel\Concerns\FromView;

class MeasureExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.measure.measures_excel', [
            'measures' => Measure::all(),
        ]);
    }
}
