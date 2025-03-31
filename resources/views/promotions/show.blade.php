@extends('layouts.app')

@section('content')
    <a href="{{ route('promotions.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <h1 class="mb-3">{{ $promotion->title }}</h1>

    @if ($promotion->image)
        <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover;">
    @else
        <img src="https://via.placeholder.com/600x300?text=No+Image" alt="No Image" class="img-fluid rounded mb-4">
    @endif

    <p>{!! nl2br(e($promotion->description)) !!}</p>

    <div class="d-flex gap-2 mt-4">
        <a href="{{ route('promotions.edit', $promotion) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" onsubmit="return confirm('Yakin hapus promosi ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
@endsection
