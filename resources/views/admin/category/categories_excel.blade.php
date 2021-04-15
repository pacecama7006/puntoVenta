<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ListadoCategorías</title>
</head>
<body>
	<table>
		<tr>
			<td colspan="2">Reporte de categorías al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->name }}</td>
				<td> {{ $category->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>