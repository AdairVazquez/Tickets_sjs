<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class Inicio extends Component
{
    public $tickets_abiertos, $tickets_proceso , $tickets_cerrados;

    public function mount(){
       $this->tickets_abiertos = Ticket::where('id_estado', 1)->count();
       $this->tickets_proceso = Ticket::where('id_estado', 2)->count();
       $this->tickets_cerrados = Ticket::where('id_estado', 3)->count();
    }

    public function render()
    {
        return view('livewire.inicio');
    }
}
