<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Untuk user biasa: menampilkan daftar produk
    public function index()
    {
        $products = Product::with('vendor')->get();
        return view('user.products', [
            'title' => 'Products',
            'products' => $products
        ]);
    }

    // Untuk user biasa: detail produk
    public function show($id)
    {
        $product = Product::with(['vendor', 'companies'])->findOrFail($id);
        return view('user.products-detail', [
            'title' => 'Detail Product',
            'product' => $product
        ]);
    }

    // Untuk admin: daftar produk
    public function indexAdmin()
    {
        $products = Product::with('vendor')->get();
        return view('admin.products', [
            'title' => 'Daftar Produk',
            'products' => $products
        ]);
    }

    // Untuk admin: detail produk
    public function showAdmin($id)
    {
        $product = Product::with(['vendor', 'companies'])->findOrFail($id);
        return view('admin.products-detail', [
            'title' => 'Detail Produk',
            'product' => $product
        ]);
    }

    // Menampilkan form create (jika tidak pakai modal)
    public function create()
    {
        $vendors = Vendor::all();
        $companies = Company::all();
        return view('admin.products-create', compact('vendors', 'companies'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'id_vendor' => 'nullable|exists:vendors,id',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'id_vendor' => $request->id_vendor,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        if ($request->has('companies')) {
            $product->companies()->attach($request->companies);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $companies = Company::all();
        $vendors = Vendor::all();
        return view('admin.products-edit', compact('product', 'vendors', 'companies'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'id_vendor' => 'nullable|exists:vendors,id',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Data yang selalu diupdate (tanpa image)
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'id_vendor' => $request->id_vendor,
            'category' => $request->category,
            'description' => $request->description,
        ];

        // Hanya proses gambar jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        // Sinkronisasi perusahaan
        if ($request->has('companies')) {
            $product->companies()->sync($request->companies);
        } else {
            $product->companies()->sync([]);
        }

        return redirect()->route('admin.products.show', $id)->with('success', 'Produk berhasil diupdate.');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
