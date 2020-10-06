<html>
<head>
	<title>Laporan Lokasi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Lokasi</h4>
		<h6><a target="_blank" href="">IT Asset</a></h5>
	</center>
 
	<table class="table table-striped table-bordered table-sm">
		<thead>
			<tr>
				<th style="width:5%;">No</th>
                        <th style="width:15%;">Location ID</th>
                        <th>Nama Lokasi</th>
                        <th style="width:40%;">Alamat</th>
                        
                </tr>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($lokasi as $p)
			<tr>
				<td style="width:5%;">{{ $i++ }}</td>
                <td>{{$p->location_id}}</td>
                <td>{{ $p->location_name }}</td>
				<td>{{ $p->alamat }}</td>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>