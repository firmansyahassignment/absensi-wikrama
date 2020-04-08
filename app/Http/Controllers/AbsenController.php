<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function absen_rombel($rombel)
    {
        $url = get_link_role();
        $rombel = Rombel::findOrFail($rombel);
        return view('absen.absen_rombel', compact('rombel'));
    }

    public function absen_daftar_rombel()
    {
        $rombels = Rombel::all();
        return view('absen.absen_daftar_rombel', compact('rombels'));
    }

    public function simpan_absen_rombel(Request $request)
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
                        'user_id' => Auth::user()->id,
                        'keterangan' => $absen['keterangan']
                    ]);
                }
            } else{
                Absen::create([
                    'siswa_id' => $absen['siswa_id'],
                    'rombel_id' => $request->rombel_id,
                    'rayon_id' => $absen['rayon_id'],
                    'keterangan' => $absen['keterangan'],
                    'tanggal_absen' => ubah_format_tanggal($request->tanggal_absen),
                    'user_id' => Auth::user()->id
                ]);
            }
        }

        return redirect()->back()->with('status', 'Berhasil mengabsen!');
    }
}
