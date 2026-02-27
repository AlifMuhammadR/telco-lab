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
            position: relative;
            /* untuk positioning absolute dari tombol */
        }

        /* Tombol aksi di pojok kanan atas header */
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

            .header-actions {
                top: 10px;
                right: 10px;
            }
        }
    </style>

    <div class="reseller-detail-section">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Header Perusahaan dengan tombol aksi di dalamnya -->
            <div class="reseller-header-card">
                @auth
                    @if (Auth::user()->role === 'admin')
                        <div class="header-actions">
                            <button class="btn-icon edit" data-bs-toggle="modal" data-bs-target="#editCompanyModal"
                                title="Edit Perusahaan">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.resellers.destroy', $company->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus perusahaan ini? Semua data terkait (kontak, relasi produk) akan ikut terhapus.')"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon delete" title="Hapus Perusahaan">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth

                <div class="reseller-header-content">
                    <div class="reseller-logo-wrapper">
                        <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('assets/images/placeholder.png') }}"
                            alt="{{ $company->name }}" class="reseller-logo-large">
                    </div>
                    <div class="reseller-info">
                        <h1 class="reseller-name">{{ $company->name }}</h1>
                        <div class="reseller-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $company->location ?? 'Lokasi tidak tersedia' }}</span>
                        </div>
                        <p class="reseller-description">
                            {{ $company->description ?? 'Tidak ada deskripsi' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kontak Person -->
            <div class="contact-section">
                <h3 class="section-title">Kontak Person</h3>
                <div class="contact-grid">
                    @forelse($company->contacts as $contact)
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">{{ $contact->name }}</div>
                                <div class="contact-position">{{ $contact->jabatan ?? '-' }}</div>
                                <div class="contact-detail">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>{{ $contact->no_hp ?? '-' }}</span>
                                </div>
                                <div class="contact-detail">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $contact->email ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada kontak tersedia.</p>
                    @endforelse
                </div>
            </div>

            <!-- Produk yang Tersedia -->
            <div class="products-section">
                <h3 class="section-title">Produk Tersedia</h3>
                <div class="product-grid">
                    @forelse($company->products as $product)
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/images/placeholder.png') }}"
                                    class="product-image" alt="{{ $product->name }}">
                            </div>
                            <div class="product-info">
                                <h4 class="product-title">{{ $product->name }}</h4>
                                <div class="product-brand">
                                    @if ($product->vendor)
                                        <img src="{{ $product->vendor->logo ? asset('storage/' . $product->vendor->logo) : asset('assets/images/placeholder.png') }}"
                                            class="brand-logo-small" alt="{{ $product->vendor->name }}">
                                        <span class="brand-name">{{ $product->vendor->name }}</span>
                                    @endif
                                </div>
                                <div class="product-price" hidden>${{ number_format($product->price, 2) }}</div>
                                <div class="product-footer">
                                    <span class="availability">Tersedia</span>
                                    @auth
                                        @if (Auth::user()->role === 'admin')
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn-detail-icon"
                                                title="Lihat detail">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('products.show', $product->id) }}" class="btn-detail-icon"
                                                title="Lihat detail">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada produk tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Company -->
    @auth
        @if (Auth::user()->role === 'admin')
            <div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editCompanyModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.resellers.update', $company->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCompanyModalLabel">
                                    <i class="fas fa-edit text-primary me-2"></i>Edit Reseller
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="edit-name" class="form-label">name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit-name" name="name"
                                        value="{{ $company->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-logo" class="form-label">Logo</label>
                                    <div>
                                        <label for="edit-logo" class="btn btn-outline-secondary">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>Pilih File
                                        </label>
                                        <input type="file" class="d-none" id="edit-logo" name="logo" accept="image/*"
                                            onchange="updateEditFileName(this)">
                                        <span id="edit-file-name" class="ms-2 text-muted">Tidak ada file dipilih</span>
                                    </div>
                                    <small class="text-muted">Format: JPG, PNG, SVG. Maks 2MB. Biarkan kosong jika tidak ingin
                                        mengubah.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-location" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="edit-location" name="location"
                                        value="{{ $company->location }}">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="edit-description" name="description" rows="4">{{ $company->description }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function updateEditFileName(input) {
                    const fileName = input.files[0]?.name || 'Tidak ada file dipilih';
                    document.getElementById('edit-file-name').textContent = fileName;
                }
            </script>
        @endif
    @endauth

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
