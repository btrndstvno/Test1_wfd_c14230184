@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Tambah Promosi</h1>

    {{-- Tombol Kembali --}}
    <a href="{{ route('promotions.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

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

    {{-- Form Tambah --}}
    <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('promotions._form')
    </form>
@endsection
