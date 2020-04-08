<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use App\PengumumanReaded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function pengumuman()
    {
        
        $pengumumans = Pengumuman::where('kepada', 'LIKE', '%' . Auth::user()->role . '%')->orWhere('user_id', Auth::user()->id)->get()->sortBy('created_at');

        return view('pengumuman.pengumuman', compact('pengumumans'));
    }

    public function pengumuman_detail($id)
    {

        $pengumuman = Pengumuman::findOrFail($id);

        pengumuman_readed($pengumuman);

        return view('pengumuman.pengumuman_detail', compact('pengumuman'));
    }

    public function pengumuman_api()
    {   
        $obj_pengumuman = pengumuman_middleware()->sortByDesc('created_at');

        $pengumumans = [];
        foreach ($obj_pengumuman as $a) {
            $pengumumans[] = [
                'subject' => $a->subject,
                'preview' => Str::limit($a->pengumuman, 100),
                'icon' => pengumuman_icon_readed($a),
                'route' => pengumuman_api_route($a),
                'user' => $a->user->nama,
                'created_at' => format_manusia($a->created_at)
            ];
        }

        return $pengumumans;
    }

    public function pengumuman_unreaded_api()
    {
        $obj_pengumuman_unread = pengumuman_unreaded()->sortBy('created_at');
        
        $pengumuman_unreaded = [];

        foreach ($obj_pengumuman_unread as $a) {
            $pengumuman_unreaded[] = [
                'subject' => $a->subject,
                'preview' => Str::limit($a->pengumuman, 100),
                'icon' => pengumuman_icon_readed($a),
                'route' => pengumuman_api_route($a),
                'user' => $a->user->nama,
                'created_at' => format_manusia($a->created_at)
            ];
        }

        return $pengumuman_unreaded;
    }

    public function pengumuman_beep_api()
    {
        $ttl_pengumuman_unread = pengumuman_unreaded()->count();
        if ($ttl_pengumuman_unread > 0) {
            return ['beep' => true];
        }

        return ['beep' => false];
    }

    public function pengumuman_dibaca_oleh_api(Request $request)
    {
        $pengumuman = Pengumuman::findOrFail($request->pengumuman_id);
        $readedBy = $pengumuman->pengumuman_readed->where('user_id', '!=', Auth::user()->id)->where('user_id', '!=', $pengumuman->user_id)->sortBy('created_at');

        $data = [];
        foreach($readedBy as $a){
            $data[] = [
                'nama' => $a->user->nama,
                'pada' => forHuman($a->created_at),
                'sebagai' => $a->role->role
            ];
        }

        return response()->json($data, 200);
    }

    public function pengumuman_hapus($pengumuman)
    {
        PengumumanReaded::where('pengumuman_id', $pengumuman)->delete();
        Pengumuman::where('id', $pengumuman)->delete();
        
        return redirect()->route(get_link_role().'pengumuman')->with('status', 'Berhasil Menghapus Pengumuman!');
    }

    public function pengumuman_buat()
    {
        return view('pengumuman.buat_pengumuman');
    }

    public function pengumuman_simpan(Request $request)
    {
        $request->validate([
            'pengumuman' => 'required',
            'subject' => 'required'
        ]);

        $kepada = '';
        for ($i=0; $i < count($request->dikirim_ke); $i++) { 
            $kepada .= $request->dikirim_ke[$i] . ', ';
        }
        $kepada = trim($kepada, ', ');

        $pengumuman = Pengumuman::create([
            'kepada' => $kepada,
            'pengumuman' => $request->pengumuman,
            'subject' => $request->subject,
            'user_id' => Auth::user()->id,
        ]);

        pengumuman_readed($pengumuman);

        return redirect()->route(get_link_role().'pengumuman.detail', $pengumuman->id)->with('status', 'Berhasil menambahkan pengumuman!');
    }
}
