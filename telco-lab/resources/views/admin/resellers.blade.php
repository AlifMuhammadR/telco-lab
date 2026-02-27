@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <style>
        /* CSS yang sama persis seperti sebelumnya */
        .company-card {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            cursor: pointer;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .company-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        }

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

        .company-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(216, 224, 228, 0.95);
            color: #000000;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
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
            color: #3b5d50;
            display: block;
            margin-top: 10px;
            font-weight: 500;
        }

        .brand-title {
            font-weight: 700;
            border-left: 6px solid #3b5d50;
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
            max-height: 450px;
        }

        .detail-content {
            padding: 25px;
            border-top: 5px solid #3b5d50;
        }

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
            background: #3b5d50;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 18px;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 5px 12px rgba(59, 93, 80, 0.3);
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
            color: #3b5d50;
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
            color: #3b5d50;
            font-size: 1.2rem;
        }

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

        .vendor-header {
            margin-top: 40px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3b5d50;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .vendor-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 8px;
            background: white;
            padding: 5px;
            border: 1px solid #edf2f7;
        }

        .vendor-name {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1e293b;
        }

        .first-vendor-header {
            margin-top: 0;
        }

        .action-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn-action {
            padding: 0.6rem 1.5rem;
            border-radius: 40px;
            font-weight: 500;
            transition: all 0.2s;
            border: 1px solid transparent;
            cursor: pointer;
            background: transparent;
        }

        .btn-action.btn-primary {
            background: #3b5d50;
            color: white;
            border-color: #3b5d50;
        }

        .btn-action.btn-primary:hover {
            background: #234237;
            border-color: #234237;
        }

        .btn-action.btn-outline {
            background: transparent;
            color: #3b5d50;
            border-color: #3b5d50;
        }

        .btn-action.btn-outline:hover {
            background: #3b5d50;
            color: white;
        }

        .modal-classic {
            border: none;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        }

        .modal-header-classic {
            border-bottom: 1px solid #edf2f7;
            padding: 1.5rem 2rem;
        }

        .modal-header-classic .modal-title {
            font-weight: 600;
            color: #1e293b;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .form-control-classic {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 0.75rem 1rem;
            transition: border 0.2s;
        }

        .form-control-classic:focus {
            border-color: #3b5d50;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 93, 80, 0.1);
        }

        .file-input {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .file-label {
            padding: 0.5rem 1.5rem;
            background: #f1f5f9;
            color: #334155;
            border-radius: 40px;
            cursor: pointer;
            transition: background 0.2s;
            border: 1px solid #e2e8f0;
        }

        .file-label:hover {
            background: #e2e8f0;
        }

        .file-name {
            color: #64748b;
            font-size: 0.9rem;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-classic {
            padding: 0.6rem 2rem;
            border-radius: 40px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-accent {
            background: #3b5d50;
            color: white;
            border: 1px solid #3b5d50;
        }

        .btn-accent:hover {
            background: #234237;
            border-color: #234237;
        }

        .btn-outline-secondary {
            background: transparent;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }

        .btn-outline-secondary:hover {
            background: #f1f5f9;
            color: #334155;
        }

        .text-accent {
            color: #3b5d50;
        }
    </style>

    <div class="company-section py-5">
        <div class="container">
            <h2 class="brand-title mb-4">Daftar Reseller per Vendor</h2>

            <!-- Tombol Aksi (hanya untuk admin) -->
            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="action-group mb-4">
                        <button class="btn-action btn-primary" data-bs-toggle="modal" data-bs-target="#addResellerModal">
                            <i class="fas fa-plus-circle me-2"></i> Tambah Reseller
                        </button>
                        <button class="btn-action btn-outline" data-bs-toggle="modal" data-bs-target="#createContactModal">
                            <i class="fas fa-address-book me-2"></i> Tambah Kontak
                        </button>
                    </div>
                @endif
            @endauth

            @forelse($vendorCompanies as $index => $item)
                @php
                    $vendor = $item['vendor'];
                    $companies = $item['companies'];
                @endphp
                <div class="vendor-header {{ $index === 0 ? 'first-vendor-header' : '' }}">
                    @if ($vendor->logo)
                        <img src="{{ asset('storage/' . $vendor->logo) }}" class="vendor-logo" alt="{{ $vendor->name }}">
                    @else
                        <img src="{{ asset('assets/images/placeholder.png') }}" class="vendor-logo" alt="logo">
                    @endif
                    <span class="vendor-name">{{ $vendor->name }}</span>
                </div>
                <div class="row">
                    @foreach ($companies as $company)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="company-card" onclick="toggleDetail(this)">
                                <img src="{{ $company->logo ? asset('storage/' . $company->logo) : asset('assets/images/placeholder.png') }}"
                                    class="img-fluid" alt="{{ $company->name }}">
                                <div class="company-info">
                                    <h5>{{ $company->name }}</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>
                                        {{ $company->location ?? 'Lokasi tidak tersedia' }}</p>
                                </div>
                                <div class="company-overlay">
                                    @if ($company->contacts->count() > 0)
                                        @php $contact = $company->contacts->first(); @endphp
                                        <p><strong>{{ $contact->name }}</strong> · {{ $contact->jabatan ?? '-' }}</p>
                                        <p>📞 {{ $contact->no_hp ?? '-' }}</p>
                                        <p>✉ {{ $contact->email ?? '-' }}</p>
                                    @else
                                        <p>Belum ada kontak tersedia</p>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">Klik untuk detail lengkap</small>
                                        <a href="{{ route('admin.resellers.show', $company->id) }}"
                                            class="btn btn-sm btn-light" onclick="event.stopPropagation();">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="company-detail">
                                <div class="detail-content">
                                    @forelse($company->contacts as $contact)
                                        <div class="contact-item">
                                            <div class="contact-icon">{{ substr($contact->name, 0, 2) }}</div>
                                            <div class="contact-info">
                                                <h6>{{ $contact->name }}</h6>
                                                <p>
                                                    @if ($contact->jabatan)
                                                        <i class="fas fa-briefcase"></i> {{ $contact->jabatan }}
                                                    @endif
                                                    @if ($contact->no_hp)
                                                        <i class="fas fa-phone-alt"></i> {{ $contact->no_hp }}
                                                    @endif
                                                    @if ($contact->email)
                                                        <i class="fas fa-envelope"></i> {{ $contact->email }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">Tidak ada kontak tersedia untuk perusahaan ini.</p>
                                    @endforelse
                                    @if ($company->description)
                                        <div class="address-info">
                                            <i class="fas fa-building"></i>
                                            <span>{{ $company->description }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada data reseller.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal Tambah Reseller (clean design) -->
        @auth
            @if (Auth::user()->role === 'admin')
                <!-- Modal Tambah Reseller (clean klasik) -->
                <div class="modal fade" id="addResellerModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-classic">
                            <div class="modal-header modal-header-classic">
                                <h5 class="modal-title">
                                    <i class="fas fa-plus-circle text-accent me-2"></i>Tambah Reseller Baru
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('admin.resellers.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="form-label">name Perusahaan <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-classic" id="name"
                                            name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo" class="form-label">Logo</label>
                                        <div class="file-input">
                                            <label for="logo" class="file-label">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>Pilih File
                                            </label>
                                            <input type="file" class="d-none" id="logo" name="logo" accept="image/*"
                                                onchange="updateFileName(this, 'file-name')">
                                            <span id="file-name" class="file-name">Tidak ada file dipilih</span>
                                        </div>
                                        <small class="form-text text-muted">Format: JPG, PNG, SVG. Maks 2MB.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="location" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control form-control-classic" id="location"
                                            name="location">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control form-control-classic" id="description" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="modal-actions">
                                        <button type="button" class="btn btn-outline-secondary btn-classic"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-accent btn-classic">
                                            <i class="fas fa-save me-2"></i>Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Kontak (clean klasik) -->
                <div class="modal fade" id="createContactModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal-classic">
                            <div class="modal-header modal-header-classic">
                                <h5 class="modal-title">
                                    <i class="fas fa-address-book text-accent me-2"></i>Tambah Kontak Baru
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('admin.contacts.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="create_name" class="form-label">name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-classic" id="create_name"
                                            name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="create_jabatan" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control form-control-classic" id="create_jabatan"
                                            name="jabatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="create_company_id" class="form-label">Perusahaan <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control form-control-classic" id="create_company_id"
                                            name="id_company" required>
                                            <option value="">-- Pilih Perusahaan --</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="create_no_hp" class="form-label">No HP</label>
                                        <input type="text" class="form-control form-control-classic" id="create_no_hp"
                                            name="no_hp">
                                    </div>
                                    <div class="form-group">
                                        <label for="create_email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-classic" id="create_email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="create_description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control form-control-classic" id="create_description" name="description" rows="2"></textarea>
                                    </div>
                                    <div class="modal-actions">
                                        <button type="button" class="btn btn-outline-secondary btn-classic"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-accent btn-classic">
                                            <i class="fas fa-save me-2"></i>Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function updateFileName(input) {
                        const fileName = input.files[0]?.name || 'Tidak ada file dipilih';
                        document.getElementById('file-name').textContent = fileName;
                    }
                </script>
            @endif
        @endauth

        <script>
            function toggleDetail(card) {
                const detail = card.parentElement.querySelector('.company-detail');
                if (!detail) return;
                document.querySelectorAll('.company-detail.active').forEach(d => {
                    if (d !== detail) d.classList.remove('active');
                });
                detail.classList.toggle('active');
            }

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
