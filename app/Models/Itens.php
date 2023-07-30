<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;

    protected $fillable = ['item_nome', 'item_valor', 'membros_id','membro_valor'];

    public function membros()
    {
        return $this->belongsToMany(Membro::class,  'membro_id');
    }




}
