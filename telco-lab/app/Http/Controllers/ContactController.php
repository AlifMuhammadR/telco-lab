<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // User: daftar kontak
    public function index()
    {
        $contacts = Contact::with('company')->get();
        return view('user.contacts', compact('contacts'));
    }

    // User: detail kontak (opsional)
    public function show($id)
    {
        $contact = Contact::with('company')->findOrFail($id);
        return view('user.contacts-detail', compact('contact'));
    }

    // Admin: daftar kontak
    public function indexAdmin()
    {
        $contacts = Contact::with('company')->get();
        $companies = Company::all();
        return view('admin.contacts', compact('contacts', 'companies'));
    }

    // Admin: detail kontak
    public function showAdmin($id)
    {
        $contact = Contact::with('company')->findOrFail($id);
        return view('admin.contacts-detail', compact('contact'));
    }

    // Admin: form create
    public function create()
    {
        $companies = Company::all();
        return view('admin.contacts-create', compact('companies'));
    }

    // Admin: simpan kontak
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'id_company' => 'required|exists:companies,id',
            'jabatan' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    // Admin: form edit
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $companies = Company::all();
        return view('admin.contacts-edit', compact('contact', 'companies'));
    }

    // Admin: update kontak
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'id_company' => 'required|exists:companies,id',
            'jabatan' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    // Admin: hapus kontak
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }
}
