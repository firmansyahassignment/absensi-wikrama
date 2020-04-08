<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tentang', function(){
    return view('tentang');
})->name('tentang');

Auth::routes(['register' => false]);



Route::middleware('guru')->prefix('guru')->name('guru.')->group(function(){
    Route::get('', 'GuruController@beranda')->name('beranda');

    
    Route::prefix('absen')->name('absen.')->group(function() {
        Route::get('/', 'AbsenController@absen_daftar_rombel')->name('daftar_rombel');
        Route::get('/{rombel}', 'AbsenController@absen_rombel')->name('rombel');
        Route::post('/{rombel}', 'AbsenController@simpan_absen_rombel')->name('simpan_absen_rombel');
    });

    Route::name('laporan.')->group(function(){
        Route::get('/laporan-rombel', 'LaporanRombelController@laporan_daftar_rombel')->name('daftar_rombel');
        Route::get('/laporan-rombel/{rombel}', 'LaporanRombelController@laporan_rombel')->name('rombel');
        Route::get('/laporan-rombel/{rombel}/siswa-xl-download', 'LaporanRombelController@laporan_rombel_siswa_xl_download')->name('rombel_siswa_xl_download');
        Route::get('/laporan-rombel/{rombel}/siswa-pdf-download', 'LaporanRombelController@laporan_rombel_siswa_pdf_download')->name('rombel_siswa_pdf_download');

        Route::get('/laporan-siswa', 'LaporanSiswaController@laporan_daftar_siswa')->name('daftar_siswa');
        Route::get('/laporan-siswa/{siswa}', 'LaporanSiswaController@laporan_siswa')->name('siswa');
        Route::get('/laporan-siswa/{siswa}/siswa-xl-download', 'LaporanSiswaController@laporan_siswa_xl_download')->name('siswa_xl_download');
        Route::get('/laporan-siswa/{siswa}/siswa-pdf-download', 'LaporanSiswaController@laporan_siswa_pdf_download')->name('siswa_pdf_download');
    });

    Route::get('/pesan', 'GuruController@pesan')->name('pesan');
    Route::get('/pengumuman', 'PengumumanController@pengumuman')->name('pengumuman');
    Route::get('/pengumuman/{id}', 'PengumumanController@pengumuman_detail')->name('pengumuman.detail');

    Route::get('/pengaturan-akun', 'PengaturanAkunController@pengaturan_akun')->name('pengaturan_akun');
    Route::post('/pengaturan-akun', 'PengaturanAkunController@simpan_pengaturan_akun')->name('simpan_pengaturan_akun');
    Route::get('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@ubah_autentikasi')->name('ubah_autentikasi');
    Route::post('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@simpan_ubah_autentikasi')->name('simpan_ubah_autentikasi');

    Route::get('/laporkan-kesalahan', 'LaporkanKesalahanController@laporkan_kesalahan')->name('laporkan_kesalahan');
    Route::post('/laporkan-kesalahan', 'LaporkanKesalahanController@simpan_laporkan_kesalahan')->name('simpan_laporkan_kesalahan');

});


