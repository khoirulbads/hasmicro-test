@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Hasil Pengecekan Karakter</h2>

    <p><strong>Input 1:</strong> {{ $input1 }}</p>
    <p><strong>Input 2:</strong> {{ $input2 }}</p>
    <p><strong>Persentase:</strong> {{ number_format($percentage, 2) }}%</p>

    <a href="{{ route('character-check.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
