<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CategoryExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.category.categories_excel', [
            'categories' => Category::all(),
        ]);
    }
}
