@extends('admin.layouts.master')

@section('content')

<title>{{ $usuario_tit }}</title>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="card mt-3">
				<div class="card-body">
					<div class="col-12">
						@if($errors->all())
						@foreach($errors->all() as $error)
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong><i class="bi bi-check2-circle"></i> {{ $error }}</strong> 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@endforeach
						@endif
					</div>
					<a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary float-right" data-toggle="new-create" title="Criar Novo"><i class="bi bi-plus-circle-dotted"></i> Criar Novo</a>
					<h4 class="text-muted"><i class="bi bi-person-lines-fill"></i> Usuários</h4>
					@if(count($usuarios) > 0)
					<table class="table table-hover mt-4">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nome Completo</th>
								<th scope="col">E-mail</th>
								<th scope="col">Data de criação</th>
								<th scope="col">Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
							<tr>
								<th scope="row">{{ $usuario->id }}</th>
								<td>{{ $usuario->name }}</td>
								<td><a href="mailto:{{ $usuario->email }}" data-toggle="email-toggle" title="Enviar e-mail para {{ $usuario->name }}">{{ $usuario->email }}</a></td>
								<td>{{ $usuario->created_at }}</td>
								<td>
									<form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<a class="btn btn-sm btn-light" href="{{ route('admin.usuarios.edit', $usuario->id) }}" data-toggle="edit-toggle" title="Editar {{ $usuario->name }}"><i class="bi bi-pen"></i></a>							

										<button type="submit" class="btn btn-sm btn-light" onclick="return deleteUsuario();" data-toggle="delete-toggle" title="Deletar {{ $usuario->name }}"><i class="bi bi-trash3 text-danger"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<p class="text-center text-muted"><i class="bi bi-table"></i> Tabala vazia</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('script')

<script>
	function deleteUsuario() {
		var resposta = confirm("Deseja remover esse usuário? Todas as tarefas relacionado a esse usuário serão removidos");
		if (resposta == true) {
			return true;
		} else {
			return false;
		}
	}

	$(function () {
		$('[data-toggle="new-create"]').tooltip()
		$('[data-toggle="edit-toggle"]').tooltip()
		$('[data-toggle="delete-toggle"]').tooltip()
		$('[data-toggle="email-toggle"]').tooltip()
	})
</script>

@endsection