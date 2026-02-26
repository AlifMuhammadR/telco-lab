@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <style>
        .reseller-detail-section {
            padding: 60px 0;
            background: #f8fafc;
        }

        .reseller-header-card {
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 40px;
        }

        .reseller-cover {
            height: 150px;
            background: linear-gradient(135deg, #3b5d50 0%, #1e3b32 100%);
            position: relative;
        }

        .reseller-logo-wrapper {
            position: absolute;
            bottom: -50px;
            left: 40px;
            background: white;
            border-radius: 25px;
            padding: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .reseller-logo-large {
            width: 120px;
            height: 120px;
            object-fit: contain;
        }

        .reseller-info {
            padding: 70px 40px 30px 40px;
        }

        .reseller-name {
            font-size: 2.2rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .reseller-location {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 20px;
        }

        .reseller-location i {
            color: #3b5d50;
        }

        .reseller-description {
            color: #334155;
            line-height: 1.6;
            max-width: 800px;
        }

        /* Contact section */
        .contact-section {
            background: white;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #0f172a;
        }

        .section-title i {
            color: #3b5d50;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .contact-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 20px;
            transition: all 0.3s ease;
            border-left: 4px solid #3b5d50;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-name i {
            color: #3b5d50;
            width: 24px;
        }

        .contact-detail {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #475569;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .contact-detail i {
            color: #3b5d50;
            width: 20px;
        }

        /* Products section */
        .products-section {
            background: white;
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            transition: all 0.45s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #eef2f6;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        .product-image-wrapper {
            aspect-ratio: 1/1;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-weight: 700;
            font-size: 1rem;
            color: #1e293b;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .product-brand {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 10px;
        }

        .brand-logo-small {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .brand-name-small {
            font-size: 0.8rem;
            color: #64748b;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.1rem;
            color: #3b5d50;
            margin-top: auto;
        }

        .btn-view {
            background: #3b5d50;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 5px 15px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        .btn-view:hover {
            background: #2a4a40;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .reseller-logo-wrapper {
                left: 20px;
                padding: 10px;
            }
            .reseller-logo-large {
                width: 90px;
                height: 90px;
            }
            .reseller-info {
                padding: 60px 20px 20px 20px;
            }
            .reseller-name {
                font-size: 1.8rem;
            }
            .contact-grid {
                grid-template-columns: 1fr;
            }
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }
    </style>

    <div class="reseller-detail-section">
        <div class="container">
            <!-- Header Perusahaan -->
            <div class="reseller-header-card">
                <div class="reseller-cover"></div>
                <div class="reseller-logo-wrapper">
                    <img src="{{ asset('assets/images/brand-telkom.png') }}" alt="PT Network Solution" class="reseller-logo-large">
                </div>
                <div class="reseller-info">
                    <h1 class="reseller-name">PT Network Solution</h1>
                    <div class="reseller-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jakarta, Indonesia</span>
                    </div>
                    <p class="reseller-description">
                        Perusahaan penyedia solusi jaringan terpercaya sejak 2010.
                        Menyediakan berbagai perangkat network dari brand ternama dengan layanan purna jual terbaik.
                    </p>
                </div>
            </div>

            <!-- Kontak Person -->
            <div class="contact-section">
                <h3 class="section-title">
                    <i class="fas fa-users"></i> Kontak Person
                </h3>
                <div class="contact-grid">
                    <!-- Kontak 1 -->
                    <div class="contact-card">
                        <div class="contact-name">
                            <i class="fas fa-user-circle"></i> Andi Wijaya
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-briefcase"></i> Sales Manager
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-phone-alt"></i> 0813-xxxx-xxxx
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-envelope"></i> andi@network-solution.com
                        </div>
                    </div>
                    <!-- Kontak 2 -->
                    <div class="contact-card">
                        <div class="contact-name">
                            <i class="fas fa-user-circle"></i> Budi Santoso
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-briefcase"></i> Technical Support
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-phone-alt"></i> 0812-xxxx-xxxx
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-envelope"></i> budi@network-solution.com
                        </div>
                    </div>
                    <!-- Kontak 3 -->
                    <div class="contact-card">
                        <div class="contact-name">
                            <i class="fas fa-user-circle"></i> Customer Service
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-headset"></i> 1500-123
                        </div>
                        <div class="contact-detail">
                            <i class="fas fa-envelope"></i> cs@network-solution.com
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk yang Disediakan -->
            <div class="products-section">
                <h3 class="section-title">
                    <i class="fas fa-boxes"></i> Produk yang Tersedia
                </h3>
                <div class="product-grid">
                    <!-- Product 1 -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Router Huawei">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Router AR161W</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-huawei.png') }}" class="brand-logo-small" alt="Huawei">
                                <span class="brand-name-small">Huawei</span>
                            </div>
                            <div class="product-price">$89.99</div>
                            <a href="#" class="btn-view">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Switch Cisco">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Switch Catalyst 9200</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-cisco.png') }}" class="brand-logo-small" alt="Cisco">
                                <span class="brand-name-small">Cisco</span>
                            </div>
                            <div class="product-price">$299.99</div>
                            <a href="#" class="btn-view">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Access Point Aruba">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Access Point 515</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-aruba.png') }}" class="brand-logo-small" alt="Aruba">
                                <span class="brand-name-small">Aruba</span>
                            </div>
                            <div class="product-price">$199.99</div>
                            <a href="#" class="btn-view">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Firewall Fortinet">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">FortiGate 60F</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-fortinet.png') }}" class="brand-logo-small" alt="Fortinet">
                                <span class="brand-name-small">Fortinet</span>
                            </div>
                            <div class="product-price">$399.99</div>
                            <a href="#" class="btn-view">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                    <!-- Product 5 -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Router MikroTik">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Router RB4011</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-mikrotik.png') }}" class="brand-logo-small" alt="MikroTik">
                                <span class="brand-name-small">MikroTik</span>
                            </div>
                            <div class="product-price">$159.99</div>
                            <a href="#" class="btn-view">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
