@extends('admin.layouts.master')

@section('content')

<title>{{ $tit_dashboard }}</title>

<div class="container">
	<div class="card mt-3">
		<div class="card-body">
			<div class="row" align="center">
				<div class="col-sm-6">
					<div class="card border-dark mb-3" style="max-width: 18rem;">
						<div class="card-header"><i class="bi bi-person-lines-fill"></i> Usuários</div>
						<div class="card-body text-dark">
							<h5 class="card-title">Todos os Usuários</h5>
							<p class="card-text font-weight-bold">{{ count($usuarios) }}</p>
							<a href="" class="btn btn-primary">Usuários</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card border-dark mb-3" style="max-width: 18rem;">
						<div class="card-header"><i class="bi bi-list-task"></i> Tarefas</div>
						<div class="card-body text-dark">
							<h5 class="card-title">Todas as Tarefas</h5>
							<p class="card-text font-weight-bold">{{ count($tarefas) }}</p>
							<a href="" class="btn btn-primary">Tarefas</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row mt-2">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div id="chart-task" style="height: 220px; width: 100%;"></div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('script')

<script>
	window.onload = function () {

		var chart = new CanvasJS.Chart("chart-task", {
			exportEnabled: true,
			animationEnabled: true,
			title: {
				text: "Gráfico do Sistema"
			},
			legend: {
				cursor: "pointer",
				itemclick: explodePie
			},
			data: [{
				type: "pie",
				showInLegend: true,
				toolTipContent: "{name}: <strong>{y}%</strong>",
				indexLabel: "{name} - {y}",
				dataPoints: [
				{y:{{ count($tarefas) }}, name: "Tarefas", exploded: true},
				{y:{{ count($usuarios) }}, name: "Usuários", exploded: true}				
				]
			}]
		});
		chart.render();
	}

	function explodePie(e) {
		if (typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
		} else {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
		}
		e.chart.render();

	}
</script>
@endsection
