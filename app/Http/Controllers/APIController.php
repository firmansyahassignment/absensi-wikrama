<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Rayon;
use App\Rombel;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function rincian_absensi_siswa($siswa)
    {
        $siswa = Siswa::findOrFail($siswa);
        $dates = format_tanggal(request()->tanggal_pertama, request()->tanggal_terakhir);
        $range = format_range([request()->tanggal_pertama, request()->tanggal_terakhir]);

        if ($dates['tanggal_pertama'] == $dates['tanggal_terakhir']) {
            
        } else{
            
        }

        $data = [
            'nis' => $siswa->nis,
            'nama' => $siswa->nama,
            'rombel' => $siswa->rombel->rombel,
            'rayon' => $siswa->rayon->rayon,
            'absensi' => $siswa->absens->whereBetween('tanggal_absen', $range)
        ];

        return response()->json($data, 200);
    }

    public function cari_siswa()
    {
        $keyword = request()->q;

        $data = Siswa::join('rombels', 'siswas.rombel_id', '=', 'rombels.id')
                    ->join('rayons', 'siswas.rayon_id', '=', 'rayons.id')
                    ->orWhere('siswas.nama', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('siswas.nis', 'LIKE', '%'.$keyword.'%')
                    ->select('siswas.id as id', 'siswas.nis as nis', 'siswas.nama as nama', 'rombels.rombel as rombel', 'rayons.short as rayon')
                    ->get();

        $siswas = [];
        foreach ($data as $a) {
            $siswas[]  = [
                "id" =>  $a->id,
                "nis" => $a->nis,
                "nama" => $a->nama, 
                "rombel" => $a->rombel,
                "rayon" => $a->rayon,
                "orangtua" => $a->orangtua,
                "link" => route(get_link_role() . 'laporan.siswa', $a->id),
            ];
        }
        
        return response()->json($siswas, 200);

    }

    public function cari_rombel()
    {
        $keyword = request()->q;
        $rombels = Rombel::with('jurusan')->where('rombel', 'LIKE', '%'.$keyword.'%')->get();

        return response()->json($rombels, 200);
    }

    public function cari_rayon()
    {
        $keyword = request()->q;
        $rayons = Rayon::with('pembimbing')->where('rayon', 'LIKE', '%'.$keyword.'%')->get();

        return response()->json($rayons, 200);
    }

    public function rincian_absen_siswa(Request $request)
    {
        $siswa = Siswa::findOrFail($request->id);
        $tanggal = format_db($request->tanggal);
        $absen = $siswa->absens->where('tanggal_absen', $tanggal)->first();

        $data = [
            'id' => $siswa->id,
            'nama' => $siswa->nama,
            'nis' => $siswa->nis,
            'rayon' => $siswa->rayon->rayon,
            'diabsen' => $absen ? $absen->user->nama : '',
            'dilaporkan' => $siswa->laporkan_siswa->where('tanggal_absen', $tanggal)->where('user_id', Auth::user()->id)->count() > 0 ? true : false,
        ];

        return response()->json($data, 200);
    }
}
