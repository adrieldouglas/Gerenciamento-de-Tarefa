<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\Usuario as UsuarioRequest;

class UsuarioController extends Controller
{
	public function index ()
	{
		$usuario_tit = 'Usuários';
		$usuarios = Usuario::OrderBy('id', 'DESC')->get();

		return view ('admin.usuarios.index', [
			'usuario_tit' => $usuario_tit,
			'usuarios' => $usuarios
		]);
	}

	public function create ()
	{
		$usuario_create = 'Criar Novo';
		return view ('admin.usuarios.create', [
			'usuario_create' => $usuario_create
		]);
	}

	public function store (UsuarioRequest $request)
	{
		$usuarios = new Usuario ();

		$usuarios->name = $request->name;
		$usuarios->email = $request->email;
		$usuarios->save();

		return redirect()->route('admin.usuarios.index')->withErrors('Usuário salvo com sucesso!');

	}

	public function edit ($id) 
	{
		$usuario_edit = 'Editar usuário';
		$usuario = Usuario::where('id', $id)->first();

		return view ('admin.usuarios.edit', [
			'usuario' => $usuario,
			'usuario_edit' => $usuario_edit
		]);
	}

	public function update (UsuarioRequest $request, $id)
	{
		$usuario = Usuario::where('id', $id)->first();

		$usuario->name = $request->name;
		$usuario->email = $request->email;
		$usuario->update();

		return redirect()->route('admin.usuarios.index')->withErrors('Usuário alterado com sucesso!');
	}

	public function destroy ($id)
	{
		$usuario = Usuario::find($id);
		$usuario->delete();

		return redirect()->route('admin.usuarios.index')->withErrors('Usuário deletado com sucesso!');
	}
}
