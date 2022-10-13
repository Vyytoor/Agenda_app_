<?php

namespace App\Observers;

use App\Models\Agenda;

class AgendaObserver
{
    public $afterCommit = true;
    
    public function created(Agenda $agenda)
    {
        $agenda->agendaHistory();
    }

    public function updated(Agenda $agenda)
    {
        $agenda->agendaHistory();
    }

}