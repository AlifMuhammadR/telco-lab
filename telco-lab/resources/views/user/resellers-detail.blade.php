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

        /* Header dengan desain klasik & clean */
        .reseller-header-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            border: 1px solid #edf2f7;
            overflow: hidden;
        }

        .reseller-header-content {
            padding: 40px 40px 30px 40px;
            display: flex;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .reseller-logo-wrapper {
            background: white;
            border-radius: 12px;
            padding: 8px;
            border: 1px solid #edf2f7;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .reseller-logo-large {
            width: 120px;
            height: 120px;
            object-fit: contain;
            display: block;
        }

        .reseller-info {
            flex: 1;
            min-width: 300px;
        }

        .reseller-name {
            font-size: 2rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .reseller-location {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
            color: #64748b;
            margin-bottom: 16px;
            border-bottom: 1px solid #e9eef2;
            padding-bottom: 16px;
        }

        .reseller-location i {
            color: #3b5d50;
        }

        .reseller-description {
            color: #475569;
            line-height: 1.7;
            font-size: 1rem;
            max-width: 800px;
            font-weight: 400;
        }

        /* Contact section - klasik dengan garis */
        .contact-section {
            background: white;
            border-radius: 16px;
            padding: 30px 40px;
            margin-bottom: 30px;
            border: 1px solid #edf2f7;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #1e293b;
            position: relative;
            padding-bottom: 10px;
            border-bottom: 2px solid #3b5d50;
            display: inline-block;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .contact-card {
            display: flex;
            gap: 16px;
            padding: 20px;
            background: #f9fbfd;
            border-radius: 12px;
            transition: all 0.2s ease;
            border: 1px solid #edf2f7;
        }

        .contact-card:hover {
            background: white;
            border-color: #3b5d50;
            transform: translateY(-2px);
        }

        .contact-icon {
            color: #3b5d50;
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 10px;
            border: 1px solid #edf2f7;
        }

        .contact-info {
            flex: 1;
        }

        .contact-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .contact-position {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #dce5e4;
        }

        .contact-detail {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #475569;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .contact-detail i {
            color: #3b5d50;
            width: 18px;
            font-size: 0.9rem;
        }

        /* Products section */
        .products-section {
            background: white;
            border-radius: 16px;
            padding: 30px 40px;
            border: 1px solid #edf2f7;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #edf2f7;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: #3b5d50;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .product-image-wrapper {
            aspect-ratio: 1/1;
            background: #f9fbfd;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.08);
        }

        .product-info {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
            border-top: 1px solid #edf2f7;
        }

        .product-title {
            font-weight: 600;
            font-size: 1rem;
            color: #1e293b;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .product-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #dce5e4;
        }

        .brand-logo-small {
            width: 24px;
            height: 24px;
            object-fit: contain;
            border-radius: 4px;
        }

        .brand-name {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.1rem;
            color: #3b5d50;
            margin-bottom: 12px;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .availability {
            font-size: 0.75rem;
            color: #3b5d50;
            background: #e8f0ed;
            padding: 3px 10px;
            border-radius: 30px;
            font-weight: 500;
        }

        .btn-detail-icon {
            color: #94a3b8;
            transition: all 0.2s;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f1f5f9;
            font-size: 0.85rem;
            text-decoration: none;
        }

        .btn-detail-icon:hover {
            background: #3b5d50;
            color: white;
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .reseller-header-content {
                padding: 30px 20px;
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .reseller-location {
                justify-content: center;
            }

            .section-title {
                display: block;
                text-align: left;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-card {
                padding: 15px;
            }

            .products-section {
                padding: 20px;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }
        }
    </style>

    <div class="reseller-detail-section">
        <div class="container">
            <!-- Header Perusahaan - Desain Klasik -->
            <div class="reseller-header-card">
                <div class="reseller-header-content">
                    <div class="reseller-logo-wrapper">
                        <img src="{{ asset('assets/images/brand-telkom.png') }}" alt="PT Network Solution"
                            class="reseller-logo-large">
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
            </div>

            <!-- Kontak Person - Desain Klasik dengan Kartu -->
            <div class="contact-section">
                <h3 class="section-title">Kontak Person</h3>
                <div class="contact-grid">
                    <!-- Andi Wijaya -->
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="contact-info">
                            <div class="contact-name">Andi Wijaya</div>
                            <div class="contact-position">Sales Manager</div>
                            <div class="contact-detail">
                                <i class="fas fa-phone-alt"></i>
                                <span>0813-xxxx-xxxx</span>
                            </div>
                            <div class="contact-detail">
                                <i class="fas fa-envelope"></i>
                                <span>andi@network-solution.com</span>
                            </div>
                        </div>
                    </div>
                    <!-- Budi Santoso -->
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="contact-info">
                            <div class="contact-name">Budi Santoso</div>
                            <div class="contact-position">Technical Support</div>
                            <div class="contact-detail">
                                <i class="fas fa-phone-alt"></i>
                                <span>0812-xxxx-xxxx</span>
                            </div>
                            <div class="contact-detail">
                                <i class="fas fa-envelope"></i>
                                <span>budi@network-solution.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produk yang Tersedia -->
            <div class="products-section">
                <h3 class="section-title">Produk Tersedia</h3>
                <div class="product-grid">
                    <!-- Product 1: Huawei -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image" alt="Router Huawei">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Router AR161W</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-huawei.png') }}" class="brand-logo-small"
                                    alt="Huawei">
                                <span class="brand-name">Huawei</span>
                            </div>
                            <div class="product-price">$89.99</div>
                            <div class="product-footer">
                                <span class="availability">Tersedia</span>
                                <a href="#" class="btn-detail-icon" title="Lihat detail">
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
                            <h4 class="product-title">Switch Catalyst 9200</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-cisco.png') }}" class="brand-logo-small"
                                    alt="Cisco">
                                <span class="brand-name">Cisco</span>
                            </div>
                            <div class="product-price">$299.99</div>
                            <div class="product-footer">
                                <span class="availability">Tersedia</span>
                                <a href="#" class="btn-detail-icon" title="Lihat detail">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 3: Aruba -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image"
                                alt="Access Point Aruba">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Access Point 515</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-aruba.png') }}" class="brand-logo-small"
                                    alt="Aruba">
                                <span class="brand-name">Aruba</span>
                            </div>
                            <div class="product-price">$199.99</div>
                            <div class="product-footer">
                                <span class="availability">Tersedia</span>
                                <a href="#" class="btn-detail-icon" title="Lihat detail">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 4: Fortinet -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image"
                                alt="Firewall Fortinet">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">FortiGate 60F</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-fortinet.png') }}" class="brand-logo-small"
                                    alt="Fortinet">
                                <span class="brand-name">Fortinet</span>
                            </div>
                            <div class="product-price">$399.99</div>
                            <div class="product-footer">
                                <span class="availability">Tersedia</span>
                                <a href="#" class="btn-detail-icon" title="Lihat detail">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Product 5: MikroTik -->
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset('assets/images/huawei.png') }}" class="product-image"
                                alt="Router MikroTik">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Router RB4011</h4>
                            <div class="product-brand">
                                <img src="{{ asset('assets/images/brand-mikrotik.png') }}" class="brand-logo-small"
                                    alt="MikroTik">
                                <span class="brand-name">MikroTik</span>
                            </div>
                            <div class="product-price">$159.99</div>
                            <div class="product-footer">
                                <span class="availability">Tersedia</span>
                                <a href="#" class="btn-detail-icon" title="Lihat detail">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
