<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_Conceptos</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de conceptos al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Concepto</th>
				<th>Tipo</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($concepts as $concept)
				<tr>
					<td>{{ $concept->concepto }}</td>
					<td> {{ $concept->tipo }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>