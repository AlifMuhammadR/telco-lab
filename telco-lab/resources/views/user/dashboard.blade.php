@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <!-- Alert Success (opsional, jika ada session dari redirect) -->
    @if (session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- LEFT INTRO -->
                <div class="col-lg-3">
                    <h2 class="mb-3 section-title">Brand Network Devices</h2>
                    <p class="mb-3">
                        Vendor perangkat jaringan enterprise router, switch,
                        firewall, access point, dan optical devices.
                    </p>
                    <p>
                        <!-- Tombol Explore (untuk semua user) -->
                        <a href="#" class="btn">Explore</a>
                    </p>
                </div>

                <!-- RIGHT GRID (daftar vendor dinamis) -->
                <div class="col-lg-9">
                    <div class="row">
                        @forelse($vendors as $vendor)
                            <div class="col-6 col-md-4 mb-4">
                                <a class="product-item text-center" href="#">
                                    @if ($vendor->logo)
                                        <img src="{{ asset('storage/' . $vendor->logo) }}"
                                            class="img-fluid product-thumbnail" alt="{{ $vendor->name }}">
                                    @else
                                        <img src="{{ asset('assets/images/placeholder.png') }}"
                                            class="img-fluid product-thumbnail" alt="No logo">
                                    @endif
                                    <h3 class="product-title">{{ $vendor->name }}</h3>
                                    <span class="icon-cross">
                                        <img src="{{ asset('assets/images/cross.svg') }}">
                                    </span>
                                </a>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">Belum ada vendor tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Product Section -->
@endsection
