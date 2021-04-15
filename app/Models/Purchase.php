<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Provider;
use App\Models\PurchaseDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_date',
        'num_compra',
        'tax',
        'total',
        'status',
        'picture',
        'provider_id',
        'user_id',
    ];

    //Relaciones
    /*Una compra es de un usuario. Un usuario puede tener muchas compras*/
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }

    /*Una compra es de un proveedor. Un proveedor puede tener muchas compras*/
    public function provider()
    {
        # code...
        return $this->belongsTo(Provider::class);
    }

    /*Función que me permite*/
    public function purchaseDetails()
    {
        # code...
        return $this->hasMany(PurchaseDetail::class);
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
