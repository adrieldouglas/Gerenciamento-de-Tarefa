<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Tarefa;

class AuthController extends Controller
{
	public function showLoginForm()
	{
		if (Auth::check() === true) {
			return redirect()->route('admin.home');
		}

		$tit_login = 'Tarefas';	

		return view('admin.index', [
			'tit_login' => $tit_login			
		]);
	}

	public function home()
	{
		$tit_dashboard = 'Dashboard';

		$usuarios = Usuario::all();
		$tarefas = Tarefa::all();

		return view('admin.dashboard', [
			'tit_dashboard' => $tit_dashboard,
			'usuarios' => $usuarios,
			'tarefas' => $tarefas
		]);
	}

	public function login(Request $request)
	{
		if (in_array('', $request->only('email', 'password'))) {
			$json['message'] = $this->message->success('Ooops, informe todos os dados para efetuar o login')->render();
			return response()->json($json);
		}

		if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
			$json['message'] = $this->message->success('Ooops, informe um e-mail válido')->render();
			return response()->json($json);
		}

		$credentials = [
			'email' => $request->email,
			'password' => $request->password
		];

		if (!Auth::attempt($credentials)) {
			$json['message'] = $this->message->success('Ooops, usuário e senha não conferem!')->render();
			return response()->json($json);
		}

		$json['redirect'] = route('admin.home');
		return response()->json($json);
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('admin.login');
	}
}
