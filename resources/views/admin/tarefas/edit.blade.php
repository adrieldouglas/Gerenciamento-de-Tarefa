@extends('admin.layouts.master')

@section('content')

<title>{{ $tarefas_edit }}</title>

<div class="container">
	<form action="{{ route('admin.tarefas.update', $tarefa->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="card mt-3">
			<div class="card-body">
				<h4 class="text-muted text-right"><i class="bi bi-pen"></i> Editar Tarefa</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="usuario_id">Todos os Usuários<i class="bi bi-asterisk text-danger small"></i></label>
							<select multiple class="form-control {{ $errors->has('usuario_id') ? 'is-invalid' : '' }}" name="usuario_id">								
								<option value="{{ $tarefa->usuario_id }}">{{ $tarefa->usuarios()->first()->name }}</option>
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
							<input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $tarefa->title }}">

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
							<select multiple class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status">								
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
							<textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" rows="3" >{{ $tarefa->description }}</textarea>

							@if ($errors->has('description'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('description') }}
							</div>
							@endif
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Atualizar</button>
				<a href="{{ route('admin.tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</div>
	</form>
</div>


@endsection