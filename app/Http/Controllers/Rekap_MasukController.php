<?php

namespace App\Http\Controllers;

//import model rekap_masuk
use App\Models\Rekap_Masuk;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class Rekap_MasukController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all rekap_masuks
        $rekap_masuks = Rekap_Masuk::latest()->paginate(10);

        //render view with rekap_masuks
        return view('rekap_masuks.index', compact('rekap_masuks'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('rekap_masuks.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_bahan'    => 'required|string|min:3',
            'tanggal_masuk' => 'required|date',
            'jumlah_masuk'  => 'required|numeric|min:1',
        ]);

        //create rekap_masuk
        Rekap_Masuk::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('rekap_masuks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get rekap_masuk by ID
        $rekap_masuk = Rekap_Masuk::findOrFail($id);

        //render view with rekap_masuk
        return view('rekap_masuks.show', compact('rekap_masuk'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get rekap_masuk by ID
        $rekap_masuk = Rekap_Masuk::findOrFail($id);

        //render view with rekap_masuk
        return view('rekap_masuks.edit', compact('rekap_masuk'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get rekap_masuk by ID
        $rekap_masuk = Rekap_Masuk::findOrFail($id);

        //update rekap_masuk
        $rekap_masuk->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('rekap_masuks.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get rekap_masuk by ID
        $rekap_masuk = Rekap_Masuk::findOrFail($id);

        //delete rekap_masuk
        $rekap_masuk->delete();

        //redirect to index
        return redirect()->route('rekap_masuks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}