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
});

//route keluar user
Route::get('keluar', function(){
    \Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', function(){
    return redirect ('dashboard-beranda');
});

//router create admin
Route::get('create-admin', function(){
    \DB::table('users')->insert([
        'role'=>1,
        'name'=>'admin',
        'email'=>'admin@web.com',
        'password'=>bcrypt('admin123')
    ]);
});

//router create guru
Route::get('create-guru', function(){
    \DB::table('users')->insert([
        'role'=>2,
        'name'=>'ahmad',
        'email'=>'ahmad@web.com',
        'password'=>bcrypt('ahmad123')
    ]);
});


//route khusus login
Route::group(['middleware'=>'auth'], function()
{
//route dashboard
Route::get('dashboard-beranda','Dashboard\Dashboard_controller@index');
//route siswa
Route::get('siswa','Dashboard\Siswa_controller@index');
Route::get('siswa/add','Dashboard\Siswa_controller@add');

Route::post('siswa/add/','Dashboard\Siswa_controller@store');
Route::get('siswa/show','Dashboard\Siswa_controller@show');

Route::get('siswa/hapus/{id}','Dashboard\Siswa_controller@delete');
Route::get('siswa/edit/{id}','Dashboard\Siswa_controller@edit');

Route::get('siswa/{id}/aktif','Dashboard\Siswa_controller@lulus');
Route::get('siswa/aktif','Dashboard\Siswa_controller@aktif');
Route::get('siswa/belum-aktif','Dashboard\Siswa_controller@belum_aktif');
Route::put('siswa/update/{id}','Dashboard\Siswa_controller@update');

Route::get('siswa/detail/{id}','Dashboard\Siswa_controller@detail');
Route::get('siswa/export','Dashboard\Siswa_controller@export');

//route input nilai
Route::get('nilai/input/{id}','Dashboard\Nilai_controller@nilai');
Route::get('nilai/detail/{id}','Dashboard\Nilai_controller@detail');
Route::post('nilai/add/{id}','Dashboard\Nilai_controller@store');

Route::get('nilai/edit/{id}','Dashboard\Nilai_controller@edit');
Route::get('nilai/hapus/{id}','Dashboard\Nilai_controller@delete');

Route::get('cetak-nilai/{id}','Dashboard\Nilai_controller@cetak');
Route::put('nilai/update/{id}','Dashboard\Nilai_controller@update');
Route::get('ex-nilai/{id}','Dashboard\Nilai_controller@export');

Route::get('download-nilai/{id}','Dashboard\Nilai_controller@ex_export');

//route guru
Route::get('beranda','Dashboard\Guru_controller@index');
Route::get('guru/add','Dashboard\Guru_controller@add');
Route::post('guru/add','Dashboard\Guru_controller@store');

Route::get('guru/show','Dashboard\Guru_controller@show');
Route::get('guru/verifikasi','Dashboard\Guru_controller@verifikasi');

Route::get('guru/belum-verifikasi','Dashboard\Guru_controller@belum_verifikasi');
Route::get('guru/{id}/aktif', 'Dashboard\Guru_controller@lulus');

Route::get('guru/hapus/{id}','Dashboard\Guru_controller@delete');
Route::get('guru/edit/{id}','Dashboard\Guru_controller@edit');
Route::put('guru/{id}','Dashboard\Guru_controller@update');

Route::get('guru/export','Dashboard\Guru_controller@export');

//route biodata
Route::get('biodata','Dashboard\Biodata_controller@index');
Route::post('biodata/{user_id}','Dashboard\Biodata_controller@store');
Route::put('biodata/{user_id}','Dashboard\Biodata_controller@update');

//route matpel
Route::get('matpel/add','Dashboard\Matpel_controller@index');
Route::post('matpel/p/','Dashboard\Matpel_controller@store');
Route::get('matpel/show','Dashboard\Matpel_controller@show');

Route::get('matpel/guru/{id}','Dashboard\Matpel_controller@guru');
//Route::post('matpel/p/guru/{id}','Dashboard\Matpel_controller@g_store');
Route::get('matpel/hapus/{id}','Dashboard\Matpel_controller@delete');

Route::get('matpel/export','Dashboard\Matpel_controller@export');

//route set jadwal
Route::get('set-matpel/add','Dashboard\Matpel_controller@set_matpel');
Route::get('set-matpel/show','Dashboard\Matpel_controller@show_matpel');
Route::post('set-matpel/add','Dashboard\Matpel_controller@set_store');

Route::get('set-matpel/detail/{id}','Dashboard\Matpel_controller@detail_matpel');
Route::get('set-matpel/hapus/{id}','Dashboard\Matpel_controller@set_delete');

//route kelas
Route::get('kelas/add','Dashboard\Kelas_controller@add');
Route::post('kelas/add','Dashboard\Kelas_controller@store');

Route::get('kelas/show','Dashboard\Kelas_controller@show');
Route::get('kelas/edit/{id}','Dashboard\Kelas_controller@edit');
Route::get('kelas/detail/{id}','Dashboard\Kelas_controller@detail');
Route::post('kelas/add-siswa/{id}','Dashboard\Kelas_controller@add_siswa');

Route::get('kelas/siswa/hapus/{id}','Dashboard\Kelas_controller@delete_siswa');

Route::put('kelas/update/{id}','Dashboard\Kelas_controller@update');
Route::get('kelas/hapus/{id}','Dashboard\Kelas_controller@delete');
Route::get('hari','Dashboard\Kelas_controller@hari');
Route::post('hari/add','Dashboard\Kelas_controller@h_store');

});