Route::middleware('piket_kurikulum')->prefix('piket-kurikulum')->name('piket_kurikulum.')->group(function(){

    Route::get('', 'PiketKurikulumController@beranda')->name('beranda');

    
    Route::prefix('absen')->name('absen.')->group(function() {
        Route::get('/', 'AbsenController@absen_daftar_rombel')->name('daftar_rombel');
        Route::get('/{rombel}', 'AbsenController@absen_rombel')->name('rombel');
        Route::post('/{rombel}', 'AbsenController@simpan_absen_rombel')->name('simpan_absen_rombel');
    });

    Route::name('laporan.')->group(function(){
        Route::get('/laporan-rombel', 'LaporanRombelController@laporan_daftar_rombel')->name('daftar_rombel');
        Route::get('/laporan-rombel/{rombel}', 'LaporanRombelController@laporan_rombel')->name('rombel');
        Route::get('/laporan-rombel/{rombel}/siswa-xl-download', 'LaporanRombelController@laporan_rombel_siswa_xl_download')->name('rombel_siswa_xl_download');
        Route::get('/laporan-rombel/{rombel}/siswa-pdf-download', 'LaporanRombelController@laporan_rombel_siswa_pdf_download')->name('rombel_siswa_pdf_download');

        Route::get('/laporan-siswa', 'LaporanSiswaController@laporan_daftar_siswa')->name('daftar_siswa');
        Route::get('/laporan-siswa/{siswa}', 'LaporanSiswaController@laporan_siswa')->name('siswa');
        Route::get('/laporan-siswa/{siswa}/siswa-xl-download', 'LaporanSiswaController@laporan_siswa_xl_download')->name('siswa_xl_download');
        Route::get('/laporan-siswa/{siswa}/siswa-pdf-download', 'LaporanSiswaController@laporan_siswa_pdf_download')->name('siswa_pdf_download');
    });

    Route::get('/pesan', 'PiketKurikulumController@pesan')->name('pesan');
    Route::get('/pengumuman', 'PengumumanController@pengumuman')->name('pengumuman');
    Route::get('/pengumuman/buat', 'PengumumanController@pengumuman_buat')->name('pengumuman.buat');
    Route::post('/pengumuman/buat', 'PengumumanController@pengumuman_simpan')->name('pengumuman.simpan');
    Route::get('/pengumuman/{id}', 'PengumumanController@pengumuman_detail')->name('pengumuman.detail');
    Route::delete('/pengumuman/{id}', 'PengumumanController@pengumuman_hapus')->name('pengumuman.hapus');


    Route::get('/pengaturan-akun', 'PengaturanAkunController@pengaturan_akun')->name('pengaturan_akun');
    Route::post('/pengaturan-akun', 'PengaturanAkunController@simpan_pengaturan_akun')->name('simpan_pengaturan_akun');
    Route::get('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@ubah_autentikasi')->name('ubah_autentikasi');
    Route::post('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@simpan_ubah_autentikasi')->name('simpan_ubah_autentikasi');

    Route::get('/laporkan-kesalahan', 'LaporkanKesalahanController@laporkan_kesalahan')->name('laporkan_kesalahan');
    Route::post('/laporkan-kesalahan', 'LaporkanKesalahanController@simpan_laporkan_kesalahan')->name('simpan_laporkan_kesalahan');


    Route::prefix('data')->name('data.')->group(function(){

        Route::prefix('rombel')->group(function(){
            Route::get('', 'DataRombelController@index')->name('rombel');
            Route::post('', 'DataRombelController@tambah')->name('rombel.tambah');
            Route::get('{id}', 'DataRombelController@detail')->name('rombel.detail');
            Route::post('{id}/ubah', 'DataRombelController@rombel_ubah')->name('rombel.ubah');
            Route::get('{id}/download-template', 'DataRombelController@download_template')->name('rombel.download_template');
            Route::get('{id}/download-xl-siswa', 'DataRombelController@download_xl_siswa')->name('rombel.download_xl_siswa');
            Route::get('{id}/download-pdf-siswa', 'DataRombelController@download_pdf_siswa')->name('rombel.download_pdf_siswa');
            Route::post('{id}/import-siswa', 'DataRombelController@import_siswa')->name('rombel.import_siswa');
        });

        Route::prefix('siswa')->name('siswa.')->group(function(){
            Route::get('', 'DataSiswaController@daftar_siswa')->name('daftar_siswa');
            Route::post('', 'DataSiswaController@simpan_siswa')->name('simpan_siswa');
            Route::get('tambah', 'DataSiswaController@tambah_siswa')->name('tambah_siswa');

            Route::get('download-template', 'DataSiswaController@download_template')->name('donwload_template');
            Route::post('unggah-data-siswa-xl', 'DataSiswaController@unggah_data_siswa_xl')->name('unggah_data_siswa');
            Route::get('download-xl-siswa', 'DataSiswaController@download_xl_siswa')->name('download_xl_siswa');
            Route::get('download-pdf-siswa', 'DataSiswaController@download_pdf_siswa')->name('download_pdf_siswa');

            Route::get('aktifkan-akun-orangtua', 'DataSiswaController@aktifkan_akun_orangtua')->name('aktifkan_akun_orangtua');
            Route::get('nonaktifkan-akun-orangtua', 'DataSiswaController@nonaktifkan_akun_orangtua')->name('nonaktifkan_akun_orangtua');
            
            Route::get('{siswa}', 'DataSiswaController@detail_siswa')->name('detail_siswa');
            Route::get('{siswa}/edit', 'DataSiswaController@edit_siswa')->name('edit_siswa');
            Route::put('{siswa}/update', 'DataSiswaController@update_siswa')->name('update_siswa');
            Route::get('{siswa}/download_pdf', 'DataSiswaController@download_pdf_siswa')->name('download_pdf_siswa');
            Route::delete('{siswa}', 'DataSiswaController@delete_siswa')->name('delete_siswa');

        });


        Route::prefix('pengguna')->name('pengguna.')->group(function(){
            Route::get('', 'DataPenggunaController@daftar_pengguna')->name('daftar_pengguna');

            Route::post('', 'DataPenggunaController@simpan_pengguna')->name('simpan_pengguna');
            Route::get('tambah', 'DataPenggunaController@tambah_pengguna')->name('tambah_pengguna');

            Route::get('/download-template-xl', 'DataPenggunaController@download_template_xl')->name('download_template_xl');
            Route::post('/unggah-data-xl', 'DataPenggunaController@unggah_data_xl')->name('unggah_data_xl');

            Route::get('{id}', 'DataPenggunaController@detail_pengguna')->name('detail_pengguna');
            Route::get('{id}/edit', 'DataPenggunaController@edit_pengguna')->name('edit_pengguna');
            Route::put('{id}/', 'DataPenggunaController@update_pengguna')->name('update_pengguna');
            Route::delete('{id}', 'DataPenggunaController@delete_pengguna')->name('delete_pengguna');
        });

        Route::prefix('rayon')->name('rayon.')->group(function(){
            Route::get('', 'DataRayonController@daftar_rayon')->name('daftar_rayon');

            Route::post('', 'DataRayonController@simpan_rayon')->name('simpan_rayon');
            Route::get('/tambah', 'DataRayonController@tambah_rayon')->name('tambah_rayon');

            Route::get('/{id}/edit', 'DataRayonController@edit_rayon')->name('edit_rayon');
            Route::put('/{id}', 'DataRayonController@update_rayon')->name('update_rayon');
            Route::get('/{id}', 'DataRayonController@detail_rayon')->name('detail_rayon');
            Route::delete('/{id}', 'DataRayonController@delete_rayon')->name('delete_rayon');
        });
        
        Route::prefix('jurusan')->name('jurusan.')->group(function(){
            Route::get('', 'DataJurusanController@daftar_jurusan')->name('daftar_jurusan');

            Route::post('', 'DataJurusanController@simpan_jurusan')->name('simpan_jurusan');
            Route::get('/tambah', 'DataJurusanController@tambah_jurusan')->name('tambah_jurusan');

            Route::get('/{id}/edit', 'DataJurusanController@edit_jurusan')->name('edit_jurusan');
            Route::put('/{id}', 'DataJurusanController@update_jurusan')->name('update_jurusan');
            Route::get('/{id}', 'DataJurusanController@detail_jurusan')->name('detail_jurusan');
            Route::delete('/{id}', 'DataJurusanController@delete_jurusan')->name('delete_jurusan');
        });

    });
    
    Route::prefix('siswa-dilaporkan')->name('siswa_dilaporkan.')->group(function(){
        Route::get('', 'LaporkanSiswaController@daftar_siswa_dilaporkan')->name('daftar_siswa_dilaporkan');
        Route::get('{id}', 'LaporkanSiswaController@detail_siswa_dilaporkan')->name('detail_siswa_dilaporkan');
    });

});


