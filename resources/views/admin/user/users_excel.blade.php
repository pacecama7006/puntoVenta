<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_de_Usuarios</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Usuarios al: {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Rol</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td> {{ $user->email  }}</td>
					@foreach ($user->roles as $role)
						<td> {{ $role->name }}</td>
					@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>