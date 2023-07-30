<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'grupo_id','valor'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }


    public function itens()
    {
        return $this->hasMany(Item::class);
    }
}
