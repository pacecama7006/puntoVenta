<?php

namespace App\Models;

use App\Models\Move;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'saldo',
        'user_id',
    ];

    //Relaciones
    //Uno a uno. Una caja pertenece a un usuario. Un usuario tiene una caja
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Uno a muchos. Una caja tiene muchos movimientos. Un movimiento pertenece a una caja
    /**
     * Get the comments for the blog post.
     */
    public function moves()
    {
        return $this->hasMany(Move::class);
    }

}
