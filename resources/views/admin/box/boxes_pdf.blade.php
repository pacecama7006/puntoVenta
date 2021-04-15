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
	<title>Listado_Cajas</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de cajas al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
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