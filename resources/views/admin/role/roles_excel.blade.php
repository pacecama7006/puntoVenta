<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_de_Roles</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Roles al: {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($roles as $role)
				<tr>
					<td>{{ $role->name }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>