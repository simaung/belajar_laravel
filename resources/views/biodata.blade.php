<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorial Laravel #4 : Passing Data Controller Ke View Laravel - www.malasngoding.com</title>
</head>
<body>
    <h1>Tutorial Laravel</h1>
    <a href="https://www.malasngoding.com/category/laravel">www.malasngoding.com</a>
    <br>
    <p>Nama : {{ $nama }}</p>
    <ul>
		@foreach($matkul as $m)
		<li>{{ $m }}</li>
		@endforeach
	</ul>
</body>
</html>