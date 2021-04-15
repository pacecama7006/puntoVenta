<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		table {
		  width:100%;
		}
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		}
		th, td {
		  padding: 15px;
		  text-align: left;
		}
		#t01 tr:nth-child(even){
			background-color: #eee;
		}
		#t01 tr:nth-child(odd) {
			background-color: #fff;
		}
		#t01 th {
			background-color: black;
			color: white;
		}
	</style>
	<title>Listado_Movimientos</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de Movimientos al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
		<thead>
			<tr>
				<th>Caja</th>
				<th>Fecha de movimiento</th>
				<th>Tipo de movimiento</th>
				<th>Concepto de movimiento</th>
				<th>Motivo</th>
				<th>Importe</th>
				<th>Conciliado</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($moves as $moves)
				<tr>
					<td>{{ $moves->box->name }}</td>
					<td> {{ date('d-m-Y', strtotime($moves->fecha_mov)) }}</td>
					<td> {{ $moves->tipo }}</td>
					<td>{{ $moves->concept->concepto }}</td>
					<td> {{ $moves->detalle }}</td>
					<td> {{ number_format($moves->importe,2,'.',',') }}</td>
					@if ($moves->conciliado == 0)
						<td>No conciliado</td>
					@else
						<td>Conciliado</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>