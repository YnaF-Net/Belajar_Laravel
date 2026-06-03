<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Perhitungan Matematika</h1>
    <a href="/tambah">Tambah</a>
    <a href="{{ url('kurang') }}">Kurang</a>
    <a href="{{ route('kali') }}">Kali</a>
    <a href="{{ route('bagi') }}">Bagi</a>
    <a href="{{ url()->previous() }}">Kembali</a>
</body>
</html>
