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
	<title>Listado_Categorías</title>
</head>
<body>
	<table id="t01">
		<caption>Reporte de Categorías al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</caption>
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