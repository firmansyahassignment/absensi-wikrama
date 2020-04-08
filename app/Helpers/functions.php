<?php

use App\Absen;
use App\Jurusan;
use App\Pengumuman;
use App\PengumumanReaded;
use App\Rayon;
use App\Role;
use App\Rombel;
use App\Siswa;
use App\User;
use Illuminate\Support\Facades\Auth;

// Major

function jumlah_absen_hari_ini($keterangan){
    return Absen::where('keterangan', $keterangan)->where('tanggal_absen', date('Y-m-d'))->count();
}

function jumlah_belum_diabsen_hari_ini(){
    $siswas = Siswa::count();
    $absens = Absen::where('tanggal_absen', date('Y-m-d'))->count();
    return $siswas - $absens;
}

function jumlah_rombel(){
    return Rombel::count();
}

function jumlah_rayon(){
    return Rayon::count();
}

function jumlah_siswa(){
    return Siswa::count();
}

function jumlah_jurusan(){
    return Jurusan::count();
}



// Terakhir Update

function terakhir_update($rombel, $tanggal){

    $tanggal = ubah_format_tanggal($tanggal);
    $data = $rombel->absens->where('tanggal_absen', $tanggal)->sortBy('created_at')->first();

    if (!isset($data)) {
        return '';
    }
    $diedit_oleh = User::find($data->user_id)->nama;
    $terakhir_edit = jam_manusia($data->updated_at);

    return "Diedit terakhir oleh " . $diedit_oleh . " (" . $terakhir_edit . ")";
    
}



// Chart

function date_range_absen($rombel, $range){
    $range = range_format_db($range[0], $range[1]);
    
    $tanggal = $rombel->absens->whereBetween('tanggal_absen', $range)->unique('tanggal_absen')->sortBy('created_at');

    $data = '';
    foreach ($tanggal as $a) {
        $data .= "'" . tanggal_bulan($a->tanggal_absen) . "', ";
    }
    $data = trim($data, ', ');

    return $data;

}

function value_range_absen($rombel, $range){
    $range = range_format_db($range[0], $range[1]);

    $absens = $rombel->absens->whereBetween('tanggal_absen', $range);
    $tanggal = $absens->unique('tanggal_absen')->sortBy('created_at');

    $ck = [];
    foreach ($tanggal as $a) {
        $ck[] = $rombel->absens->where('tanggal_absen', $a->tanggal_absen)->where('keterangan', 'masuk')->count();
    }

    $data = '';
    for ($i=0; $i < count($ck); $i++) { 
        $data .= $ck[$i] . ', ';
    }

    return trim($data, ', ');
}


function kalkulasi_tanggal_laporan($rombel, $range){
    
}


function stepSize($rombel){
    $siswas = $rombel->siswas->count();

    return ($siswas * 2);
}

function kalkulasi_absensi($rombel, $range){
    return $rombel->absens->whereBetween('tanggal_absen', $range)->unique('tanggal_absen');
}


















// Others

function jam_manusia($waktu){
    return \Carbon\Carbon::parse($waktu)->formatLocalized('%H:%M');
}

function tanggal_bulan($tanggal){
    return \Carbon\Carbon::parse($tanggal)->formatLocalized('%d/%m');
}

function format_tanggal($tanggal_pertama, $tanggal_terakhir){
    $tp = \Carbon\Carbon::parse($tanggal_pertama)->formatLocalized('%Y-%m-%d');
    $tt = \Carbon\Carbon::parse($tanggal_terakhir)->formatLocalized('%Y-%m-%d');
    
    return ['tanggal_pertama' => $tp, 'tanggal_terakhir' => $tt];
}

function range_format_db($tanggal_pertama, $tanggal_terakhir){
    $tp = \Carbon\Carbon::parse($tanggal_pertama)->formatLocalized('%Y-%m-%d');
    $tt = \Carbon\Carbon::parse($tanggal_terakhir)->formatLocalized('%Y-%m-%d');
    
    return [$tp, $tt];
}

function format_range(array $range){
    $tp = \Carbon\Carbon::parse($range[0])->formatLocalized('%Y-%m-%d');
    $tt = \Carbon\Carbon::parse($range[1])->formatLocalized('%Y-%m-%d');

    $range = [$tp, $tt];

    return $range;
}

function array_object_to_text($array){
    $text = '';
    foreach ($array as $a) {
        $text .= $a->role . ', ';
    }

    return trim($text, ', ');
};

function format_manusia($tanggal){
    return \Carbon\Carbon::parse($tanggal)->formatLocalized('%d %B %Y');
}

function format_local($tanggal)
{
    return \Carbon\Carbon::parse($tanggal)->formatLocalized('%d-%m-%Y');
}

function ubah_format_tanggal($tanggal)
{
    return \Carbon\Carbon::parse($tanggal)->formatLocalized('%Y-%m-%d');
}

function format_db($tanggal)
{
    return \Carbon\Carbon::parse($tanggal)->formatLocalized('%Y-%m-%d');
}


function cek_range($tanggal_pertama, $tanggal_terakhir)
{
    if ($tanggal_pertama == $tanggal_terakhir) {
        return "one";
    } else{
        return "two";
    }
}

function data_absen(array $data)
{
    $idSiswa = array_keys($data);
    $value = array_values($data);
    $absen = [];
    for ($i=0; $i < count($idSiswa); $i++) { 
        $absen[] = [
            'siswa_id' => $idSiswa[$i],
            'rayon_id' => Siswa::find($idSiswa[$i])->rayon_id,
            'keterangan' => $value[$i],
        ];
    }

    return $absen;
}

