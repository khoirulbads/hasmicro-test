@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hewan</h2>
    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Hewan</label>
            <input type="text" name="name" class="form-control" value="{{ $animal->name }}" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $animal->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
