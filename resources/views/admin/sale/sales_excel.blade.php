<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_de_Ventas</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Ventas al: {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
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