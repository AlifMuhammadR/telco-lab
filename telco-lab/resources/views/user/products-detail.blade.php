@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <style>
        .product-detail-section {
            padding: 60px 0;
            background: #f8fafc;
        }

        .product-detail-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            margin-bottom: 40px;
            border: 1px solid #edf2f7;
        }

        .product-gallery {
            padding: 40px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            border-right: 1px solid #edf2f7;
        }

        .product-gallery img {
            width: 100%;
            max-width: 380px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .product-gallery img:hover {
            transform: scale(1.02);
        }

        .product-info-detail {
            padding: 40px;
        }

        .product-title-detail {
            font-size: 2.2rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 12px;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .product-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .vendor-logo-large {
            height: 48px;
            width: auto;
            object-fit: contain;
            background: white;
            padding: 6px 12px;
            border-radius: 40px;
            border: 1px solid #edf2f7;
        }

        .vendor-name-large {
            font-size: 1.1rem;
            font-weight: 500;
            color: #475569;
        }

        .product-price-detail {
            font-size: 2rem;
            font-weight: 700;
            color: #3b5d50;
            margin-bottom: 30px;
        }

        .product-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            background: #f9fbfd;
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 30px;
            border: 1px solid #edf2f7;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 1rem;
            color: #1e293b;
            font-weight: 500;
        }

        .product-description {
            background: #f9fbfd;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid #edf2f7;
        }

        .description-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .description-content {
            color: #475569;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .read-more {
            color: #3b5d50;
            font-weight: 500;
            cursor: pointer;
            display: inline-block;
            margin-top: 12px;
            font-size: 0.9rem;
            border-bottom: 1px dashed #3b5d50;
        }

        /* Vendor section */
        .vendor-section {
            background: white;
            border-radius: 24px;
            padding: 30px;
            border: 1px solid #edf2f7;
        }

        .vendor-section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 24px;
            color: #1e293b;
            position: relative;
            padding-bottom: 8px;
            border-bottom: 2px solid #3b5d50;
            display: inline-block;
        }

        .vendor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .vendor-card {
            display: flex;
            gap: 16px;
            padding: 16px;
            background: #f9fbfd;
            border-radius: 16px;
            border: 1px solid #edf2f7;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .vendor-card:hover {
            border-color: #3b5d50;
            background: white;
            transform: translateY(-2px);
        }

        .vendor-logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: white;
            border-radius: 12px;
            padding: 8px;
            border: 1px solid #edf2f7;
        }

        .vendor-info {
            flex: 1;
        }

        .vendor-name {
            font-weight: 600;
            font-size: 1rem;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .vendor-location {
            font-size: 0.85rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 8px;
        }

        .vendor-contacts {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .contact-chip {
            background: white;
            border-radius: 30px;
            padding: 4px 10px;
            font-size: 0.75rem;
            color: #334155;
            border: 1px solid #edf2f7;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .contact-chip i {
            color: #3b5d50;
            width: 12px;
            font-size: 0.7rem;
        }

        .btn-outline {
            border: 1px solid #3b5d50;
            background: transparent;
            color: #3b5d50;
            padding: 8px 20px;
            border-radius: 40px;
            font-weight: 500;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline:hover {
            background: #3b5d50;
            color: white;
        }

        .view-more {
            margin-top: 24px;
            text-align: right;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 24px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid #edf2f7;
        }

        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0;
        }

        .modal-close {
            background: #f1f5f9;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #64748b;
            transition: all 0.2s;
        }

        .modal-close:hover {
            background: #3b5d50;
            color: white;
        }

        .modal-body {
            padding: 24px;
        }

        .company-detail-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .company-detail-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            background: white;
            border-radius: 16px;
            padding: 10px;
            border: 1px solid #edf2f7;
        }

        .company-detail-info h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .company-detail-info p {
            color: #64748b;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .contact-person-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-person-card {
            background: #f9fbfd;
            border-radius: 16px;
            padding: 16px;
            border: 1px solid #edf2f7;
        }

        .contact-person-name {
            font-weight: 600;
            font-size: 1rem;
            color: #1e293b;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-person-position {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px dashed #dce5e4;
        }

        .contact-person-detail {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
            color: #334155;
            font-size: 0.9rem;
        }

        .contact-person-detail i {
            color: #3b5d50;
            width: 18px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .product-gallery {
                border-right: none;
                border-bottom: 1px solid #edf2f7;
                padding: 30px;
            }

            .product-info-detail {
                padding: 30px;
            }

            .product-title-detail {
                font-size: 1.8rem;
            }

            .product-info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .vendor-grid {
                grid-template-columns: 1fr;
            }

            .vendor-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .vendor-location {
                justify-content: center;
            }
        }
    </style>

    <div class="product-detail-section">
        <div class="container">
            <div class="product-detail-card">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="product-gallery">
                            <img src="{{ asset('assets/images/huawei.png') }}" alt="Router Huawei AR161W">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-info-detail">
                            <h1 class="product-title-detail">Router Huawei AR161W</h1>
                            <div class="product-meta">
                                <img src="{{ asset('assets/images/brand-huawei.png') }}" class="vendor-logo-large"
                                    alt="Huawei">
                                <span class="vendor-name-large">Huawei Technologies</span>
                            </div>
                            <div class="product-price-detail">$89.99</div>

                            <div class="product-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Kondisi</span>
                                    <span class="info-value">Baru</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Berat</span>
                                    <span class="info-value">20 g</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Min. Beli</span>
                                    <span class="info-value">1 Buah</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Kategori</span>
                                    <span class="info-value">SSD</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Etalase</span>
                                    <span class="info-value">SSD KYO KAIZEN SERIES</span>
                                </div>
                            </div>

                            <div class="product-description">
                                <div class="description-title">INFORMASI PRODUK</div>
                                <div class="description-content">
                                    - Produk dijamin menggunakan chip 100% ORIGINAL.<br>
                                    - Jika terdapat kekurangan Informasi, silahkan bertanya kepada kami.<br>
                                    - Pesanan yang telah masuk tidak dapat dibatalkan atau diubah.<br>
                                    - Mohon cek produk yang dibutuhkan sebelum transaksi.<br>
                                    <span id="moreText" style="display: none;">
                                        <br>- Garansi resmi 3 tahun.<br>
                                        - Support after sales service.<br>
                                        - Tersedia varian kapasitas lainnya.
                                    </span>
                                </div>
                                <a href="javascript:void(0);" class="read-more" onclick="toggleReadMore()"
                                    id="readMoreLink">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vendor Section -->
            <div class="vendor-section">
                <h3 class="vendor-section-title">Perusahaan Penyedia</h3>
                <div class="vendor-grid">
                    <!-- Perusahaan 1 -->
                    <div class="vendor-card" onclick="showCompanyModal('telkom')">
                        <img src="{{ asset('assets/images/brand-telkom.png') }}" class="vendor-logo"
                            alt="PT Network Solution">
                        <div class="vendor-info">
                            <div class="vendor-name">PT Network Solution</div>
                            <div class="vendor-location"><i class="fas fa-map-marker-alt"></i> Jakarta</div>
                            <div class="vendor-contacts">
                                <span class="contact-chip"><i class="fas fa-user"></i> Andi</span>
                                <span class="contact-chip"><i class="fas fa-phone-alt"></i> 0813-xxxx</span>
                            </div>
                        </div>
                    </div>
                    <!-- Perusahaan 2 -->
                    <div class="vendor-card" onclick="showCompanyModal('multipolar')">
                        <img src="{{ asset('assets/images/brand-multipolar.webp') }}" class="vendor-logo"
                            alt="PT Teknologi Global">
                        <div class="vendor-info">
                            <div class="vendor-name">PT Teknologi Global</div>
                            <div class="vendor-location"><i class="fas fa-map-marker-alt"></i> Bandung</div>
                            <div class="vendor-contacts">
                                <span class="contact-chip"><i class="fas fa-user"></i> Rina</span>
                                <span class="contact-chip"><i class="fas fa-phone-alt"></i> 0815-xxxx</span>
                            </div>
                        </div>
                    </div>
                    <!-- Perusahaan 3 -->
                    <div class="vendor-card" onclick="showCompanyModal('infra')">
                        <img src="{{ asset('assets/images/brand-infra.png') }}" class="vendor-logo" alt="PT Infra Digital">
                        <div class="vendor-info">
                            <div class="vendor-name">PT Infra Digital</div>
                            <div class="vendor-location"><i class="fas fa-map-marker-alt"></i> Surabaya</div>
                            <div class="vendor-contacts">
                                <span class="contact-chip"><i class="fas fa-user"></i> Bayu</span>
                                <span class="contact-chip"><i class="fas fa-phone-alt"></i> 0814-xxxx</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="view-more">
                    <a href="#" class="btn-outline">Lihat Semua Penyedia <i class="fas fa-arrow-right"></i></a>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Modal untuk Detail Kontak Perusahaan -->
    <div class="modal" id="companyModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Kontak Perusahaan</h3>
                <button class="modal-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Konten akan diisi oleh JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Data perusahaan
        const companies = {
            telkom: {
                logo: "{{ asset('assets/images/brand-telkom.png') }}",
                name: "PT Network Solution",
                location: "Jakarta, Indonesia",
                address: "Jl. Sudirman No. 123, Jakarta Pusat",
                contacts: [{
                        name: "Andi Wijaya",
                        position: "Sales Manager",
                        phone: "0813-1111-2222",
                        email: "andi@network-solution.com"
                    },
                    {
                        name: "Budi Santoso",
                        position: "Technical Support",
                        phone: "0812-3333-4444",
                        email: "budi@network-solution.com"
                    },
                    {
                        name: "Customer Service",
                        position: "CS",
                        phone: "1500-123",
                        email: "cs@network-solution.com"
                    }
                ]
            },
            multipolar: {
                logo: "{{ asset('assets/images/brand-multipolar.webp') }}",
                name: "PT Teknologi Global",
                location: "Bandung, Indonesia",
                address: "Jl. Asia Afrika No. 45, Bandung",
                contacts: [{
                        name: "Rina Kartika",
                        position: "Business Development",
                        phone: "0815-5555-6666",
                        email: "rina@globaltech.com"
                    },
                    {
                        name: "Dedi Kurniawan",
                        position: "Account Manager",
                        phone: "0813-7777-8888",
                        email: "dedi@globaltech.com"
                    }
                ]
            },
            infra: {
                logo: "{{ asset('assets/images/brand-infra.png') }}",
                name: "PT Infra Digital",
                location: "Surabaya, Indonesia",
                address: "Jl. Tunjungan No. 78, Surabaya",
                contacts: [{
                        name: "Bayu Aji",
                        position: "Technical Manager",
                        phone: "0814-9999-0000",
                        email: "bayu@infra.com"
                    },
                    {
                        name: "Sari Dewi",
                        position: "Sales Executive",
                        phone: "0812-1111-2222",
                        email: "sari@infra.com"
                    }
                ]
            }
        };

        function showCompanyModal(companyId) {
            const company = companies[companyId];
            if (!company) return;

            let html = `
                <div class="company-detail-header">
                    <img src="${company.logo}" class="company-detail-logo" alt="${company.name}">
                    <div class="company-detail-info">
                        <h4>${company.name}</h4>
                        <p><i class="fas fa-map-marker-alt"></i> ${company.location}</p>
                        <p><i class="fas fa-building"></i> ${company.address}</p>
                    </div>
                </div>
                <div class="contact-person-list">
            `;

            company.contacts.forEach(contact => {
                html += `
                    <div class="contact-person-card">
                        <div class="contact-person-name">
                            <i class="fas fa-user-circle"></i> ${contact.name}
                        </div>
                        <div class="contact-person-position">${contact.position}</div>
                        <div class="contact-person-detail">
                            <i class="fas fa-phone-alt"></i> ${contact.phone}
                        </div>
                        <div class="contact-person-detail">
                            <i class="fas fa-envelope"></i> ${contact.email}
                        </div>
                    </div>
                `;
            });

            html += `</div>`;

            document.getElementById('modalBody').innerHTML = html;
            document.getElementById('companyModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('companyModal').classList.remove('active');
        }

        // Klik di luar modal untuk menutup
        window.onclick = function(event) {
            const modal = document.getElementById('companyModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        function toggleReadMore() {
            var moreText = document.getElementById("moreText");
            var linkText = document.getElementById("readMoreLink");
            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                linkText.innerHTML = "Lihat Lebih Sedikit";
            } else {
                moreText.style.display = "none";
                linkText.innerHTML = "Lihat Selengkapnya";
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
