<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="{{ url(mix('assets/css/bootstrap.css')) }}">
	 <link rel="icon" type="image/png" href="{{ url('assets/logotipo/logotipo.png') }}"/>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">


	@hasSection('css')
	@yield('css')
	@endif

</head>
<body>

	<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Gerencimento de Tarefas</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item {{ isActive('admin.home') }}">
					<a class="nav-link" href="{{ route('admin.home') }}" title="Área de Trabalho"><i class="bi bi-pc-display"></i></a>
				</li>
				<li class="nav-item {{ isActive('admin.usuarios') }}">
					<a class="nav-link" href="{{ route('admin.usuarios.index') }}" title="Usuários"><i class="bi bi-person-lines-fill"></i></a>
				</li>
				<li class="nav-item {{ isActive('admin.tarefas') }}">
					<a class="nav-link" href="{{ route('admin.tarefas.index') }}" title="Tarefas"><i class="bi bi-list-task"></i></a>
				</li>
			</ul>

			<div>
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-person-circle"></i> {{ Auth:: user()->name }}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="{{ route('admin.logout') }}" class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Sair</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	@yield('content')

	<script src="{{ url(mix('assets/js/jquery.js')) }}"></script>
	<script src="{{ url(mix('assets/js/bundle.js')) }}"></script>
	<script src="{{ url(mix('assets/js/canvasjs.js')) }}"></script>

	@hasSection('script')
	@yield('script')
	@endif

</body>
</html>
