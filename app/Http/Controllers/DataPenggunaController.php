<?php

namespace App\Http\Controllers;

use App\Exports\DownloadTemplatePengguna;
use App\Imports\UnggahPengguna;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DataPenggunaController extends Controller
{
    public function daftar_pengguna()
    {
        $q = request()->q;
        $users = User::where('nama', 'LIKE', '%'.$q.'%')
                        ->orWhere('phone', 'LIKE', '%'.$q.'%')
                        ->orWhere('email', 'LIKE', '%'.$q.'%')
                        ->get();
        return view('data.pengguna.daftar_pengguna', compact('users'));
    }

    public function simpan_pengguna(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => '',
            'email' => 'email|nullable',
            'phone' => 'string|nullable',
            'roles' => 'required|array'
        ]);

        $username = strtolower(str_replace(' ', '.', $request->nama)) . rand(10, 99);
        $password = Hash::make($username);

        $user = User::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $username,
            'password' => $password
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route(get_link_role().'data.pengguna.daftar_pengguna')->with('status', 'Berhasil menambahkan pengguna!');
    }

    public function download_template_xl()
    {
        return (new DownloadTemplatePengguna())->download('Template Unggah Pengguna.xlsx');
    }

    public function unggah_data_xl(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        
        $name = rand() . '.' . $file->getClientOriginalExtension();

        $file->move('import', $name);

        Excel::import(new UnggahPengguna(), public_path('/import/' . $name));

        $request->session()->flash('status', 'Berhasil Import Pengguna!');

        return redirect()->back();

    }

    public function detail_pengguna($pengguna)
    {
        $user = User::find($pengguna);

        return view('data.pengguna.detail_pengguna', compact('user'));
    }

    public function edit_pengguna($pengguna)
    {
        $user = User::find($pengguna);

        return view('data.pengguna.edit_pengguna', compact('user'));
    }

    public function update_pengguna($pengguna, Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $roles = $request->roles;

        $user = User::find($pengguna);

        $user->roles()->sync($roles);

        $user->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route(get_link_role().'data.pengguna.detail_pengguna', $user->id)->with('status', 'Berhasil Mengubah Data!');
    }

    public function tambah_pengguna()
    {
        return view('data.pengguna.tambah_pengguna');
    }
}
