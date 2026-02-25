@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <style>
        /* Card utama */
        .company-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            cursor: pointer;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .company-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        }

        /* Gambar logo */
        .company-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            background: #fff;
            padding: 25px 20px;
            transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid #f0f0f0;
        }

        .company-card:hover img {
            transform: scale(1.05);
        }

        /* Info perusahaan (judul & lokasi) */
        .company-info {
            padding: 18px 20px 10px;
        }

        .company-info h5 {
            font-weight: 700;
            margin-bottom: 5px;
            color: #1e293b;
        }

        .company-info p {
            margin: 0;
            font-size: 0.95rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Overlay hover */
        .company-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(216, 224, 228, 0.616);
            color: #000000;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out;
            backdrop-filter: blur(4px);
        }

        .company-card:hover .company-overlay {
            transform: translateY(0);
        }

        .company-overlay p {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .company-overlay small {
            color: #f9bf29;
            display: block;
            margin-top: 10px;
            font-weight: 500;
        }

        /* Brand title */
        .brand-title {
            font-weight: 700;
            border-left: 6px solid #f9bf29;
            padding-left: 15px;
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            font-size: 1.8rem;
            color: #0f172a;
        }

        .brand-mini {
            height: 70px;
            margin-right: 20px;
            object-fit: contain;
        }

        /* Detail section (muncul saat klik) */
        .company-detail {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            background: #f8fafc;
            border-radius: 0 0 20px 20px;
            margin-top: 2px;
            box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.02);
        }

        .company-detail.active {
            max-height: 450px; /* cukup besar */
        }

        .detail-content {
            padding: 25px;
            border-top: 5px solid #f9bf29;
        }

        /* Item kontak */
        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 18px;
            border-bottom: 1px dashed #e2e8f0;
            padding-bottom: 15px;
        }

        .contact-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .contact-icon {
            width: 42px;
            height: 42px;
            background: #f9bf29;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 18px;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 5px 12px rgba(249, 191, 41, 0.3);
        }

        .contact-info {
            flex: 1;
        }

        .contact-info h6 {
            margin: 0 0 5px 0;
            font-weight: 700;
            color: #1e293b;
            font-size: 1rem;
        }

        .contact-info p {
            margin: 0;
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.5;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .contact-info p i {
            color: #f9bf29;
            width: 18px;
        }

        .address-info {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 2px solid #e9eef2;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #334155;
            font-size: 0.95rem;
        }

        .address-info i {
            color: #f9bf29;
            font-size: 1.2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .brand-mini {
                height: 50px;
            }
            .brand-title {
                font-size: 1.4rem;
            }
            .company-card img {
                height: 120px;
                padding: 15px;
            }
            .contact-item {
                flex-direction: column;
                align-items: flex-start;
            }
            .contact-icon {
                margin-bottom: 10px;
            }
        }
    </style>

    <div class="company-section py-5">
        <div class="container">

            <!-- ================= TELKOM INDONESIA (berdasarkan image.png) ================= -->
            <h2 class="brand-title mb-4">
                <img src="{{ asset('assets/images/brand-telkom.png') }}" class="brand-mini" alt="Telkom Indonesia">
                Telkom Indonesia
            </h2>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="company-card" onclick="toggleDetail(this)">
                        <img src="{{ asset('assets/images/brand-telkom.png') }}" class="img-fluid" alt="PT Network Solution">
                        <div class="company-info">
                            <h5>PT Network Solution</h5>
                            <p><i class="fas fa-map-marker-alt"></i> Jakarta</p>
                        </div>
                        <div class="company-overlay">
                            <p><strong>Andi Wijaya</strong> · Sales Manager</p>
                            <p>📞 0813-xxxx-xxxx</p>
                            <p>✉ andi@tekn.com</p>
                            <small> Klik untuk detail lengkap</small>
                        </div>
                    </div>
                    <div class="company-detail">
                        <div class="detail-content">
                            <!-- Kontak Andi Wijaya -->
                            <div class="contact-item">
                                <div class="contact-icon">AW</div>
                                <div class="contact-info">
                                    <h6>Andi Wijaya</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0813-xxxx-xxxx · <i class="fas fa-envelope"></i> andi@tekn.com</p>
                                </div>
                            </div>
                            <!-- Kontak Budi Santoso -->
                            <div class="contact-item">
                                <div class="contact-icon">BS</div>
                                <div class="contact-info">
                                    <h6>Budi Santoso</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0812-xxxx-xxxx · <i class="fas fa-envelope"></i> budi@tekn.com</p>
                                </div>
                            </div>
                            <!-- Customer Service -->
                            <div class="contact-item">
                                <div class="contact-icon">CS</div>
                                <div class="contact-info">
                                    <h6>Customer Service</h6>
                                    <p><i class="fas fa-phone-alt"></i> 1500-123 · <i class="fas fa-envelope"></i> cs@tekn.com</p>
                                </div>
                            </div>
                            <!-- Alamat -->
                            <div class="address-info">
                                <i class="fas fa-building"></i>
                                <span>Gedung Sahid, Lt. 5, Jakarta Pusat</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Anda bisa tambahkan card lain di sini jika diperlukan, misal untuk mitra Telkom lainnya -->
            </div>

            <!-- ================= CISCO ================= -->
            <h2 class="brand-title mb-4">
                <img src="{{ asset('assets/images/brand-cisco.png') }}" class="brand-mini" alt="Cisco">
                Cisco Systems
            </h2>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="company-card" onclick="toggleDetail(this)">
                        <img src="{{ asset('assets/images/brand-telkom.png') }}" class="img-fluid" alt="Telkom">
                        <div class="company-info">
                            <h5>PT Network Solution</h5>
                            <p><i class="fas fa-map-marker-alt"></i> Jakarta</p>
                        </div>
                        <div class="company-overlay">
                            <p><strong>Andi Wijaya</strong> · Sales Manager</p>
                            <p>📞 0813-xxxx-xxxx</p>
                            <p>✉ sales@tekno.com</p>
                            <small> Klik untuk detail</small>
                        </div>
                    </div>
                    <div class="company-detail">
                        <div class="detail-content">
                            <div class="contact-item">
                                <div class="contact-icon">A</div>
                                <div class="contact-info">
                                    <h6>Andi Wijaya</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0813-xxxx-xxxx · <i class="fas fa-envelope"></i> andi@tekno.com</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">B</div>
                                <div class="contact-info">
                                    <h6>Budi Santoso</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0812-xxxx-xxxx · <i class="fas fa-envelope"></i> budi@tekno.com</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">CS</div>
                                <div class="contact-info">
                                    <h6>Customer Service</h6>
                                    <p><i class="fas fa-phone-alt"></i> 1500-123 · <i class="fas fa-envelope"></i> cs@tekno.com</p>
                                </div>
                            </div>
                            <div class="address-info">
                                <i class="fas fa-building"></i>
                                <span>Gedung Sahid, Lt. 5, Jakarta Pusat</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="company-card" onclick="toggleDetail(this)">
                        <img src="{{ asset('assets/images/brand-multipolar.webp') }}" class="img-fluid" alt="Multipolar">
                        <div class="company-info">
                            <h5>PT Teknologi Global</h5>
                            <p><i class="fas fa-map-marker-alt"></i> Bandung</p>
                        </div>
                        <div class="company-overlay">
                            <p><strong>Rina Kartika</strong> · Business Dev</p>
                            <p>📞 0815-xxxx-xxxx</p>
                            <p>✉ rina@globaltech.com</p>
                            <small> Klik untuk detail</small>
                        </div>
                    </div>
                    <div class="company-detail">
                        <div class="detail-content">
                            <div class="contact-item">
                                <div class="contact-icon">R</div>
                                <div class="contact-info">
                                    <h6>Rina Kartika</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0815-xxxx-xxxx · <i class="fas fa-envelope"></i> rina@globaltech.com</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">D</div>
                                <div class="contact-info">
                                    <h6>Dedi Kurniawan</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0813-xxxx-xxxx · <i class="fas fa-envelope"></i> dedi@globaltech.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="company-card" onclick="toggleDetail(this)">
                        <img src="{{ asset('assets/images/brand-infra.png') }}" class="img-fluid" alt="Infra">
                        <div class="company-info">
                            <h5>PT Infra Digital</h5>
                            <p><i class="fas fa-map-marker-alt"></i> Surabaya</p>
                        </div>
                        <div class="company-overlay">
                            <p><strong>Bayu Aji</strong> · Technical Manager</p>
                            <p>📞 0814-xxxx-xxxx</p>
                            <p>✉ bayu@infra.com</p>
                            <small> Klik untuk detail</small>
                        </div>
                    </div>
                    <div class="company-detail">
                        <div class="detail-content">
                            <div class="contact-item">
                                <div class="contact-icon">B</div>
                                <div class="contact-info">
                                    <h6>Bayu Aji</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0814-xxxx-xxxx · <i class="fas fa-envelope"></i> bayu@infra.com</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">S</div>
                                <div class="contact-info">
                                    <h6>Sari Dewi</h6>
                                    <p><i class="fas fa-phone-alt"></i> 0812-xxxx-xxxx · <i class="fas fa-envelope"></i> sari@infra.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= HUAWEI ================= -->
            <h2 class="brand-title mb-4">
                <img src="{{ asset('assets/images/brand-huawei.png') }}" class="brand-mini" alt="Huawei">
                Huawei Technologies
            </h2>
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="company-card" onclick="toggleDetail(this)">
                        <img src="{{ asset('assets/images/brand-huawei-1.png') }}" class="img-fluid" alt="Huawei Partner">
                        <div class="company-info">
                            <h5>PT Solusi Komunikasi</h5>
                            <p><i class="fas fa-map-marker-alt"></i> Jakarta</p>
                        </div>
                        <div class="company-overlay">
                            <p><strong>Hendra Wijaya</strong> · Account Manager</p>
                            <p>📞 0819-xxxx-xxxx</p>
                            <p>✉ hendra@solkom.co.id</p>
                            <small> Klik detail</small>
                        </div>
                    </div>
                    <div class="company-detail">
                        <div class="detail-content">
                            <p class="text-muted">Detail kontak dapat ditambahkan sesuai kebutuhan.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleDetail(card) {
            const detail = card.parentElement.querySelector('.company-detail');
            if (!detail) return;

            // Tutup detail lain jika ingin hanya satu yang terbuka
            document.querySelectorAll('.company-detail.active').forEach(d => {
                if (d !== detail) d.classList.remove('active');
            });

            detail.classList.toggle('active');
        }

        // Klik di luar untuk menutup semua detail
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.company-card') && !e.target.closest('.company-detail')) {
                document.querySelectorAll('.company-detail.active').forEach(d => {
                    d.classList.remove('active');
                });
            }
        });
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
