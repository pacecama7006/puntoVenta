<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Spatie\Permission\Models\Role;

class RolesExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.role.roles_excel', [
            'roles' => Role::all(),
        ]);
    }
}
