@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hewan Baru</h2>
    <form action="{{ route('animals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Hewan</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
