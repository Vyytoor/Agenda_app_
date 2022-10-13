<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryAgenda extends Model
{
    use HasFactory;

    protected $fillable=['id_agenda','nome', 'telefone', 'email'];
}
