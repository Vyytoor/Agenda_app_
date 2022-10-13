<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Exception;
use App\Http\Requests\AgendaStore;
use App\Http\Requests\AgendaUpdate;

class Agendas extends Controller
{
    public function lista_contatos(){
        try{
            $agendas = Agenda::all();
            return $agendas;

        }catch(Exception $err){
            return response(['Mensagem'=>'Erro no Servidor', $err], 500);
        }

    }

    //Insere
    public function insere_contatos(AgendaStore $request){
        try{
            
           $insere_agenda = Agenda::create($request->validated());
           return $insere_agenda;

        }catch(Exception $err){
            return response(['Mensagem'=>'Erro no Servidor', $err], 500);
        }
    }

    //Edita
    public function edita_contatos(AgendaUpdate $request, $id){
        try{
            $dados = $request->validated();
            $agenda = Agenda::firstWhere('id', $id);
            
            if($agenda){
                $dados['nome']           ? $agenda->nome          = $dados['nome'] : null;
                $dados['telefone']       ? $agenda->telefone      = $dados['telefone'] : null;
                $dados['email']          ? $agenda->email         = $dados['email'] : null;
                $dados['categoria']      ? $agenda->categoria     = $dados['categoria'] : null;
                $agenda->save(); 
                   
    
                if ($agenda){
                    return response(['Mensagem'=>'Contato Atualizado'], 200);
                }

            }
            return response(['Mensagem'=>'Contato não encontrado'], 400); 
                        
        }catch(Exception $err){
            return response(['Mensagem'=>'Erro no Servidor', $err], 500);
        }
    }

    public function exclui_contatos($id){
        try{
            $agenda = Agenda::destroy($id);
            
            if($agenda == 1){
                return response(['Mensagem'=>'Contato Excluido'], 200); 
            }
            return response(['Mensagem'=>'Não foi possivel excluir o contato'], 400); 
                        
        }catch(Exception $err){
            return response(['Mensagem'=>'Erro no Servidor', $err], 500);
        }
    }

}

