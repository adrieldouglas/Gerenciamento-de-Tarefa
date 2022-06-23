@extends('admin.layouts.master')

@section('content')

<title>{{ $tarefa_tit }}</title>

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
					<a href="{{ route('admin.tarefas.create') }}" class="btn btn-primary float-right" data-toggle="add-toggle" title="Adicionar tarefas"><i class="bi bi-plus-circle-dotted"></i> Adicionar Tarefas</a>
					<h4 class="text-muted"><i class="bi bi-list-task"></i> Tarefas</h4>

					@if(count($tarefas) > 0)
					<table class="table table-hover mt-4">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Usuário</th>
								<th scope="col">Título</th>
								<th scope="col">Descrição</th>
								<th scope="col">Status</th>
								<th scope="col">Postado</th>
								<th scope="col">Opções</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tarefas as $tarefa)
							<tr>
								<th scope="row">{{ $tarefa->id }}</th>
								<td>{{ $tarefa->usuarios()->first()->name }}</td>
								<td>{{ $tarefa->title }}</td>
								<td>{{ $tarefa->description }}</td>
								<td>{{ $tarefa->status }}</td>
								<td>{{ $tarefa->created_at }}</td>
								<td>
									<form action="{{ route('admin.tarefas.destroy', $tarefa->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<a href="{{ route('admin.tarefas.edit', $tarefa->id) }}" class="btn btn-sm btn-light" data-toggle="edit-toggle" title="Editar tarefa de {{ $tarefa->usuarios()->first()->name }}"><i class="bi bi-pen"></i></a>

										<button type="submit" onclick="return deleteTarefa();" class="btn btn-sm btn-light" data-toggle="delete-toggle" title="Deletar tarefa de {{ $tarefa->usuarios()->first()->name }}"><i class="bi bi-trash3 text-danger"></i></button>
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
	function deleteTarefa() {
		var resposta = confirm("Deseja remover esse tarefa?");
		if (resposta == true) {
			return true;
		} else {
			return false;
		}
	}

	$(function () {
		$('[data-toggle="edit-toggle"]').tooltip()
		$('[data-toggle="delete-toggle"]').tooltip()
		$('[data-toggle="add-toggle"]').tooltip()
	})

</script>
@endsection