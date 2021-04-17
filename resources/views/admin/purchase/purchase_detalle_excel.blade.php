<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detalle_de_Compra</title>
</head>
<body>
	<table>
		<caption>Detalle de compra.</caption>
		<thead>
			<tr>
				<th>Número de compra</th>
				<th>Fecha de compra</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Proveedor</th>
				<th>Comprador</th>
				<th>Productos</th>
				<th>Cantidad</th>
				<th>Precio</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $purchase->num_compra }}</td>
				<td>{{ date('d-m-Y', strtotime($purchase->purchase_date)) }}</td>
				<td>$  {{ number_format($purchase->total,2,'.',',')  }}</td>
				<td> {{ $purchase->status }}</td>
				<td> {{ $purchase->provider->name }}</td>
				<td> {{ $purchase->user->name  }}</td>
			</tr>
			@foreach ($purchase->purchaseDetails as $detalle)
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