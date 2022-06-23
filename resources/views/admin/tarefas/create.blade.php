@extends('admin.layouts.master')

@section('content')

<title>{{ $tarefas_create }}</title>

<div class="container">
	<form action="{{ route('admin.tarefas.store') }}" method="POST">
		@csrf

		<div class="card mt-3">
			<div class="card-body">
				<h4 class="text-muted text-right"><i class="bi bi-plus-circle-dotted"></i> Nova Tarefa</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="usuario_id">Todos os Usuários<i class="bi bi-asterisk text-danger small"></i></label>
							<select multiple class="form-control {{ $errors->has('usuario_id') ? 'is-invalid' : '' }}" name="usuario_id">
								@foreach($usuarios as $usuario)
								<option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
								@endforeach
							</select>

							@if ($errors->has('usuario_id'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('usuario_id') }}
							</div>
							@endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="title">Título da Tarefa<i class="bi bi-asterisk text-danger small"></i></label>
							<input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Nome da tarefa">

							@if ($errors->has('title'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('title') }}
							</div>
							@endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="status">Status<i class="bi bi-asterisk text-danger small"></i></label>
							<select multiple class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"" name="status">								
								<option>A fazer</option>
								<option>Andamento</option>
								<option>Pendente</option>
								<option>Finalizado</option>
							</select>

							@if ($errors->has('status'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('status') }}
							</div>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="description">Descrição<i class="bi bi-asterisk text-danger small"></i></label>
							<textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" rows="3" placeholder="Descrição da tarefa"></textarea>

							@if ($errors->has('description'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('description') }}
							</div>
							@endif
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Salvar</button>
				<a href="{{ route('admin.tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</div>
	</form>
</div>


@endsection