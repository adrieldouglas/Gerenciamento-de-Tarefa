@extends('admin.layouts.master')

@section('content')

<title>{{ $usuario_edit }}</title>

<div class="container">
	<form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="card mt-3">
			<div class="card-body">
				
				<h4 class="text-muted text-right"><i class="bi bi-pen"></i> Editar Usuário</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="name">Nome Completo</label>
							<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $usuario->name }}">

							@if ($errors->has('name'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('name') }}
							</div>
							@endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $usuario->email }}">

							@if ($errors->has('email'))
							<div class="invalid-feedback">
								<i class="bi bi-exclamation-triangle"></i>
								{{ $errors->first('email') }}
							</div>
							@endif
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-danger">Atualizar</button>
				<a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</div>
	</form>
</div>

@endsection