Route::middleware('pembimbing_rayon')->name('pembimbing_rayon.')->prefix('pembimbing-rayon')->group(function(){
    Route::get('', function(){
        return redirect()->route('pembimbing_rayon.beranda');
    });

    Route::get('beranda', 'PembimbingRayonController@beranda')->name('beranda');

    Route::prefix('siswa-dilaporkan')->name('siswa_dilaporkan.')->group(function(){
        Route::get('', 'LaporkanSiswaController@daftar_siswa_dilaporkan')->name('daftar_siswa_dilaporkan');
        Route::get('{id}', 'LaporkanSiswaController@detail_siswa_dilaporkan')->name('detail_siswa_dilaporkan');
    });

    Route::get('/pengumuman', 'PengumumanController@pengumuman')->name('pengumuman');
    Route::get('/pengumuman/{id}', 'PengumumanController@pengumuman_detail')->name('pengumuman.detail');

    Route::get('/pengaturan-akun', 'PengaturanAkunController@pengaturan_akun')->name('pengaturan_akun');
    Route::post('/pengaturan-akun', 'PengaturanAkunController@simpan_pengaturan_akun')->name('simpan_pengaturan_akun');
    Route::get('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@ubah_autentikasi')->name('ubah_autentikasi');
    Route::post('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@simpan_ubah_autentikasi')->name('simpan_ubah_autentikasi');

    Route::get('/laporkan-kesalahan', 'LaporkanKesalahanController@laporkan_kesalahan')->name('laporkan_kesalahan');
    Route::post('/laporkan-kesalahan', 'LaporkanKesalahanController@simpan_laporkan_kesalahan')->name('simpan_laporkan_kesalahan');

});

