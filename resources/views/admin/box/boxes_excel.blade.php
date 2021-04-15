<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_Cajas</title>
</head>
<body>
	<table>
		<tr>
			<td colspan="2">Reporte de cajas al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Responsable</th>
				<th>Saldo</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($boxes as $box)
				<tr>
					<td>{{ $box->name }}</td>
					<td> {{ $box->user->name }}</td>
					<td> {{ number_format($box->saldo,2,'.',',') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>