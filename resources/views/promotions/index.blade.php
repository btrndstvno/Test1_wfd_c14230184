@extends('layouts.app')

@section('content')
    <h1 class="fw-bold display-5 mb-4">Petra Event</h1>



    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success fade show" id="success-alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function () {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($promotions as $promo)
            <div class="col">
                <div class="card h-100">
                    @if($promo->created_at->gt(\Carbon\Carbon::now()->subHours(6)))
                        <span class="badge bg-success mb-2">Baru</span>
                    @endif
                
                    {{-- Gambar --}}
                    @if ($promo->image)
                        <img src="{{ asset('storage/' . $promo->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $promo->title }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" style="height: 200px; object-fit: cover;" alt="No Image">
                    @endif

                    {{-- Isi Kartu --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $promo->title }}</h5>
                        <p class="card-text">{{ Str::limit($promo->description, 100) }}</p>

                        {{-- Posted dan Edited --}}
                        <small class="text-muted d-block">Posted : {{ $promo->created_at->format('d M Y H:i') }}</small>
                        @if ($promo->created_at != $promo->updated_at)
                            <small class="text-muted d-block mb-2">Edited : {{ $promo->updated_at->format('d M Y H:i') }}</small>
                        @else
                            <small class="text-muted d-block mb-2">Edited : -</small>
                        @endif

                        <a href="{{ route('promotions.show', $promo) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
