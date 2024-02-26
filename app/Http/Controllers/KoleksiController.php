<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KoleksiPribadi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.tabel-koleksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
        ]);
        KoleksiPribadi::create($request->all());

        return response()->json(['success' => true]);
    }

    public function apiKoleksi(Request $request)
    {
        $user_id = $request->user_id;
        $buku =  Buku::selectRaw("buku.id, judul, penulis, penerbit, tahun_terbit, foto, 
        concat(stok - (select count(*) from peminjaman where buku.id=buku_id 
        and tgl_pengembalian is null), '/', stok) stok, kategori_buku.nama_kategori")
            ->leftJoin('kategori_buku_relasi', 'buku_id', '=', 'buku.id')
            ->leftJoin('kategori_buku', 'kategori_id', '=', 'kategori_buku.id')
            ->join('koleksi_pribadi', 'buku.id', '=', 'koleksi_pribadi.buku_id')
            ->where('user_id', $user_id)
            ->get();
        // ->select('buku.*', 'kategori_buku.nama_kategori')->get();
        return datatables()->of($buku)->toJson();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
