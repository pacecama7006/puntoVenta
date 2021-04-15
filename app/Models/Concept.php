<?php

namespace App\Models;

use App\Models\Move;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;

    protected $fillable = [
        'concepto',
        'slug',
        'tipo',
    ];

    /*
    Método que me permite recuperar el slug en lugar del id
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relaciones
    //Uno a muchos
    /**
     * Get the comments for the blog post.
     */
    public function moves()
    {
        return $this->hasMany(Move::class);
    }

}
