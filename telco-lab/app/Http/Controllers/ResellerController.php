<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResellerController extends Controller
{
    // Untuk user biasa: menampilkan daftar reseller
    public function index()
    {
        // Ambil semua vendor beserta produk dan perusahaan terkait
        $vendors = Vendor::with('products.companies')->get();

        $vendorCompanies = [];
        foreach ($vendors as $vendor) {
            // Ambil semua perusahaan yang terkait dengan produk vendor ini, lalu unique
            $companies = $vendor->products->flatMap->companies->unique('id');
            if ($companies->isNotEmpty()) {
                $vendorCompanies[] = [
                    'vendor' => $vendor,
                    'companies' => $companies
                ];
            }
        }

        return view('user.resellers', [
            'title' => 'Daftar Reseller',
            'vendorCompanies' => $vendorCompanies
        ]);
    }

    // Untuk user biasa: detail reseller
    public function show($id)
    {
        $company = Company::with(['contacts', 'products.vendor'])->findOrFail($id);
        return view('user.resellers-detail', compact('company'));
    }

    // Untuk admin: daftar reseller
    public function indexAdmin()
    {
        $vendors = Vendor::with('products.companies')->get();
        $vendorCompanies = [];
        $companies = Company::all(); // ambil semua perusahaan
        foreach ($vendors as $vendor) {
            $companies = $vendor->products->flatMap->companies->unique('id');
            if ($companies->isNotEmpty()) {
                $vendorCompanies[] = [
                    'vendor' => $vendor,
                    'companies' => $companies
                ];
            }
        }
        return view('admin.resellers', [
            'title' => 'Daftar Reseller',
            'vendorCompanies' => $vendorCompanies,
            'companies' => $companies // kirim semua perusahaan ke view
        ]);
    }

    // Untuk admin: detail reseller
    public function showAdmin($id)
    {
        $company = Company::with(['contacts', 'products.vendor', 'products.companies'])->findOrFail($id);
        return view('admin.resellers-detail', [
            'title' => 'Detail Reseller',
            'company' => $company
        ]);
    }

    // Menyimpan data baru (admin)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('companies', 'public');
        }

        Company::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.resellers.index')->with('success', 'Reseller berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.resellers-edit', [
            'title' => 'Edit Reseller',
            'company' => $company
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
        ];

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        $company->update($data);

        return redirect()->route('admin.resellers.index')->with('success', 'Reseller berhasil diupdate.');
    }

    // Hapus data
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();

        return redirect()->route('admin.resellers.index')->with('success', 'Reseller berhasil dihapus.');
    }
}
