<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use App\Models\SaleDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_date',
        'num_vta',
        'tax',
        'total',
        'status',
        'client_id',
        'user_id',
    ];

    //Relaciones
    /*Una compra es de un usuario. Un usuario puede tener muchas vnetas*/
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    /*Una venta es de un cliente. Un cliente puede tener muchas vnetas*/
    public function client()
    {
        # code...
        return $this->belongsTo(Client::class);
    }

    /*Función que me permite*/
    public function saleDetails()
    {
        # code...
        return $this->hasMany(SaleDetail::class);
    }

    //Relaciones polimórficas muchos a muchos
    /**
     * Get all of the tags for the post.
     */
    public function products()
    {
        return $this->morphToMany(Product::class, 'productgable');

    }
}
