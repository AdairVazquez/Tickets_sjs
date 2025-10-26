<?php

namespace App\Livewire\Admin;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class Tickets extends Component
{
    public $usuariosA;
    public $id_usuarioA = [];
    public $Ticket_id;

    public function asignarUsuario($ticketId){
        $ticket = Ticket::find($ticketId);
        $ticket->update([
            'id_usuario_asignado' => $this->id_usuarioA[$ticketId] ?? null,
            'id_estado' => 2
        ]);

        $this->dispatch('ticketCerrado');
    }

    public function irADetalles($ticketId)
    {
        return redirect()->route('detalleTicket', ['ticketId' => $ticketId]);
    }

    public function mount(){
        $this->usuariosA = User::whereIn('rol_id', [1, 2])->get();
    }

    public function render()
    {
        return view('livewire.admin.tickets', [
            'ticketsAbiertos' => Ticket::where('id_estado',1)->orderBy('id', 'desc')->paginate(10),
            'ticketsProceso' => Ticket::where('id_estado',2)->orderBy('id', 'desc')->paginate(10),
            'ticketsCerrados' => Ticket::where('id_estado',3)->orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
