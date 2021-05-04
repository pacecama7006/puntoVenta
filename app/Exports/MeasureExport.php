<?php

namespace App\Exports;

use App\Models\Measure;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MeasureExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.measure.measures_exel', [
            'measures' => Measure::all(),
        ]);
    }
}
