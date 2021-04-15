<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de Clientes</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Movimientos al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>R.F.C.</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Correo</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($clients as $client)
				<tr>
					<td>{{ $client->name }}</td>
					<td> {{ $client->rfc_number }}</td>
					<td> {{ $client->address }}</td>
					<td> {{ $client->phone }}</td>
					<td> {{ $client->email }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>