<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Handle the gambar upload
            $gambar = $request->file('gambar');
            // Generate a unique file name
            $filename = time() . '.' . $gambar->getClientOriginalExtension();
            // Save the file to the folder
            $gambar->move(public_path('img'), $filename);
        // create new produk
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar = $filename;
        $produk->save();
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
  public function show($id)
{
    $produk = Produk::find($id);


        return view('produk.show', compact('produk'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Produk $produk)
{
    // Validate the incoming request
    $request->validate([
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Optional validation for other fields
    ]);

    // Handle the gambar update
    if ($request->hasFile('gambar')) {
        // Delete the old gambar if it exists
        if ($produk->gambarLama && file_exists(public_path('img/' . $produk->gambarLama))) {
            unlink(public_path('img/' . $produk->gambarLama));
        }
         // Handle the gambar upload
            $gambar = $request->file('gambar');
            // Generate a unique file name
            $filename = time() . '.' . $gambar->getClientOriginalExtension();
            // Save the file to the folder
            $gambar->move(public_path('img'), $filename);
        // Update the product with the new gambar name
        $produk->gambar = $filename;
    }
    $produk->nama = $request->nama;
    $produk->deskripsi = $request->deskripsi;
    $produk->harga = $request->harga;
    $produk->stok = $request->stok;
    $produk->save();
    // Update other product details if necessary
    $produk->update;

    return redirect()->route('produk.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
