<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = ['nome_grupo'];

    public function membros()
    {
        return $this->hasMany(Membro::class);
    }

    public function itens()
    {
        return $this->hasMany(Item::class);
    }

}
