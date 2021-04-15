<?php

namespace App\Exports;

use App\Models\Provider;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProvidersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.provider.providers_excel', [
            'providers' => Provider::all(),
        ]);
    }
}
