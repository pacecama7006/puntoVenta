<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'bar_code',
        'description',
        'stock',
        'image',
        'sell_price',
        'status',
        'provider_id',
        'category_id',
    ];

    /*
    Método que me permite recuperar el slug en lugar del id
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relaciones uno a muchos

    /*Un Producto pertenece a una categoría, Una categoría puede tener muchos productos*/
    public function category()
    {
        # code...
        return $this->belongsTo(Category::class);
    }

    /*Un Producto pertenece a un proveedor. Un Proveedor puede tener muchos productos*/
    public function provider()
    {
        # code...
        return $this->belongsTo(Provider::class);
    }

    //Relaciones polimórficas muchos a muchos

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function purchases()
    {
        return $this->morphedByMany(Purchase::class, 'productgable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function sales()
    {
        return $this->morphedByMany(Sale::class, 'productgable');
    }
}
