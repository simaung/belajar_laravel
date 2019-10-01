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
    <h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Data Pegawai</h3>
 
	<a href="/pegawai"> Kembali</a>
	
	<br/>

	{{-- menampilkan error validasi --}}
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<br/>
 
	<form action="/pegawai/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="nama" required="required"  value="{{ old('nama') }}"> <br/>
		Jabatan <input type="text" name="jabatan" required="required" value="{{ old('jabatan') }}"> <br/>
		Umur <input type="number" name="umur" required="required" value="{{ old('umur') }}"> <br/>
		Alamat <textarea name="alamat" required="required">{{ old('alamat') }}</textarea> <br/>
		<input type="submit" value="Simpan Data">
	</form>
</body>
</html>