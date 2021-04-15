<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_de_Proveedores</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Proveedores al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
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
			@foreach ($providers as $providers)
				<tr>
					<td>{{ $providers->name }}</td>
					<td> {{ $providers->rfc_number  }}</td>
					<td> {{ $providers->adress }}</td>
					<td> {{ $providers->phone }}</td>
					<td> {{ $providers->email  }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>