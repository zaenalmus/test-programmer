<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function getApi()
        {
            $sc = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';
            $username = 'tesprogrammer120623C09';
            $password = 'c8b0c5bcf0137f2a7c7a7441440a8150';

            $url = Http::asForm()->post($sc, [
                'username' => $username,
                'password' => $password
            ]);

            $response = json_decode($url, true);
            $data = $response['data'];

            foreach ($data as $d) {
                $produk = new Produk;
                $produk->nama_produk = $d['nama_produk'];
                $produk->harga = $d['harga'];
                $produk->kategori = $d['kategori'];
                $produk->status = $d['status'];
                $produk->save();
            }
        }

    public function index()
    {
        $produk = Produk::where('status', 'bisa dijual')->paginate(5);
        return view('dashboard', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('dashboard', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'status' => 'required'
        ]);
        if($validasi) :
            $store = Produk::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'status' => $request->status,
            ]);
        endif;
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('dashboard', compact('produk', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'status' => 'required'
        ]);
        if($validasi) :
            $update = Produk::findOrFail($id)->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
                'status' => $request->status,
            ]);
        endif;
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Produk::find($id)->delete()) :
        endif;

        return Redirect::back();
    }
}
