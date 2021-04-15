<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table    = 'categories';
    protected $fillable = ['name', 'description', 'slug'];

    /*
    Método que me permite recuperar el slug en lugar del id
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relaciones uno a muchos

    /*Una categoría puede tener muchos productos. Un producto pertenece a una categoría*/
    public function products()
    {
        # code...
        return $this->hasMany(Product::class);
    }
}
