<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Usuario;
use App\Http\Requests\Tarefas as TarefaRequest;

class TarefaController extends Controller
{
    public function index ()
    {
    	$tarefa_tit = 'Tarefas';
    	$tarefas = Tarefa::OrderBy('id', 'DESC')->get();
    	return view ('admin.tarefas.index', [
    		'tarefa_tit' => $tarefa_tit,
    		'tarefas' => $tarefas
    	]);
    }

    public function create ()
    {
    	$tarefas_create = 'Adicionar Tarefas';

    	$usuarios = Usuario::OrderBy('id', 'DESC')->get();

    	return view ('admin.tarefas.create', [
    		'tarefas_create' => $tarefas_create,
    		'usuarios' => $usuarios
    	]);
    }

    public function store (TarefaRequest $request)
    {
    	$tarefa = new Tarefa();

    	$tarefa->title = $request->title;
    	$tarefa->description = $request->description;
    	$tarefa->status = $request->status;
    	$tarefa->usuario_id = $request->usuario_id;
    	$tarefa->save();

    	return redirect()->route('admin.tarefas.index')->withErrors('Tarefas criada com sucesso!');
    }

    public function edit ($id)
    {   
        $tarefas_edit = 'Editar tarefa';
        $tarefa = Tarefa::where('id', $id)->first();

        return view ('admin.tarefas.edit', [
            'tarefa' => $tarefa,
            'tarefas_edit' => $tarefas_edit
        ]);
    }

    public function update (TarefaRequest $request, $id)
    {
        $tarefa = Tarefa::where('id', $id)->first();
        $tarefa->title = $request->title;
        $tarefa->description = $request->description;
        $tarefa->status = $request->status;
        $tarefa->usuario_id = $request->usuario_id;
        $tarefa->update();

        return redirect()->route('admin.tarefas.index')->withErrors('Tarefas atualizada com sucesso!');

    }

    public function destroy ($id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        return redirect()->route('admin.tarefas.index')->withErrors('Tarefas deletada com sucesso!');
    }
}
