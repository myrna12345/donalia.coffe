<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all products with pagination
        $products = Product::latest()->paginate(10);

        // Render view with products
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form input
        $request->validate([
            'nama_bahan'             => 'required|min:5',
            'kategori'               => 'required|min:10',
            'harga'                  => 'required|numeric',
            'jumlah'                 => 'required|numeric',
            'tanggal_masuk'          => 'required|date',
            'tanggal_kadaluarsa'     => 'required|date',
            'bahan_sering_digunakan' => 'required|min:10',
            'bahan_jarang_digunakan' => 'required|min:10'
        ]);

        // Create product
        Product::create($request->all());

        // Redirect to index with success message
        return redirect()->route('products.index')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified product.
     *
     * @param  string  $id
     * @return View
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  string  $id
     * @return View
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form input
        $request->validate([
            'nama_bahan'             => 'required|min:5',
            'kategori'               => 'required|min:10',
            'harga'                  => 'required|numeric',
            'jumlah'                 => 'required|numeric',
            'tanggal_masuk'          => 'required|date',
            'tanggal_kadaluarsa'     => 'required|date',
            'bahan_sering_digunakan' => 'required|min:10',
            'bahan_jarang_digunakan' => 'required|min:10'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Data Berhasil Dihapus!');
    }
}