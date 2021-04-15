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
	<title>Listado de Clientes</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de Clientes al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
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