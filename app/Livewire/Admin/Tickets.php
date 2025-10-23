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
        ]);
    }
}
