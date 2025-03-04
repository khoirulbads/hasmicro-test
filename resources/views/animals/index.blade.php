@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Hewan</h2>
    <a href="{{ route('animals.create') }}" class="btn btn-primary">Tambah Hewan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Kategori</th>
                <th>Presentase</th>
                <th>Pola</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
            <tr>
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->jumlah }}</td>
                <td>{{ $animal->category }}</td>
                <td>{{ number_format($animal->getPercentageAttribute(), 2) }}%</td>
                <td>
                    <pre>{{ $animal->pattern }}</pre>
                </td>
                <td>{{ $animal->getCreatedAtAttribute($animal->created_at) }}</td>
                <td>
                    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Ubah</a>
                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
