<?php

namespace App\Http\Controllers;

use App\Models\HistoryAgenda;
use Illuminate\Http\Request;
use Exception;

class AgendaHistory extends Controller
{
    public function listar_historico($id_agenda){
        try{
            $historyAgenda = HistoryAgenda::where('id_agenda', $id_agenda)
                                          ->orderby('created_at', 'desc')
                                          ->get();
            if(count($historyAgenda) > 0){
                return $historyAgenda;
            }
            return response(['Mensagem' => 'Nenhum resultado!', 404]);

        }catch(Exception $err){
            return response(['Mensagem'=>'Erro no Servidor', $err], 500);
        }
    }
}
