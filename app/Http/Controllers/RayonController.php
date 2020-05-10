<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rayon;
use App\Absen;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rayon)
    {
        $rayons = Rayon::where('pembimbing_id', auth()->user()->id)->get();
        $rayon = $rayons->find($rayon);
        if($rayon){
            return view('rayon.show', compact('rayon'));
        }

        return abort(404);
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

    public function absen($rayon)
    {
        $rayons = Rayon::where('pembimbing_id', auth()->user()->id)->get();
        $rayon = $rayons->find($rayon);
        if($rayon){
            return view('rayon.absen_rayon', compact('rayon'));
        }
        return abort(404);
    }

    public function simpan_absen($rayon, Request $request)
    {
        $tanggal_absen = ubah_format_tanggal($request->tanggal_absen);

        $data_absen = data_absen($request->absen);

        foreach ($data_absen as $absen) {
            $cek = Absen::where('siswa_id', $absen['siswa_id'])->where('tanggal_absen', $tanggal_absen);
            $cek_apakah_sudah_ada = $cek->count();
            if ($cek_apakah_sudah_ada > 0) {
                $apakah_sama = $cek->first()->keterangan == $absen['keterangan'];
                if ($apakah_sama == false) {
                    $cek->first()->update([
                        'user_id' => auth()->user()->id,
                        'keterangan' => $absen['keterangan']
                    ]);
                }
            } else{
                Absen::create([
                    'siswa_id' => $absen['siswa_id'],
                    'rombel_id' => $absen['rombel_id'],
                    'rayon_id' => $absen['rayon_id'],
                    'keterangan' => $absen['keterangan'],
                    'tanggal_absen' => ubah_format_tanggal($request->tanggal_absen),
                    'user_id' => auth()->user()->id
                ]);
            }
        }

        return redirect()->back()->with('status', 'Berhasil mengabsen!');
    }

    public function laporan($rayon)
    {
        $rayons = Rayon::where('pembimbing_id', auth()->user()->id)->get();
        $rayon = $rayons->find($rayon);
        if($rayon){
            $absens = Absen::all();
            return view('rayon.laporan_rayon', compact('rayon', 'absens'));
        }

        return abort(404);
    }
}
