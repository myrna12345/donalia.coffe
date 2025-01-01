<?php

namespace App\Http\Controllers;

use App\Models\Rekap_Masuk;
use Illuminate\Http\Request;
class Rekap_MasukController extends Controller
{
    /**
     * Menampilkan daftar rekap masuk dengan pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $rekapMasuks = Rekap_Masuk::latest()->paginate(10);
        return view('rekap_masuks.index', compact('rekapMasuks'));
    }

    /**
     * Menampilkan detail rekap masuk.
     *
     * @param  \App\Models\Rekap_Masuk  $rekap_masuk
     * @return \Illuminate\View\View
     */
    public function show(Rekap_Masuk $rekap_masuk)
    {
        // Menampilkan detail data rekap masuk
        return view('rekap_masuks.show', compact('rekap_masuk'));
    }

    /**
     * Menampilkan form untuk mengedit data yang ada.
     *
     * @param  \App\Models\Rekap_Masuk  $rekap_masuk
     * @return \Illuminate\View\View
     */
    public function edit(Rekap_Masuk $rekap_masuk)
    {
        return view('rekap_masuks.edit', compact('rekap_masuk'));
    }

    /**
     * Memperbarui data yang ada ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekap_Masuk  $rekap_masuk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Rekap_Masuk $rekap_masuk)
    {
        $validated = $request->validate([
            'jenis_transaksi' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jumlah_masuk' => 'required|numeric|min:0',
        ]);

        $rekap_masuk->update($validated);

        return redirect()->route('rekap_masuks.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menampilkan form untuk membuat data baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rekap_masuks.create');
    }

    /**
     * Menyimpan data baru yang dikirimkan dari form ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_transaksi' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jumlah_masuk' => 'required|numeric|min:0',
        ]);

        Rekap_Masuk::create($validated);

        return redirect()->route('rekap_masuks.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Menghapus data yang dipilih.
     *
     * @param  \App\Models\Rekap_Masuk  $rekap_masuk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Rekap_Masuk $rekap_masuk)
    {
        $rekap_masuk->delete();

        return redirect()->route('rekap_masuks.index')->with('success', 'Data berhasil dihapus!');
    }
    public function rekapmasuk()
    {
        // Ambil data rekap_masuk
        $rekap_masuk = Rekap_Masuk::all();

        // Render view dengan data rekap_masuk
        return view('user.rmasuk', compact('rekap_masuk'));
    }
}
