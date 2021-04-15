<?php

namespace App\Models;

use App\Models\Box;
use App\Models\Concept;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_mov',
        'detalle',
        'importe',
        'image',
        'conciliado',
        'tipo',
        'box_id',
        'concept_id',
    ];

    //Relaciones
    //Uno a muchos
    /**
     * Get the post that owns the box.
     */
    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    /**
     * Get the post that owns the concept.
     */
    public function concept()
    {
        return $this->belongsTo(Concept::class);
    }

}
