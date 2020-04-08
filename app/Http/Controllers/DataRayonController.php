<?php

namespace App\Http\Controllers;

use App\Rayon;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class DataRayonController extends Controller
{
    public function daftar_rayon()
    {
        $q = request()->q;
        $rayons = Rayon::where('rayon', 'LIKE', '%'.$q.'%')->get();
        return view('data.rayon.daftar_rayon', compact('rayons'));
    }

    public function detail_rayon($rayon)
    {
        $rayon = Rayon::findOrFail($rayon);
        return view('data.rayon.detail_rayon', compact('rayon'));
    }

    public function edit_rayon($rayon)
    {
        $rayon = Rayon::findOrFail($rayon);
        $all_users = User::all();
        
        $users = array();
        foreach ($all_users as $a) {
            if ($a->roles()->whereIn('role_id', ['1', '2', '3'])->count() > 0) {
                array_push($users, $a);
            }
        }

        return view('data.rayon.edit_rayon', compact('rayon', 'users'));
    }

    public function update_rayon($rayon, Request $request)
    {
        $rayon = Rayon::findOrFail($rayon);
        $request->validate([
        'rayon' => 'required|unique:rayons,rayon,' . $rayon->rayon . ',rayon',
            'pembimbing' => 'required'
        ]);

        $user = User::find($request->pembimbing);
        
        $user->roles()->sync('3');

        $rayon->update([
            'rayon' => $request->rayon,
            'short' => short_rayon($request->rayon),
            'pembimbing_id' => $request->pembimbing
        ]);

        return redirect()->route(get_link_role().'data.rayon.detail_rayon', $rayon->id)->with('status', 'Berhasil mengubah detail rayon');
    }

    public function tambah_rayon()
    {
        $all_users = User::all();
        
        $users = array();
        foreach ($all_users as $a) {
            if ($a->roles()->whereIn('role_id', ['1', '2', '3'])->count() > 0) {
                array_push($users, $a);
            }
        }

        return view('data.rayon.tambah_rayon', compact('users'));
    }

    public function simpan_rayon(Request $request)
    {
        $request->validate([
        'rayon' => 'required|unique:rayons,rayon',
            'pembimbing' => 'required'
        ]);

        $user = User::find($request->pembimbing);
        
        $user->roles()->sync('3');

        $rayon = Rayon::create([
            'rayon' => $request->rayon,
            'short' => short_rayon($request->rayon),
            'pembimbing_id' => $request->pembimbing
        ]);

        return redirect()->route(get_link_role().'data.rayon.daftar_rayon')->with('status', 'Berhasil menambahkan rayon');
    }
}
