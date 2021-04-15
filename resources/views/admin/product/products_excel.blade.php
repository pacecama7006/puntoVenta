<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_de_Productos</title>
</head>
<body>
	<table>
		<tr>
			<td>Reporte de Productos al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Stock</th>
				<th>Precio de venta</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
				<tr>
					<td>{{ $product->code }}</td>
					<td> {{ $product->name }}</td>
					<td> {{ $product->description }}</td>
					<td> {{ number_format($product->stock,2,'.',',') }}</td>
					<td> {{ number_format($product->sell_price,2,'.',',') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>