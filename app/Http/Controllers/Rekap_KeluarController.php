<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Rekap_Keluar; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

//import Facades Storage
use Illuminate\Support\Facades\Storage;

class Rekap_KeluarController extends Controller
{
         /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all rekap_keluars
        $rekap_keluars = Rekap_Keluar::latest()->paginate(10);

        //render view with rekap_keluars
        return view('rekap_keluars.index', compact('rekap_keluars'));
    }
     /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('rekap_keluars.create');
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
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/rekap_keluars', $image->hashName());

        //create rekap_keluar
        Rekap_Keluar::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('rekap_keluars.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get rekap_keluar by ID
        $rekap_keluar = Rekap_Keluar::findOrFail($id);

        //render view with rekap_keluar
        return view('rekap_keluars.show', compact('rekap_keluar'));
    }
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get rekap_keluar by ID
        $rekap_keluar = Rekap_Keluar::findOrFail($id);

        //render view with rekap_keluar
        return view('rekap_keluars.edit', compact('rekap_keluar'));
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
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get rekap_keluar by ID
        $rekap_keluar = Rekap_Keluar::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/rekap_keluars', $image->hashName());

            //delete old image
            Storage::delete('public/rekap_keluars/'.$rekap_keluar->image);

            //update rekap_keluar with new image
            $rekap_keluar->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);

        } else {

            //update rekap_keluar without image
            $rekap_keluar->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }

        //redirect to index
        return redirect()->route('rekap_keluars.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get rekap_keluar by ID
        $rekap_keluar = Rekap_Keluar::findOrFail($id);

        //delete image
        Storage::delete('public/rekap_keluars/'. $rekap_keluar->image);

        //delete rekap_keluar
        $rekap_keluar->delete();

        //redirect to index
        return redirect()->route('rekap_keluars.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}