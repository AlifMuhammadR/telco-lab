@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <style>
        .contacts-section {
            padding: 60px 0;
            background: #f8fafc;
        }

        .section-header {
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
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
            margin-bottom: 0;
        }

        .contacts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        .contact-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e9eef2;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            display: flex;
            flex-direction: column;
        }

        .contact-card:hover {
            transform: translateY(-4px);
            border-color: #3b5d50;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.05);
        }

        .contact-header {
            background: linear-gradient(135deg, #3b5d50 0%, #234237 100%);
            padding: 20px 20px 15px;
            color: white;
        }

        .contact-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-name i {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .contact-position {
            font-size: 0.9rem;
            opacity: 0.9;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .contact-body {
            padding: 20px;
            flex: 1;
        }

        .company-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #dce5e4;
        }

        .company-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
            background: white;
            border-radius: 10px;
            padding: 6px;
            border: 1px solid #e9eef2;
        }

        .company-details {
            flex: 1;
        }

        .company-name {
            font-weight: 600;
            font-size: 1rem;
            color: #1e293b;
            margin-bottom: 2px;
        }

        .company-location {
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .contact-detail-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            color: #334155;
            font-size: 0.95rem;
        }

        .contact-detail-item i {
            color: #3b5d50;
            width: 18px;
            font-size: 1rem;
        }

        .contact-detail-item a {
            color: #334155;
            text-decoration: none;
        }

        .contact-detail-item a:hover {
            color: #3b5d50;
            text-decoration: underline;
        }

        .contact-description {
            margin-top: 15px;
            padding-top: 12px;
            border-top: 1px solid #e9eef2;
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.5;
        }

        .card-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 15px;
            border-top: 1px solid #edf2f7;
            padding-top: 15px;
        }

        .btn-icon-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: #64748b;
            border: none;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-icon-sm:hover {
            transform: scale(1.05);
        }

        .btn-icon-sm.info:hover {
            background: #3b5d50;
            color: white;
        }

        .btn-icon-sm.warning:hover {
            background: #fbbf24;
            color: white;
        }

        .btn-icon-sm.danger:hover {
            background: #ef4444;
            color: white;
        }

        @media (max-width: 768px) {
            .contacts-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
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

    <div class="contacts-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Daftar Kontak</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createContactModal">
                    <i class="fas fa-plus"></i> Tambah Kontak
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="contacts-grid">
                @forelse($contacts as $contact)
                    <div onclick="showDetailModal({{ $contact->id }})" class="contact-card-wrapper">
                        <div class="contact-card">
                            <div class="contact-header">
                                <div class="contact-name">
                                    <i class="fas fa-user-circle"></i> {{ $contact->name }}
                                </div>
                                <div class="contact-position">
                                    <i class="fas fa-briefcase"></i> {{ $contact->jabatan ?? '-' }}
                                </div>
                            </div>
                            <div class="contact-body">
                                @if ($contact->company)
                                    <div class="company-info">
                                        <img src="{{ $contact->company->logo ? asset('storage/' . $contact->company->logo) : asset('assets/images/placeholder.png') }}"
                                            class="company-logo" alt="{{ $contact->company->name }}">
                                        <div class="company-details">
                                            <div class="company-name">{{ $contact->company->name }}</div>
                                            <div class="company-location">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $contact->company->location ?? 'Indonesia' }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="contact-detail-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>{{ $contact->no_hp ?? '-' }}</span>
                                </div>
                                <div class="contact-detail-item">
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email ?? '-' }}</a>
                                </div>
                                @if ($contact->description)
                                    <div class="contact-description">
                                        {{ Str::limit($contact->description, 100) }}
                                    </div>
                                @endif
                                <div class="card-actions">
                                    <button class="btn-icon-sm info" onclick="showDetailModal({{ $contact->id }})"
                                        title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon-sm warning"
                                        onclick="openEditModal({{ $contact->id }}, '{{ $contact->name }}', '{{ $contact->jabatan }}', {{ $contact->id_company }}, '{{ $contact->no_hp }}', '{{ $contact->email }}', '{{ $contact->description }}')"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn-icon-sm danger" onclick="openDeleteModal({{ $contact->id }})"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada kontak tersedia.</p>
                    </div>
                @endforelse
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
                            <label for="create_name" class="form-label">name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-classic" id="create_name" name="name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="create_jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control form-control-classic" id="create_jabatan"
                                name="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="create_company_id" class="form-label">Perusahaan <span
                                    class="text-danger">*</span></label>
                            <select class="form-control form-control-classic" id="create_company_id" name="id_company"
                                required>
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

    <!-- Modal Edit Contact -->
    <div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="editContactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="" id="editContactForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editContactModalLabel">
                            <i class="fas fa-edit text-primary me-2"></i>Edit Kontak
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="edit_jabatan" name="jabatan">
                        </div>
                        <div class="mb-3">
                            <label for="edit_id_company" class="form-label">Perusahaan <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" id="edit_id_company" name="id_company" required>
                                <option value="">-- Pilih Perusahaan --</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_no_hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="edit_no_hp" name="no_hp">
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContactModalLabel">
                        <i class="fas fa-trash text-danger me-2"></i>Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kontak ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="" method="POST" id="deleteContactForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Contact -->
    <div class="modal fade" id="detailContactModal" tabindex="-1" aria-labelledby="detailContactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailContactModalLabel">
                        <i class="fas fa-info-circle text-info me-2"></i>Detail Kontak
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailModalBody">
                    <!-- diisi JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data contacts untuk detail (dari server)
        const contactsData = @json($contacts);

        function openEditModal(id, name, jabatan, companyId, noHp, email, description) {
            const form = document.getElementById('editContactForm');
            form.action = '{{ url('admin/contacts') }}/' + id;

            document.getElementById('edit_name').value = name;
            document.getElementById('edit_jabatan').value = jabatan || '';
            document.getElementById('edit_id_company').value = companyId;
            document.getElementById('edit_no_hp').value = noHp || '';
            document.getElementById('edit_email').value = email || '';
            document.getElementById('edit_description').value = description || '';

            var myModal = new bootstrap.Modal(document.getElementById('editContactModal'));
            myModal.show();
        }

        function openDeleteModal(id) {
            const form = document.getElementById('deleteContactForm');
            form.action = '{{ url('admin/contacts') }}/' + id;
            var myModal = new bootstrap.Modal(document.getElementById('deleteContactModal'));
            myModal.show();
        }

        function showDetailModal(id) {
            const contact = contactsData.find(c => c.id === id);
            if (!contact) return;

            let html = `
                <div class="text-center mb-3">
                    <h4>${contact.name}</h4>
                    <p class="text-muted">${contact.jabatan || '-'}</p>
                </div>
                <hr>
                <div class="mb-2"><strong>Perusahaan:</strong> ${contact.company ? contact.company.name : '-'}</div>
                <div class="mb-2"><strong>No HP:</strong> ${contact.no_hp || '-'}</div>
                <div class="mb-2"><strong>Email:</strong> ${contact.email || '-'}</div>
                <div class="mb-2"><strong>Deskripsi:</strong> ${contact.description || '-'}</div>
            `;

            document.getElementById('detailModalBody').innerHTML = html;
            var myModal = new bootstrap.Modal(document.getElementById('detailContactModal'));
            myModal.show();
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
