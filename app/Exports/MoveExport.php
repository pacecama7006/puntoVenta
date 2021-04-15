<?php

namespace App\Exports;

use App\Models\Move;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MoveExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.move.moves_excel', [
            'moves' => Move::all(),
        ]);
    }
}
