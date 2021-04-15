<?php

namespace App\Exports;

use App\Models\Concept;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ConceptExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.concept.concepts_excel', [
            'concepts' => Concept::all(),
        ]);
    }
}
