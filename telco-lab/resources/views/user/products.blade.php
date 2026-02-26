@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
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
            <div class="product-grid">
                <!-- Product 1: Huawei -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Router Huawei">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Router AR161W</h3>
                        <div class="product-brand">
                            <img src="{{ asset('assets/images/brand-huawei.png') }}" class="brand-logo" alt="Huawei">
                            <span class="brand-name">Huawei</span>
                        </div>
                        <div class="product-price">$89.99</div>

                        <div class="provider-section">
                            <span class="provider-label">Tersedia di:</span>
                            <div class="provider-logos">
                                <img src="{{ asset('assets/images/brand-telkom.png') }}" class="provider-logo"
                                    alt="Telkom" title="PT Telkom Indonesia">
                                <img src="{{ asset('assets/images/brand-multipolar.webp') }}" class="provider-logo"
                                    alt="Multipolar" title="PT Multipolar">
                                <img src="{{ asset('assets/images/brand-infra.png') }}" class="provider-logo" alt="Infra"
                                    title="PT Infra Digital">
                            </div>
                        </div>

                        <div class="product-footer">
                            <span class="availability">Detail</span>
                            <a href="#" class="btn-detail-icon" title="Lihat detail produk">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product 2: Cisco -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Switch Cisco">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Switch Catalyst 9200</h3>
                        <div class="product-brand">
                            <img src="{{ asset('assets/images/brand-cisco.png') }}" class="brand-logo" alt="Cisco">
                            <span class="brand-name">Cisco</span>
                        </div>
                        <div class="product-price">$299.99</div>

                        <div class="provider-section">
                            <span class="provider-label">Tersedia di:</span>
                            <div class="provider-logos">
                                <img src="{{ asset('assets/images/brand-telkom.png') }}" class="provider-logo"
                                    alt="Telkom" title="PT Telkom Indonesia">
                                <img src="{{ asset('assets/images/brand-infra.png') }}" class="provider-logo" alt="Infra"
                                    title="PT Infra Digital">
                            </div>
                        </div>

                        <div class="product-footer">
                            <span class="availability">Detail</span>
                            <a href="#" class="btn-detail-icon" title="Lihat detail produk">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product 3: Aruba -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Access Point Aruba">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Access Point 515</h3>
                        <div class="product-brand">
                            <img src="{{ asset('assets/images/brand-aruba.png') }}" class="brand-logo" alt="Aruba">
                            <span class="brand-name">Aruba</span>
                        </div>
                        <div class="product-price">$199.99</div>

                        <div class="provider-section">
                            <span class="provider-label">Tersedia di:</span>
                            <div class="provider-logos">
                                <img src="{{ asset('assets/images/brand-multipolar.webp') }}" class="provider-logo"
                                    alt="Multipolar" title="PT Multipolar">
                                <img src="{{ asset('assets/images/brand-infra.png') }}" class="provider-logo"
                                    alt="Infra" title="PT Infra Digital">
                            </div>
                        </div>

                        <div class="product-footer">
                            <span class="availability">Detail</span>
                            <a href="#" class="btn-detail-icon" title="Lihat detail produk">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product 4: Fortinet -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Firewall Fortinet">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">FortiGate 60F</h3>
                        <div class="product-brand">
                            <img src="{{ asset('assets/images/brand-fortinet.png') }}" class="brand-logo"
                                alt="Fortinet">
                            <span class="brand-name">Fortinet</span>
                        </div>
                        <div class="product-price">$399.99</div>

                        <div class="provider-section">
                            <span class="provider-label">Tersedia di:</span>
                            <div class="provider-logos">
                                <img src="{{ asset('assets/images/brand-telkom.png') }}" class="provider-logo"
                                    alt="Telkom" title="PT Telkom Indonesia">
                                <img src="{{ asset('assets/images/brand-multipolar.webp') }}" class="provider-logo"
                                    alt="Multipolar" title="PT Multipolar">
                            </div>
                        </div>

                        <div class="product-footer">
                            <span class="availability">Detail</span>
                            <a href="#" class="btn-detail-icon" title="Lihat detail produk">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product 5: MikroTik -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Router MikroTik">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Router RB4011</h3>
                        <div class="product-brand">
                            <img src="{{ asset('assets/images/brand-mikrotik.png') }}" class="brand-logo"
                                alt="MikroTik">
                            <span class="brand-name">MikroTik</span>
                        </div>
                        <div class="product-price">$159.99</div>

                        <div class="provider-section">
                            <span class="provider-label">Tersedia di:</span>
                            <div class="provider-logos">
                                <img src="{{ asset('assets/images/brand-telkom.png') }}" class="provider-logo"
                                    alt="Telkom" title="PT Telkom Indonesia">
                                <img src="{{ asset('assets/images/brand-infra.png') }}" class="provider-logo"
                                    alt="Infra" title="PT Infra Digital">
                            </div>
                        </div>

                        <div class="product-footer">
                            <span class="availability">Detail</span>
                            <a href="#" class="btn-detail-icon" title="Lihat detail produk">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
