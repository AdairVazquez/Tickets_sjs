<?php

namespace App\Livewire\Admin;

use App\Models\Ticket;
use Livewire\Component;

class Tickets extends Component
{
     

    public function render()
    {
        return view('livewire.admin.tickets', [
            'ticketsAbiertos' => Ticket::where('id_estado',1)->orderBy('id', 'desc')->paginate(20),
            'ticketsProceso' => Ticket::where('id_estado',2)->orderBy('id', 'desc')->paginate(20),
            'ticketsCerrados' => Ticket::where('id_estado',3)->orderBy('id', 'desc')->paginate(20),
        ]);
    }
}
