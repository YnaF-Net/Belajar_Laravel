@extends('main')
@section('content')
<br><br>
    <form action="{{ route('action-kurang') }}" method="post">
        @csrf
        {{-- csrf input type name --}}
        <label for="">Angka 1</label>
        <input type="text" placeholder="Masukan Angka" name="angka_1"> <br>
        - <br>
        <label for="">Angka 2</label>
        <input type="text" placeholder="Masukan Angka" name="angka_2">

        <br>
        <br>
        <button type="submit">Proses</button>
    </form>

    <h1>Jumlahnya ialah: {{ $jumlah }}</h1>
@endsection