function tanggal_range(){
    $tanggal_pertama = request()->tanggal_pertama ?? date('Y-m-d');
    $tanggal_terakhir = request()->tanggal_terakhir ?? date('Y-m-d');
    $range = [$tanggal_pertama, $tanggal_terakhir];

    return $range;
}

function range_params(){
    $range= tanggal_range();
    $tanggal_pertama = $range[0];
    $tanggal_terakhir = $range[1];

    return 'tanggal_pertama=' . $tanggal_pertama . '&tanggal_terakhir=' . $tanggal_terakhir;
}


// Cek Absen Siswa

function tanggal_range_db(){
    $range = tanggal_range();

    return format_range($range);
}

function ls_range($siswa){
    return $siswa->absens->whereBetween('tanggal_absen', tanggal_range_db());
}

function ls_chart_val($siswa){

    $jc = ls_jumlah_keterangan($siswa, tanggal_range_db());

    $data = "'" . $jc[0] . "', '" . $jc[1] . "', '" . $jc[2] . "', '" . $jc[3] . "'";

    return $data;
}

function laporan_siswa_jumlah_keterangan($absens, $keterangan){
    return $absens->where('keterangan', $keterangan)->count();
}

function ls_jumlah_keterangan($siswa){
    $absens = ls_range($siswa, tanggal_range_db());
    $data = ['masuk', 'sakit', 'izin', 'alfa'];

    $return = [];
    for ($i=0; $i < count($data); $i++) { 
        $return[]  = $absens->where('keterangan', $data[$i])->count();
    }

    return $return;
}


// Daftar Rombel

function absen_hari_ini($rombel){
    $jml_siswa = $rombel->siswas->count();
    if ($jml_siswa == 0) {
        return '<i class="fa fa-ban fa-sm text-danger" aria-hidden="true"></i>';
    }
    $jml_absen = $rombel->absens->where('tanggal_absen', date('Y-m-d'))->where('keterangan', '!=', null)->count();
    if ( ($jml_siswa - $jml_absen) > 0) {
        return '<i class="fa text-warning fa-sm fa-exclamation-circle" aria-hidden="true"></i>';
    } else{
        return '<i class="fa text-success fa-sm fa-check-circle" aria-hidden="true"></i>';
    }
}

function ada_siswa($rombel){
    $jml_siswa = $rombel->siswas->count();

    return $jml_siswa > 0 ? true : false;
}


// Pengumuman

function pengumuman_readed($pengumuman){
    $ada = PengumumanReaded::where('pengumuman_id', $pengumuman->id)
                            ->where('user_id', Auth::user()->id)
                            ->where('role_id', Auth::user()->role)->count();
    if ($ada > 0) {
        return true;
    } else{
        PengumumanReaded::create([
            'pengumuman_id' => $pengumuman->id,
            'user_id' => Auth::user()->id,
            'role_id' => Auth::user()->role
        ]);

        return true;
    }
}

function pengumuman_icon_readed($pengumuman){
    $read = PengumumanReaded::where('pengumuman_id', $pengumuman->id)
                            ->where('user_id', Auth::user()->id)
                            ->where('role_id', Auth::user()->role)->count();
    
    if ($read > 0) {
        return 'light';
    } else{
        return 'success';
    }
}


function pengumuman_middleware(){
    $pengumumans = Pengumuman::where('kepada', 'LIKE', '%' . Auth::user()->role . '%')->orWhere('user_id', Auth::user()->id)->get()->sortByDesc('created_at');

    return $pengumumans;
}

function pengumuman_unreaded(){
    $pengumumans = Pengumuman::where('kepada', 'LIKE', '%' . Auth::user()->role . '%')->get();

    $readed = PengumumanReaded::where('user_id', Auth::user()->id)->where('role_id', Auth::user()->role)->get();
    $readed_id = [];
    foreach ($readed as $a) {
        $readed_id[]  = $a->pengumuman_id;
    }

    $pengumumans = $pengumumans->whereNotIn('id', $readed_id);

    return $pengumumans;
}



// Pengumuman API

function pengumuman_api_route($pengumuman){
    $prefix = check_role_url();
    return $url = $prefix . '/pengumuman/' . $pengumuman->id;
}


function check_role_url(){
    $role = Auth::user()->role;
    switch ($role) {
        case '1':
            $prefix = 'piket-kurikulum';
            break;
        case '2':
            $prefix = 'guru';
            break;
        case '3':
            $prefix = 'pembimbing-rayon';
            break;
        case '4':
            $prefix = 'orangtua';
            break;
        default:
            break;
    }

    return url( $prefix . '/');
}


function get_link_role()
{
    $role = Auth::user()->role ?? false;
    if ($role) {
        switch ($role) {
            case '1':
                $prefix = 'piket_kurikulum.';
                break;
            case '2':
                $prefix = 'guru.';
                break;
            case '3':
                $prefix = 'pembimbing_rayon.';
                break;
            case '4':
                $prefix = 'orangtua.';
                break;
            default:
                break;
        }
    
        return $prefix;
    }

}


function if_role(array $data, $op){
    $data_true = [];
    $data_false = [];
    for ($i=0; $i < count($data); $i++) { 
        Auth::user()->role == $data[$i] ? $data_true[] = true : $data_false[] = false;
    }

    if ($op == 'OR') {
        if (count($data_true) > 0) {
            return true;
        }
    } else{
        if (count($data_false) < 1) {
            return true;
        }
    }

    return false;
}


function forHuman($date){
    return \Carbon\Carbon::parse($date)->diffForHumans();
}

function short_rayon($rayon){
    $rayon = explode(' ', $rayon);
    $depan = substr($rayon[0], 0, 3);
    $akhir = end($rayon);
    return $depan . ' ' . $akhir;
}

function kelas_ke($kelas)
{
    $er = explode('-', $kelas);
    $kelas = end($er);
    return $kelas;
}