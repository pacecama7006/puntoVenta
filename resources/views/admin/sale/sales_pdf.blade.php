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
	<title>Listado_de_Ventas</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de Ventas al: {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
		<thead>
			<tr>
				<th>Número de venta</th>
				<th>Fecha de venta</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Cliente</th>
				<th>Vendedor</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($sales as $sales)
				<tr>
					<td> {{ $sales->num_vta }}</td>
					<td>{{ date('d-m-Y', strtotime($sales->sale_date)) }}</td>
					<td>$  {{ number_format($sales->total,2,'.',',')  }}</td>
					<td> {{ $sales->status }}</td>
					<td> {{ $sales->client->name }}</td>
					<td> {{ $sales->user->name  }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>