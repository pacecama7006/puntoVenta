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
	<title>Listado_de_Usuarios</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de Usuarios al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
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