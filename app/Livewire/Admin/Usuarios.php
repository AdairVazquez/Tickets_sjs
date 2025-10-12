<?php

namespace App\Livewire\Admin;

use App\Models\Rol;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithPagination; 

    protected $paginationTheme = 'tailwind'; // Opcional: para estilos Tailwind

    public $openCrear = false;
    public $openEdit = false;

    public $roles;
    public $postIdDel;
    public $name, $email, $password, $password_confirmation, $rol_id; 

    public $UserEditId = '';
    Public $user_edit = [
        'name' => '',
        'email' => '',
        'password' => '',
        'rol_id' => ''
    ];

    protected $listeners = ['deletePost'];

    public function mount(){
        $this->roles = Rol::all();
    }

    public function mostrarCrear(){
        $this->openCrear = true;
    }

    public function cerrarCrear(){
        $this->openCrear = false;
    }

    public function cerrarEdit(){
        $this->openEdit = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'rol_id' => 'required|exists:rol,id'
        ],[
            'name.required'=> 'Campo olbigatorio, escribe un nombre'
        ]);


        User::create(
            $this->only('name','email','password','rol_id')
        );

        $this->reset(['name', 'email' , 'password', 'rol_id']);
        $this->openCrear = false;
        $this->gotoPage(1);
        
        $this->dispatch('usuarioCreado');

        
    }

    public function edit($user_id){
        $this->openEdit = true;

        $this->UserEditId = $user_id;

        $usuario = User::find($user_id);

        $this->user_edit['name']=$usuario->name;
        $this->user_edit['email']=$usuario->email;
        $this->user_edit['password']=$usuario->password;
        $this->user_edit['rol_id']=$usuario->rol_id;

    }

    public function update(){
        $usuario = User::find($this->UserEditId);
        $usuario->update([
         'name' => $this -> user_edit['name'],
         'email' => $this->user_edit['email'],
         'rol_id' => $this->user_edit['rol_id']
        ]);

        $this->reset(['name','email','rol_id']);
        $this->openEdit = false;
        $this->gotoPage(1);
        
        $this->dispatch('usuarioActualizado');
    }

    public function confirmDelete($id)
    {
        $this->postIdDel = $id;
        // Dispara evento Livewire → capturado por JS
        $this->dispatch('show-delete-confirmation');
    }

    public function deletePost()
    {
        $user = User::find($this->postIdDel);
        if ($user) {
            $user->delete();
            $this->dispatch('usuarioEliminado');
        }
    }

    public function render()
    {
        return view('livewire.admin.usuarios', [
            'usuarios' => User::with('rol')->orderBy('id_rol', 'desc')->paginate(20),
        ]);
    }
}
 