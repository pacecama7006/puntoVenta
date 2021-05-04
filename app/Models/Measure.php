<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    use HasFactory;
    protected $fillable = ['medida', 'simbolo', 'slug'];

    /*
    Método que me permite recuperar el slug en lugar del id
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relaciones uno a muchos

    /*Una medida puede tener muchos productos. Un producto pertenece a una medida*/
    public function products()
    {
        # code...
        return $this->hasMany(Product::class);
    }
}
