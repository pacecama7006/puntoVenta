<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_de_Compras</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Compras al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Número de compra</th>
				<th>Fecha de compra</th>
				<th>Total</th>
				<th>Estado</th>
				<th>Proveedor</th>
				<th>Comprador</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($purchases as $purchase)
				<tr>
					<td>{{ $purchase->num_compra  }}</td>
					<td>{{ date('d-m-Y', strtotime($purchase->purchase_date)) }}</td>
					<td>$  {{ number_format($purchase->total,2,'.',',')  }}</td>
					<td> {{ $purchase->status }}</td>
					<td> {{ $purchase->provider->name }}</td>
					<td> {{ $purchase->user->name  }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>