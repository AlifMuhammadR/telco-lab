@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>About Us</h1>
                        <p class="mb-4">Informasi perangkat jaringan (Network Devices) yang menyediakan data lengkap.
                        </p>
                        <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#"
                                class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('assets/images/juniper.png') }}" class="img-fluid hero-device">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
@endsection
@section('content')
    <style>
        .products-section {
            padding: 60px 0;
            background: #f8fafc;
        }

        .section-header {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1e293b;
            position: relative;
            padding-bottom: 12px;
            border-bottom: 2px solid #3b5d50;
            display: inline-block;
            letter-spacing: -0.02em;
        }

        /* Grid produk */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
        }

        /* Kartu produk dengan gaya klasik */
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #edf2f7;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: #3b5d50;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.06);
        }

        .product-image-wrapper {
            aspect-ratio: 1/1;
            background: #f9fbfd;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            border-bottom: 1px solid #edf2f7;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.06);
        }

        .product-info {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: #1e293b;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .product-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #dce5e4;
        }

        .brand-logo {
            width: 28px;
            height: 28px;
            object-fit: contain;
            border-radius: 6px;
            background: white;
            padding: 4px;
            border: 1px solid #edf2f7;
        }

        .brand-name {
            font-size: 0.9rem;
            color: #64748b;
            font-weight: 500;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.2rem;
            color: #3b5d50;
            margin-bottom: 16px;
        }

        /* Provider logos */
        .provider-section {
            margin: 0 0 16px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .provider-label {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .provider-logos {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .provider-logo {
            width: 36px;
            height: 36px;
            object-fit: contain;
            border-radius: 8px;
            background: white;
            padding: 5px;
            border: 1px solid #edf2f7;
            transition: all 0.2s ease;
        }

        .provider-logo:hover {
            border-color: #3b5d50;
            transform: scale(1.08);
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            border-top: 1px solid #edf2f7;
            padding-top: 16px;
        }

        .btn-detail-icon {
            color: #94a3b8;
            transition: all 0.2s;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f1f5f9;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .btn-detail-icon:hover {
            background: #3b5d50;
            color: white;
            transform: scale(1.05);
        }

        .availability {
            font-size: 0.75rem;
            color: #3b5d50;
            background: #e8f0ed;
            padding: 4px 10px;
            border-radius: 30px;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
            }

            .product-image-wrapper {
                padding: 16px;
            }

            .product-info {
                padding: 16px;
            }

            .provider-logo {
                width: 32px;
                height: 32px;
            }
        }
    </style>
    <div class="products-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Daftar Produk</h2>
            </div>

            <div class="product-grid">
                @forelse($products as $product)
                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.png') }}"
                                    class="product-image" alt="{{ $product->name }}">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <div class="product-brand">
                                    @if ($product->vendor)
                                        <img src="{{ $product->vendor->logo ? asset('storage/' . $product->vendor->logo) : asset('assets/images/placeholder.png') }}"
                                            class="brand-logo" alt="{{ $product->vendor->name }}">
                                        <span class="brand-name">{{ $product->vendor->name }}</span>
                                    @endif
                                </div>
                                <div class="product-price" hidden>${{ number_format($product->price, 2) }}</div>
                                <div class="provider-section">
                                    <span class="provider-label">Tersedia di:</span>
                                    <div class="provider-logos">
                                        @forelse($product->companies as $company)
                                            <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('assets/images/placeholder.png') }}"
                                                class="provider-logo" alt="{{ $company->name }}"
                                                title="{{ $company->name }}">
                                        @empty
                                            <span class="text-muted">-</span>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <span class="availability">Detail</span>
                                    <span class="btn-detail-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada produk tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
