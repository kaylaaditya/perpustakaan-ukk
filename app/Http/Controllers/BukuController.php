<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\KategoriBukuRelasi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.tabel-data');
    }

    public function apiBuku()
    {
        $buku = Buku::selectRaw("id, judul, penulis, penerbit, tahun_terbit, foto, 
        concat(stok - (select count(*) from peminjaman where buku.id=buku_id 
        and tgl_pengembalian is null), '/', stok) stok")
            ->leftJoin('kategori_buku_relasi', 'buku_id', '=', 'buku.id')
            ->leftJoin('kategori_buku', 'kategori_id', '=', 'kategori_buku.id')
            ->select('buku.*', 'kategori_buku.nama_kategori')->get();
        return datatables()->of($buku)->toJson();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoribuku = KategoriBuku::select('*')->get();;
        $data = [
            'kategoribuku' => $kategoribuku,
        ];
        return view('layouts.form-data', $data);
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
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required',
            'kategori' => 'required',

        ]);

        $buku = new Buku($request->all());

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images/books'), $fotoName);
            $buku->foto = $fotoName;
        }

        $buku->save();

        $daftar_kategori = $request->kategori;
        for ($i = 0; $i < count($daftar_kategori); $i++) {
            $data_relasi['kategori_id'] = $daftar_kategori[$i];
            $data_relasi['buku_id'] = $buku->id;
            KategoriBukuRelasi::create($data_relasi);
        }

        return redirect()->route('layouts.tabel-data')->with('success', 'Buku berhasil ditambahkan');
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
    public function edit(Request $request)
    {
        $id = $request->id;
        $buku = Buku::findOrFail($id);
        $kategoribuku = KategoriBuku::select('*')->get();
        $kategoribukurelasi = KategoriBukuRelasi::where('buku_id', $id)->get();
        $data = [
            'kategoribukurelasi' => $kategoribukurelasi,
            'kategoribuku' => $kategoribuku,
            'buku' => $buku
        ];


        return view('layouts.edit', $data);
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
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required',
            'kategori' => 'required',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        if ($request->hasFile('foto')) {
            // Proses update gambar jika ada perubahan
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images/books'), $fotoName);
            $buku->foto = $fotoName;
            $buku->save();

            KategoriBukuRelasi::where('buku_id', $buku->id)->delete(); // hapus dulu kategori yang lama
            $daftar_kategori = $request->kategori;
            for ($i = 0; $i < count($daftar_kategori); $i++) {
                $data_relasi['kategori_id'] = $daftar_kategori[$i];
                $data_relasi['buku_id'] = $buku->id;
                KategoriBukuRelasi::create($data_relasi);
            }
        }

        return redirect('/tabel1')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return ['success' => true];
    }

    public function apiLaporan()
    {
        $dataPerpustakaan = Peminjaman::selectRaw('peminjaman.id, users.nama_lengkap as nama_peminjam, buku.judul, tgl_pinjam, tgl_pengembalian, status_peminjam')
            ->join('buku', 'buku.id', '=', 'buku_id')
            ->join('users', 'users.id', '=', 'user_id');
        return datatables()->of($dataPerpustakaan)->toJson();
    }

    public function indexLaporan()
    {
        return view('layouts.laporan_perpustakaan');
    }
}
