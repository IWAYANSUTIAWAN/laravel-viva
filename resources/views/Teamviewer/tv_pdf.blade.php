<html>
<head>
	<title>Daftar Teamviewer</title>
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
		<h5>Daftar Teamviewer</h4>
		<h6><a target="_blank" href="">IT Asset</a></h5>
	</center>
 
	<table class="table table-striped table-bordered table-sm">
		<thead>
			<tr>
				<th style="width:5%;">No</th>
                        <th style="width:15%;">Location</th>
                        <th>ID Teamviewer</th>
                        <th style="width:40%;">Password</th>
                        <th style="width:40%;">Pengguna</th>
                </tr>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($tv as $p)
			<tr>
				<td style="width:5%;">{{ $i++ }}</td>
                <td>{{$p->location_name}}</td>
                <td>{{ $p->kode_id }}</td>
				<td>{{ $p->password }}</td>
				<td>{{ $p->pengguna }}</td>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>