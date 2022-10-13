<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable=['nome', 'telefone', 'email', 'categoria'];

    public function agendaHistory():HistoryAgenda{
        return HistoryAgenda::create(
            [
            'id_agenda' =>  $this->id,    
            'nome' =>       $this->nome, 
            'telefone' =>   $this->telefone, 
            'email' =>      $this->email
            ]
        );
    }
}
