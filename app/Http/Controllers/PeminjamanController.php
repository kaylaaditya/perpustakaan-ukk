<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.tabel-pinjam');
    }

    public function apiPinjam(Request $request)
    {
        $queryId = $request->query('id');
        $pinjam = Peminjaman::selectRaw('peminjaman.*, judul, koleksi_pribadi.buku_id is not null as koleksi')
            ->join('buku', 'buku.id', 'peminjaman.buku_id')
            ->leftJoin('koleksi_pribadi', function ($join) {
                $join->on('koleksi_pribadi.user_id', '=', 'peminjaman.user_id')
                     ->on('koleksi_pribadi.buku_id', '=', 'buku.id');
            })
            ->where('peminjaman.user_id', $queryId);


        return datatables()->of($pinjam)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.tambah-pinjam');
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
            'buku_id' => 'required',
            'user_id' => 'required',
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required|date',
            'batas_tgl_pengembalian' => 'required|date',
        ]);
        Peminjaman::create($request->all());

        return redirect()->route('layouts.tabel-pinjam')
            ->with('success', 'Peminjaman berhasil disimpan.');
    }

    public function apiBukuSelect(Request $request)
    {
        $queryQ = $request->query('q');
        if ($queryQ != null) {
            $buku_list = Buku::where(function (Builder $queryQ) {
                $queryQ->where(DB::raw("lower(judul)"), 'like', '%' . $queryQ . '%')
                    ->orWhere(DB::raw("lower(penulis)"), 'like', '%' . $queryQ . '%');
            })
                ->whereRaw('stok > (select count(*) from peminjaman where buku.id=buku_id 
                and tgl_pengembalian is null)')
                ->orderBy('judul');
        } else {
            $buku_list = Buku::orderBy('judul');
        }
        return $buku_list->get();
    }

    public function saveData(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'tgl_pengembalian' => 'required',
            'rating' => 'nullable',
            'ulasan' => 'nullable'
        ]);

        $id = $request->id;
        $validated['status_peminjam'] = "sudah dikembalikan";
        Peminjaman::where('id', $id)->update($validated);

        // Process the form data (you can save it to a database or perform any other logic)
        // Example: Saving to a model

        // Redirect or return a response as needed
        return redirect()->route('layouts.tabel-pinjam'); // Change 'your.route.name' to the actual route you want to redirect to
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
