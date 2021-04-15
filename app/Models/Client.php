<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rfc_number',
        'address',
        'phone',
        'email',
    ];

    //Relaciones

    //Relación uno a muchos
    /*Un cliente puede tener una  o muchas ventas. Una venta puede ser de un cliente.*/
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
