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
            position: relative;
            /* untuk positioning tombol */
        }

        /* Tombol aksi di pojok kanan atas */
        .header-actions {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1px solid #edf2f7;
            color: #64748b;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
            cursor: pointer;
            text-decoration: none;
        }

        .btn-icon:hover {
            transform: scale(1.05);
        }

        .btn-icon.edit:hover {
            background: #fbbf24;
            border-color: #fbbf24;
            color: white;
        }

        .btn-icon.delete:hover {
            background: #ef4444;
            border-color: #ef4444;
            color: white;
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

            .header-actions {
                top: 10px;
                right: 10px;
            }
        }
    </style>

    <div class="product-detail-section">
        <div class="container">
            <div class="product-detail-card">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <div class="header-actions">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-icon edit" title="Edit Produk">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon delete" title="Hapus Produk">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth

                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="product-gallery">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.png') }}"
                                alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-info-detail">
                            <h1 class="product-title-detail">{{ $product->name }}</h1>
                            <div class="product-meta">
                                @if ($product->vendor)
                                    <img src="{{ $product->vendor->logo ? asset('storage/' . $product->vendor->logo) : asset('assets/images/placeholder.png') }}"
                                        class="vendor-logo-large" alt="{{ $product->vendor->name }}">
                                    <span class="vendor-name-large">{{ $product->vendor->name }}</span>
                                @endif
                            </div>
                            <div class="product-price-detail" hidden>${{ number_format($product->price, 2) }}</div>

                            <div class="product-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Kategori</span>
                                    <span class="info-value">{{ $product->category ?? '-' }}</span>
                                </div>
                                <!-- Jika ada field lain, bisa ditambahkan di sini -->
                            </div>

                            <div class="product-description">
                                <div class="description-title">Deskripsi Produk</div>
                                <div class="description-content" id="productDescription">
                                    @php
                                        $rawDesc = $product->description ?? ''; // teks mentah tanpa format
                                        $formattedDesc = nl2br(e($rawDesc)); // teks dengan <br> untuk tampilan
                                        $short = Str::limit($rawDesc, 50, '...'); // potong teks mentah
                                        $shortFormatted = nl2br(e($short)); // format teks pendek
                                    @endphp
                                    <span id="shortDesc">{!! $shortFormatted !!}</span>
                                    @if (strlen($rawDesc) > 200)
                                        <span id="fullDesc" style="display: none;">{!! $formattedDesc !!}</span>
                                        <a href="javascript:void(0);" class="read-more" onclick="toggleReadMore()"
                                            id="readMoreLink">Lihat Selengkapnya</a>
                                    @else
                                        {!! $formattedDesc !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vendor Section (Perusahaan Penyedia) -->
            <div class="vendor-section">
                <h3 class="vendor-section-title">Perusahaan Penyedia</h3>
                <div class="vendor-grid">
                    @forelse($product->companies as $company)
                        <div class="vendor-card" onclick="showCompanyModal({{ $company->id }})">
                            <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('assets/images/placeholder.png') }}"
                                class="vendor-logo" alt="{{ $company->name }}">
                            <div class="vendor-info">
                                <div class="vendor-name">{{ $company->name }}</div>
                                <div class="vendor-location"><i class="fas fa-map-marker-alt"></i>
                                    {{ $company->location ?? '-' }}</div>
                                <div class="vendor-contacts">
                                    @if ($company->contacts->count() > 0)
                                        @php $firstContact = $company->contacts->first(); @endphp
                                        <span class="contact-chip"><i class="fas fa-user"></i>
                                            {{ $firstContact->name }}</span>
                                        <span class="contact-chip"><i class="fas fa-phone-alt"></i>
                                            {{ substr($firstContact->no_hp, 0, 7) }}...</span>
                                    @else
                                        <span class="contact-chip">Tidak ada kontak</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada perusahaan penyedia.</p>
                    @endforelse
                </div>
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
                <!-- konten diisi JavaScript -->
            </div>
        </div>
    </div>

    <script>
        function toggleReadMore() {
            var shortDesc = document.getElementById("shortDesc");
            var fullDesc = document.getElementById("fullDesc");
            var linkText = document.getElementById("readMoreLink");

            if (fullDesc.style.display === "none") {
                shortDesc.style.display = "none";
                fullDesc.style.display = "inline";
                linkText.innerHTML = "Lihat Lebih Sedikit";
            } else {
                shortDesc.style.display = "inline";
                fullDesc.style.display = "none";
                linkText.innerHTML = "Lihat Selengkapnya";
            }
        }
        // Data perusahaan dari database (termasuk kontak)
        const companiesData = @json($product->companies->load('contacts'));

        function showCompanyModal(companyId) {
            const company = companiesData.find(c => c.id === companyId);
            if (!company) return;

            let html = `
                <div class="company-detail-header">
                    <img src="${company.logo ? '{{ asset('storage/') }}/' + company.logo : '{{ asset('assets/images/placeholder.png') }}'}" class="company-detail-logo" alt="${company.name}">
                    <div class="company-detail-info">
                        <h4>${company.name}</h4>
                        <p><i class="fas fa-map-marker-alt"></i> ${company.location || 'Lokasi tidak tersedia'}</p>
                        <p><i class="fas fa-building"></i> ${company.description || ''}</p>
                    </div>
                </div>
                <div class="contact-person-list">
            `;

            if (company.contacts && company.contacts.length > 0) {
                company.contacts.forEach(contact => {
                    html += `
                        <div class="contact-person-card">
                            <div class="contact-person-name">
                                <i class="fas fa-user-circle"></i> ${contact.name}
                            </div>
                            <div class="contact-person-position">${contact.jabatan || '-'}</div>
                            <div class="contact-person-detail">
                                <i class="fas fa-phone-alt"></i> ${contact.no_hp || '-'}
                            </div>
                            <div class="contact-person-detail">
                                <i class="fas fa-envelope"></i> ${contact.email || '-'}
                            </div>
                        </div>
                    `;
                });
            } else {
                html += `<p class="text-muted">Tidak ada kontak tersedia.</p>`;
            }

            html += `</div>`;

            document.getElementById('modalBody').innerHTML = html;
            document.getElementById('companyModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('companyModal').classList.remove('active');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('companyModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
