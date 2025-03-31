@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Promosi</h1>

    {{-- Tombol Kembali --}}
    <a href="{{ route('promotions.show', $promotion) }}" class="btn btn-secondary mb-3">← Kembali</a>

    {{-- Error Handler --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Edit --}}
    <form action="{{ route('promotions.update', $promotion) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('promotions._form')
    </form>
@endsection