Route::middleware('orangtua')->name('orangtua.')->prefix('orangtua')->group(function(){
    Route::get('', function(){
        return redirect()->route('orangtua.beranda');
    });

    Route::get('/beranda', 'OrangtuaController@beranda')->name('beranda');

    Route::get('/pengumuman', 'PengumumanController@pengumuman')->name('pengumuman');
    Route::get('/pengumuman/{id}', 'PengumumanController@pengumuman_detail')->name('pengumuman.detail');

    Route::get('/pengaturan-akun', 'PengaturanAkunController@pengaturan_akun')->name('pengaturan_akun');
    Route::post('/pengaturan-akun', 'PengaturanAkunController@simpan_pengaturan_akun')->name('simpan_pengaturan_akun');
    Route::get('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@ubah_autentikasi')->name('ubah_autentikasi');
    Route::post('/pengaturan-akun/ubah-autentikasi', 'PengaturanAkunController@simpan_ubah_autentikasi')->name('simpan_ubah_autentikasi');

    Route::get('/laporkan-kesalahan', 'LaporkanKesalahanController@laporkan_kesalahan')->name('laporkan_kesalahan');
    Route::post('/laporkan-kesalahan', 'LaporkanKesalahanController@simpan_laporkan_kesalahan')->name('simpan_laporkan_kesalahan');
});


Route::middleware('auth')->prefix('api')->name('api.')->group(function(){
    
    Route::get('rincian-absensi-siswa/{id}', 'APIController@rincian_absensi_siswa')->name('rincian_absensi_siswa');

    Route::get('cari-siswa', 'APIController@cari_siswa')->name('cari_siswa');
    Route::get('cari-rombel', 'APIController@cari_rombel')->name('cari_rombel');
    Route::get('cari-rayon', 'APIController@cari_rayon')->name('cari_rayon');

    Route::get('pengumuman', 'PengumumanController@pengumuman_api')->name('pengumuman');
    Route::get('pengumuman-unreaded', 'PengumumanController@pengumuman_unreaded_api')->name('pengumuman_unreaded');
    Route::get('pengumuman-beep', 'PengumumanController@pengumuman_beep_api')->name('pengumuman_beep');

    Route::get('/laporkan-siswa' , 'LaporkanSiswaController@laporkan_siswa_api')->name('laporkan_siswa');
    Route::get('/data-absen-siswa' , 'LaporkanSiswaController@data_absen_siswa_api')->name('data_absen_siswa');
    Route::get('/absen-siswa' , 'LaporkanSiswaController@absen_siswa_api')->name('absen_siswa');

    Route::get('/rincian-absen-siswa', 'APIController@rincian_absen_siswa')->name('rincian_absen_siswa');
    Route::get('/pengumuman-dibaca-oleh', 'PengumumanController@pengumuman_dibaca_oleh_api')->name('pengumuman_dibaca_oleh');

});