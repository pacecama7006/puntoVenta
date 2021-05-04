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
	<title>Listado_de_Productos</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de Productos al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Stock</th>
				<th>Medida</th>
				<th>Precio de venta</th>
				<th>Imagen</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
				<tr>
					<td>{{ $product->code }}</td>
					<td> {{ $product->name }}</td>
					<td> {{ $product->description }}</td>
					<td> {{ number_format($product->stock,2,'.',',') }}</td>
					<td> {{ $product->measure->simbolo }}</td>
					<td> {{ number_format($product->sell_price,2,'.',',') }}</td>
					<td>
						@if ($product->image)
							<img src="{{ Storage::url($product->image) }}" width="100px" alt="producto" class="img-lg rounded-circle mb-3">
						@else
							No existe imágen
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>