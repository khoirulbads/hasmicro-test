@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Perhitungan Persentase Karakter</h2>

    <form action="{{ route('character-check.check') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="input1" class="form-label">Input 1</label>
            <input type="text" class="form-control" id="input1" name="input1" required>
        </div>
        <div class="mb-3">
            <label for="input2" class="form-label">Input 2</label>
            <input type="text" class="form-control" id="input2" name="input2" required>
        </div>
        <button type="submit" class="btn btn-primary">Hitung Persentase</button>
    </form>
</div>
@endsection
