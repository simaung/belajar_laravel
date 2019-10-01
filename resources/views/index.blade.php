<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>

	<style type="text/css">
	.pagination li{
		float: left;
		list-style-type: none;
		margin:5px;
	}
	</style>
	<div class="container">
		<h2>www.malasngoding.com</h2>
		<h3>Data Pegawai</h3>

		<p>Cari Data Pegawai :</p>
		<form action="/pegawai/cari" method="GET">
			<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
			<input type="submit" value="CARI">
		</form>
			
		<br/>
	
		<a href="/pegawai/tambah"> + Tambah Pegawai Baru</a>
		
		<br/>
		<br/>
	
		<table class="table table-striped table-bordered">
			<tr>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Umur</th>
				<th>Alamat</th>
				<th>Opsi</th>
			</tr>
			@foreach($pegawai as $p)
			<tr>
				<td>{{ $p->nama }}</td>
				<td>{{ $p->jabatan }}</td>
				<td>{{ $p->umur }}</td>
				<td>{{ $p->alamat }}</td>
				<td>
					<a href="/pegawai/edit/{{ $p->id }}">Edit</a>
					|
					<a href="/pegawai/hapus/{{ $p->id }}">Hapus</a>
				</td>
			</tr>
			@endforeach
		</table>

		<br/>
		Halaman : {{ $pegawai->currentPage() }} <br/>
		Jumlah Data : {{ $pegawai->total() }} <br/>
		Data Per Halaman : {{ $pegawai->perPage() }} <br/>
	
	
		{{ $pegawai->links() }}
	</div>
</body>
</html>