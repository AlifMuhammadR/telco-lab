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

        /* Modal styles (copy dari admin) */
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

        @media (max-width: 768px) {
            .contacts-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>

    <div class="contacts-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Daftar Kontak Person</h2>
            </div>

            <div class="contacts-grid">
                @forelse($contacts as $contact)
                    <div onclick="showDetailModal({{ $contact->id }})">
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
                                        {{ $contact->description }}
                                    </div>
                                @endif
                                <div class="card-actions">
                                    <button class="btn-icon-sm info" onclick="showDetailModal({{ $contact->id }})"
                                        title="Detail">
                                        <i class="fas fa-eye"></i>
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

    <!-- Modal Detail Contact -->
    <div class="modal" id="detailContactModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Kontak</h3>
                <button class="modal-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="detailModalBody">
                <!-- diisi JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        // Data contacts untuk detail (dari server)
        const contactsData = @json($contacts);

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
            document.getElementById('detailContactModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('detailContactModal').classList.remove('active');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('detailContactModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
