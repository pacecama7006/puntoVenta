<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detalle_de_venta</title>
</head>
<body>
	<table>
		<caption>Detalle de venta.</caption>
		<thead>
			<tr>
				<th>Número de venta</th>
				<th>Fecha de venta</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Cliente</th>
				<th>Vendedor</th>
				<th>Productos</th>
				<th>Cantidad</th>
				<th>Precio</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td> {{ $sale->num_vta }}</td>
				<td>{{ date('d-m-Y', strtotime($sale->sale_date)) }}</td>
				<td>$  {{ number_format($sale->total,2,'.',',')  }}</td>
				<td> {{ $sale->status }}</td>
				<td> {{ $sale->client->name }}</td>
				<td> {{ $sale->user->name  }}</td>
			</tr>
			@foreach ($sale->saleDetails as $detalle)
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>{{ $detalle->product->name }}</td>
					<td>{{ $detalle->quantity }}</td>
					<td>{{ $detalle->price }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>