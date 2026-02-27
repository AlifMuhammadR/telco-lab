    @extends('master.dashboard')
    @section('navbar')
        @include('master.navbar')
    @endsection
    @section('hero')
        @include('master.hero')
    @endsection
    @section('content')
        <style>
            /* Tambahan CSS untuk tombol */
            .product-item .btn-action {
                width: 32px;
                height: 32px;
                background: rgba(255, 255, 255, 0.9);
                border: none;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                transition: all 0.2s ease;
                color: #1e293b;
            }

            .product-item .btn-action:hover {
                background: white;
                transform: scale(1.1);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            }

            .product-item .btn-action i {
                font-size: 0.9rem;
            }

            .product-item .action-group {
                position: absolute;
                top: 8px;
                right: 8px;
                display: flex;
                gap: 6px;
                z-index: 10;
            }

            .product-item {
                position: relative;
            }

            /* Pastikan gambar tidak tertutup */
            .product-item .product-thumbnail {
                width: 100%;
                height: 140px;
                object-fit: contain;
                margin-bottom: 10px;
            }
        </style>
        <!-- Alert Success -->
        @if (session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        <!-- Product Section -->
        <div class="product-section">
            <div class="container">
                <div class="row">
                    <!-- LEFT INTRO -->
                    <div class="col-lg-3">
                        <h2 class="mb-3 section-title">Brand Network Devices</h2>
                        <p class="mb-3">
                            Vendor perangkat jaringan enterprise router, switch,
                            firewall, access point, dan optical devices.
                        </p>
                        <p>
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addVendorModal">
                                        <i class="fas fa-plus-circle"></i> Add Vendor
                                    </a>
                                @else
                                    <a href="#" class="btn">Explore</a>
                                @endif
                            @endauth
                            @guest
                                <a href="#" class="btn">Explore</a>
                            @endguest
                        </p>
                    </div>

                    <!-- RIGHT GRID (daftar vendor) -->
                    <div class="col-lg-9">
                        <div class="row">
                            @forelse($vendors as $vendor)
                                <div class="col-6 col-md-4 mb-4">
                                    <div class="product-item text-center">
                                        @auth
                                            @if (Auth::user()->role === 'admin')
                                                <!-- Grup tombol di pojok kanan atas -->
                                                <div class="action-group">
                                                    <!-- Tombol Edit -->
                                                    <button class="btn-action"
                                                        onclick="event.stopPropagation(); openEditModal({{ $vendor->id }}, '{{ $vendor->name }}', '{{ $vendor->description }}', '{{ $vendor->logo }}')"
                                                        title="Edit vendor">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                    <!-- Tombol Hapus -->
                                                    <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus vendor ini?')"
                                                        onclick="event.stopPropagation();" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-action" title="Hapus vendor">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                        <a class="text-decoration-none" href="#">
                                            @if ($vendor->logo)
                                                <img src="{{ asset('storage/' . $vendor->logo) }}"
                                                    class="img-fluid product-thumbnail" alt="{{ $vendor->name }}">
                                            @else
                                                <img src="{{ asset('assets/images/placeholder.png') }}"
                                                    class="img-fluid product-thumbnail" alt="No logo">
                                            @endif
                                            <h3 class="product-title">{{ $vendor->name }}</h3>
                                            <span class="icon-cross">
                                                <img src="{{ asset('assets/images/cross.svg') }}">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <p class="text-muted">Belum ada vendor tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Vendor (tidak berubah) -->
        @auth
            @if (Auth::user()->role === 'admin')
                <div class="modal fade" id="addVendorModal" tabindex="-1" aria-labelledby="addVendorModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('vendors.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addVendorModalLabel">
                                        <i class="fas fa-plus-circle text-primary me-2"></i>Tambah Vendor Baru
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">name Vendor <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" required
                                            placeholder="Contoh: Cisco Systems">
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo Vendor</label>
                                        <div>
                                            <label for="logo" class="btn btn-outline-secondary">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>Pilih File
                                            </label>
                                            <input type="file" class="d-none" id="logo" name="logo" accept="image/*"
                                                onchange="updateFileName(this)">
                                            <span id="logo-name" class="ms-2 text-muted">Tidak ada file dipilih</span>
                                        </div>
                                        <small class="text-muted">Format: JPG, PNG, SVG. Maks 2MB.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"
                                            placeholder="Informasi singkat tentang vendor..."></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Simpan Vendor
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Vendor -->
                <div class="modal fade" id="editVendorModal" tabindex="-1" aria-labelledby="editVendorModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="" id="editVendorForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editVendorModalLabel">
                                        <i class="fas fa-edit text-primary me-2"></i>Edit Vendor
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="edit_vendor_id" name="vendor_id">
                                    <div class="mb-3">
                                        <label for="edit_name" class="form-label">name Vendor <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="edit_name" name="name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Logo Saat Ini</label>
                                        <div id="current_logo_container" class="mb-2">
                                            <!-- diisi JavaScript -->
                                        </div>
                                        <label for="edit_logo" class="form-label">Ganti Logo (opsional)</label>
                                        <div>
                                            <label for="edit_logo" class="btn btn-outline-secondary">
                                                <i class="fas fa-cloud-upload-alt me-2"></i>Pilih File
                                            </label>
                                            <input type="file" class="d-none" id="edit_logo" name="logo"
                                                accept="image/*" onchange="updateEditFileName(this)">
                                            <span id="edit_logo_name" class="ms-2 text-muted">Tidak ada file dipilih</span>
                                        </div>
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah logo.</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="edit_description" name="description" rows="4"></textarea>
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
                    // Untuk modal tambah
                    function updateFileName(input) {
                        const fileName = input.files[0]?.name || 'Tidak ada file dipilih';
                        document.getElementById('logo-name').textContent = fileName;
                    }

                    // Untuk modal edit
                    function updateEditFileName(input) {
                        const fileName = input.files[0]?.name || 'Tidak ada file dipilih';
                        document.getElementById('edit_logo_name').textContent = fileName;
                    }

                    // Buka modal edit dan isi data
                    function openEditModal(id, name, description, logoPath) {
                        // Set action form
                        const form = document.getElementById('editVendorForm');
                        form.action = '{{ url('vendors') }}' + '/' + id; // <-- perbaikan di sini

                        // Isi field
                        document.getElementById('edit_name').value = name;
                        document.getElementById('edit_description').value = description || '';

                        // Tampilkan logo saat ini
                        const logoContainer = document.getElementById('current_logo_container');
                        if (logoPath) {
                            logoContainer.innerHTML =
                                `<img src="{{ asset('storage/') }}/${logoPath}" alt="Current logo" style="max-width: 100px; max-height: 100px; object-fit: contain;" class="border rounded p-1">`;
                        } else {
                            logoContainer.innerHTML = '<p class="text-muted">Tidak ada logo</p>';
                        }

                        // Reset file input
                        document.getElementById('edit_logo').value = '';
                        document.getElementById('edit_logo_name').textContent = 'Tidak ada file dipilih';

                        // Tampilkan modal
                        var myModal = new bootstrap.Modal(document.getElementById('editVendorModal'));
                        myModal.show();
                    }
                </script>
            @endif
        @endauth

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @endsection
