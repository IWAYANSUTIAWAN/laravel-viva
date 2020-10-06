<html>
<head>
	<title>Daftar Scaner</title>
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
		<h5>Daftar Scaner</h4>
		<h6><a target="_blank" href="">IT Asset</a></h5>
	</center>
 
	<table class="table table-striped table-bordered table-sm">
		<thead>
			<tr>
				<th style="width:5%;">No</th>
                        <th>Merek</th>
                        <th>Tipe</th>
                        <th>Serial Number</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th>Region</th>
                        <th>Keterangan</th>
                        
                </tr>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td style="width:5%;">{{ $i++ }}</td>
                <td>{{$p->merek}}</td>
                <td>{{ $p->tipe }}</td>
                <td>{{ $p->sn }}</td>
                <td>{{ $p->kondisi }}</td>
                <td>{{ $p->location_name }}</td>
                <td>{{ $p->region }}</td>
                <td>{{ $p->keterangan }}</td>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>