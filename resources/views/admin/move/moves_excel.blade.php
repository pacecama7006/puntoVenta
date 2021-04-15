<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_Movimientos</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Movimientos al: {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
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