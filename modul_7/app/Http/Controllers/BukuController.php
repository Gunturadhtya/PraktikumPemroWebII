<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BukuController extends Controller
{
    public function index(): View
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    public function create(): View
    {
        return view('buku.create');
    }

    public function store(StoreBukuRequest $request): RedirectResponse
    {
        Buku::create($request->validated());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku): View
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(UpdateBukuRequest $request, Buku $buku): RedirectResponse
    {
        $buku->update($request->validated());
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diubah.');
    }

    public function destroy(Buku $buku): RedirectResponse
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}