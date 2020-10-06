<html>
<head>
	<title>Daftar Isp</title>
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
		<h5>Daftar Isp</h4>
		<h6><a target="_blank" href="">IT Asset</a></h5>
	</center>
 
	<table class="table table-striped table-bordered table-sm">
		<thead>
			<tr>
				<th style="width:5%;">No</th>
                        <th>Nomor Telpon</th>
                        <th>Nomor Internet</th>
                        <th>Kecepatan</th>
                        <th>Status</th>
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
                <td>{{$p->nomor_tlp}}</td>
                <td>{{ $p->nomor_inet }}</td>
                <td>{{ $p->kecepatan }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->location_name }}</td>
                <td>{{ $p->region }}</td>
                <td>{{ $p->keterangan }}</td>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>