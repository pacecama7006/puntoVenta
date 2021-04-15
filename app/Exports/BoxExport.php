<?php

namespace App\Exports;

use App\Models\Box;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BoxExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.box.boxes_excel', [
            'boxes' => Box::all(),
        ]);
    }
}
