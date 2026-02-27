@extends('master.dashboard')
@section('navbar')
    @include('master.navbar')
@endsection
@section('hero')
    @include('master.hero')
@endsection
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Edit Produk</h2>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">name Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $product->price) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="id_vendor" class="form-label">Vendor</label>
                            <select name="id_vendor" id="id_vendor"
                                class="form-control @error('id_vendor') is-invalid @enderror">
                                <option value="">-- Pilih Vendor --</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ old('id_vendor', $product->id_vendor) == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_vendor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category"
                            name="category" value="{{ old('category', $product->category) }}">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <div>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Current image"
                                    style="max-width: 200px; max-height: 200px; object-fit: contain;" class="mb-2 d-block">
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar. Format: JPG, PNG, SVG.
                                Maks 2MB.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="4">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tersedia di Perusahaan</label>
                        <select name="companies[]" class="form-control" multiple size="5">
                            @foreach ($companies as $company)
                                @php
                                    $selected = in_array(
                                        $company->id,
                                        old('companies', $product->companies->pluck('id')->toArray()),
                                    )
                                        ? 'selected'
                                        : '';
                                @endphp
                                <option value="{{ $company->id }}" {{ $selected }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Tekan Ctrl untuk memilih lebih dari satu.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
