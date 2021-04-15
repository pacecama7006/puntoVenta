<?php

namespace App\Models;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'rfc_number',
        'adress',
        'phone',
    ];

    //Relaciones uno a muchos

    /*Un proveedor puede tener muchos productos. Un producto pertenece a un proveedor*/
    public function products()
    {
        # code...
        return $this->hasMany(Product::class);
    }

    /*Un proveedor puede tener una o muchas compras. Una compra es hecha con un proveedor*/
    public function purchases()
    {
        # code...
        return $this->hasMany(Purchase::class);
    }
}
