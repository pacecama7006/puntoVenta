<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado_Medidas</title>
</head>
<body>
	<table>
		<tr>
			<td colspan="2">Reporte de medidas al {{ \Carbon\Carbon::now()->format('d-m-Y') }}.</td>
		</tr>
		<thead>
			<tr>
				<th>Medida</th>
				<th>Símbolo</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($measures as $measure)
			<tr>
				<td>{{ $measure->medida }}</td>
				<td>{{ $measure->simbolo }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>