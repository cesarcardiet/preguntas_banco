<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function gestionUsuarios()
    {
        $usuarios = User::where('id', '!=', auth()->id())->get();

        return view('admin.gestion-usuarios', compact('usuarios'));
    }

    public function cambiarRol(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->role = $request->role;
        $usuario->save();

        return redirect()->route('admin.gestion-usuarios')->with('success', 'Rol de usuario actualizado correctamente');
    }
}
