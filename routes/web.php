<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return view('welcome');
});
// Route::post('/','otentikasi\OtentikasiController@login')->name('login');
// Route::get('/','otentikasi\OtentikasiController@index')->name('login');
Auth::routes();

Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::post('/','Auth\LoginController@login')->name('login');


//Route::group(['middleware' => 'CekLoginMiddleware'], function () { //--> ini memakai midleware sendiri
    Route::group(['middleware' => 'auth'], function () { //->midleware bawaan laravel
    Route::get('/dashboard', function () {return view('index');});

    // Route::get('Dashboard','DashboardController@index')->name('dasboard');

    Route::get('crud','CrudController@index')->name('crud');
    Route::get('crud/tambah','CrudController@tambah')->name('crud.tambah');
    Route::post('crud','CrudController@simpan')->name('crud.simpan');
    Route::delete('crud/{id}','CrudController@delete')->name('crud.hapus');
    Route::get('crud/{id}/edit','CrudController@edit')->name('crud.edit');
    Route::patch('crud/{id}','CrudController@update')->name('crud.update');    
    Route::get('logout','otentikasi\OtentikasiController@logout')->name('logout');

    Route::get('/region','RegionController@index')->name('Region_index');
    Route::get('region/tambah','RegionController@add')->name('Region_tambah');
    Route::post('/region','RegionController@create')->name('region.create');
    Route::delete('region/{id}','RegionController@delete')->name('Region_delete');
    Route::get('region/{id}/edit','RegionController@edit')->name('region.edit');
    Route::patch('region/{id}','RegionController@update')->name('region.update');    
    
    Route::get('/lokasi','LokasiController@index')->name('Lokasi_index');
    Route::get('/lokasi/tambah','LokasiController@add')->name('Lokasi_tambah');
    Route::post('/lokasi','LokasiController@create')->name('lokasi.create');
    Route::delete('lokasi/{id}','LokasiController@delete')->name('lokasi_delete');
    Route::get('lokasi/{id}/edit','LokasiController@edit')->name('lokasi.edit');
    Route::patch('lokasi/{id}','LokasiController@update')->name('lokasi.update');  
    Route::get('/lokasi/cetak_pdf', 'LokasiController@cetak_pdf')->name('lokasi.cetakpdf');
    Route::get('/lokasi/export_excel', 'LokasiController@export_excel')->name('lokasi.cetakexcel');
    Route::get('/lokasi/cari/','LokasiController@cari')->name('lokasi.cari');

    Route::get('/kondisi','KondisiController@index')->name('Kondisi_index');
    Route::post('/kondisi','KondisiController@create')->name('kondisi.create');
    Route::delete('kondisi/{id}','KondisiController@delete')->name('Kondisi_delete');
    Route::get('kondisi/{id}/edit','KondisiController@edit')->name('Kondisi.edit');
    Route::patch('kondisi/{id}','KondisiController@update')->name('Kondisi.update');  
    Route::get('/kondisi/cetak_pdf', 'KondisiController@cetak_pdf')->name('kondisi.cetakpdf'); 
    Route::get('/kondisi/export_excel', 'KondisiController@export_excel')->name('kondisi.cetakexcel');
    Route::get('/kondisi/cari/','KondisiController@cari')->name('kondisi.cari');

    Route::get('/teamviewer','TeamviewerController@index')->name('tv_index');
    Route::get('/teamviewer/create','TeamviewerController@create')->name('tv_create');
    Route::post('/teamviewer/store','TeamviewerController@store')->name('tv_store');
    Route::delete('teamviewer/{id}','TeamviewerController@destroy')->name('tv_delete');
    Route::get('teamviewer/{id}/edit','TeamviewerController@edit')->name('tv_edit');
    Route::patch('teamviewer/{id}','TeamviewerController@update')->name('tv_update');
    Route::get('/teamviewer/cari/','TeamviewerController@cari')->name('tv_cari');
    Route::get('/teamviewer/index_cari/','TeamviewerController@index_cari')->name('tv_index_cari');
    Route::get('/teamviewer/cetak_pdf', 'TeamviewerController@cetak_pdf')->name('tv_cetakpdf'); 
    Route::get('/teamviewer/export_excel', 'TeamviewerController@export_excel')->name('tv_cetakexcel');

    Route::get('/anydesk','AnydeskController@index')->name('anydesk_index');
    Route::get('/anydesk/create','AnydeskController@create')->name('anydesk_create');
    Route::post('/anydesk/store','AnydeskController@store')->name('anydesk_store');
    Route::get('/anydesk/cari/','AnydeskController@cari')->name('anydesk_cari');
    Route::delete('anydesk/{id}','AnydeskController@destroy')->name('anydesk_delete');
    Route::get('anydesk/{id}/edit','AnydeskController@edit')->name('anydesk_edit');
    Route::patch('anydesk/{id}','AnydeskController@update')->name('anydesk_update');
    Route::get('/anydesk/cetak_pdf', 'AnydeskController@cetak_pdf')->name('anydesk_cetakpdf');
    Route::get('/anydesk/export_excel', 'AnydeskController@export_excel')->name('anydesk_cetakexcel');
    Route::get('/anydesk/index_cari/','AnydeskController@index_cari')->name('anydesk_index_cari');

    Route::get('/cctv','CctvController@index')->name('cctv_index');
    Route::get('/cctv/create','CctvController@create')->name('cctv_create');
    Route::post('/cctv/store','CctvController@store')->name('cctv_store');
    Route::delete('/cctv/{id}','CctvController@destroy')->name('cctv_delete');
    Route::get('cctv/{id}/edit','CctvController@edit')->name('cctv_edit');
    Route::patch('cctv/{id}','CctvController@update')->name('cctv_update');
    Route::get('cctv/{id}/detail','CctvController@show')->name('cctv_detail');
    Route::get('/cctv/index_cari/','CctvController@index_cari')->name('cctv_index_cari');
    Route::get('/cctv/export_excel', 'CctvController@export_excel')->name('cctv_cetakexcel');
    Route::get('/cctv/cetak_pdf', 'CctvController@cetak_pdf')->name('cctv_cetakpdf');

    Route::get('/dvr','DvrController@index')->name('dvr_index');
    Route::get('/dvr/create','DvrController@create')->name('dvr_create');
    Route::post('/dvr/store','DvrController@store')->name('dvr_store');
    Route::get('dvr/{id}/edit','DvrController@edit')->name('dvr_edit');
    Route::patch('dvr/{id}','DvrController@update')->name('dvr_update');
    Route::delete('/dvr/{id}','DvrController@destroy')->name('dvr_delete');
    Route::get('/dvr/index_cari/','DvrController@index_cari')->name('dvr_index_cari');
    Route::get('/dvr/export_excel', 'DvrController@export_excel')->name('dvr_cetakexcel');
    Route::get('/dvr/cetak_pdf', 'DvrController@cetak_pdf')->name('dvr_cetakpdf');

    Route::get('cpu','CpuController@index')->name('cpu_index');
    Route::get('/cpu/create','CpuController@create')->name('cpu_create');
    Route::post('/cpu/store','CpuController@store')->name('cpu_store');
    Route::get('cpu/{id}/edit','CpuController@edit')->name('cpu_edit');
    Route::patch('cpu/{id}','CpuController@update')->name('cpu_update');
    Route::delete('/cpu/{id}','CpuController@destroy')->name('cpu_delete');
    Route::get('/cpu/index_cari/','CpuController@index_cari')->name('cpu_index_cari');
    Route::get('/cpu/export_excel', 'CpuController@export_excel')->name('cpu_cetakexcel');
    Route::get('/cpu/cetak_pdf', 'CpuController@cetak_pdf')->name('cpu_cetakpdf');

    Route::get('monitor','MonitorController@index')->name('monitor_index');
    Route::get('/monitor/create','MonitorController@create')->name('monitor_create');
    Route::post('/monitor/store','MonitorController@store')->name('monitor_store');
    Route::get('monitor/{id}/edit','MonitorController@edit')->name('monitor_edit');
    Route::patch('monitor/{id}','MonitorController@update')->name('monitor_update');
    Route::delete('/monitor/{id}','MonitorController@destroy')->name('monitor_delete');
    Route::get('/monitor/index_cari/','MonitorController@index_cari')->name('monitor_index_cari');
    Route::get('/monitor/export_excel', 'MonitorController@export_excel')->name('monitor_cetakexcel');
    Route::get('/monitor/cetak_pdf', 'MonitorController@cetak_pdf')->name('monitor_cetakpdf');
    
    Route::get('mouse','MouseController@index')->name('mouse_index');
    Route::get('/mouse/create','MouseController@create')->name('mouse_create');
    Route::post('/mouse/store','MouseController@store')->name('mouse_store');
    Route::get('mouser/{id}/edit','MouseController@edit')->name('mouse_edit');
    Route::patch('mouse/{id}','MouseController@update')->name('mouse_update');
    Route::delete('/mouse/{id}','MouseController@destroy')->name('mouse_delete');
    Route::get('/mouse/index_cari/','MouseController@index_cari')->name('mouse_index_cari');
    Route::get('/mouse/export_excel', 'MouseController@export_excel')->name('mouse_cetakexcel');
    Route::get('/mouse/cetak_pdf', 'MouseController@cetak_pdf')->name('mouse_cetakpdf');

    Route::get('keyboard','KeyboardController@index')->name('keyboard_index');
    Route::get('/keyboard/create','KeyboardController@create')->name('keyboard_create');
    Route::post('/keyboard/store','KeyboardController@store')->name('keyboard_store');
    Route::get('keyboard/{id}/edit','KeyboardController@edit')->name('keyboard_edit');
    Route::patch('keyboard/{id}','KeyboardController@update')->name('keyboard_update');
    Route::delete('/keyboard/{id}','KeyboardController@destroy')->name('keyboard_delete');
    Route::get('/keyboard/index_cari/','KeyboardController@index_cari')->name('keyboard_index_cari');
    Route::get('/keyboard/export_excel', 'KeyboardController@export_excel')->name('keyboard_cetakexcel');
    Route::get('/keyboard/cetak_pdf', 'KeyboardController@cetak_pdf')->name('keyboard_cetakpdf');

    Route::get('scaner','ScanerController@index')->name('scaner_index');
    Route::get('/scaner/create','ScanerController@create')->name('scaner_create');
    Route::post('/scaner/store','ScanerController@store')->name('scaner_store');
    Route::get('scaner/{id}/edit','ScanerController@edit')->name('scaner_edit');
    Route::patch('scaner/{id}','ScanerController@update')->name('scaner_update');
    Route::delete('/scaner/{id}','ScanerController@destroy')->name('scaner_delete');
    Route::get('/scaner/index_cari/','ScanerController@index_cari')->name('scaner_index_cari');
    Route::get('/scaner/export_excel', 'ScanerController@export_excel')->name('scaner_cetakexcel');
    Route::get('/scaner/cetak_pdf', 'ScanerController@cetak_pdf')->name('scaner_cetakpdf');

    Route::get('finger','FingerController@index')->name('finger_index');
    Route::get('/finger/create','FingerController@create')->name('finger_create');
    Route::post('/finger/store','FingerController@store')->name('finger_store');
    Route::get('finger/{id}/edit','FingerController@edit')->name('finger_edit');
    Route::patch('finger/{id}','FingerController@update')->name('finger_update');
    Route::delete('/finger/{id}','FingerController@destroy')->name('finger_delete');
    Route::get('/finger/index_cari/','FingerController@index_cari')->name('finger_index_cari');
    Route::get('/finger/export_excel', 'FingerController@export_excel')->name('finger_cetakexcel');
    Route::get('/finger/cetak_pdf', 'FingerController@cetak_pdf')->name('finger_cetakpdf');

    Route::get('printer','PrinterController@index')->name('printer_index');
    Route::get('/printer/create','PrinterController@create')->name('printer_create');
    Route::post('/printer/store','PrinterController@store')->name('printer_store');
    Route::get('printer/{id}/edit','PrinterController@edit')->name('printer_edit');
    Route::patch('printer/{id}','PrinterController@update')->name('printer_update');
    Route::delete('/printer/{id}','PrinterController@destroy')->name('printer_delete');
    Route::get('/printer/index_cari/','PrinterController@index_cari')->name('printer_index_cari');
    Route::get('/printer/export_excel', 'PrinterController@export_excel')->name('printer_cetakexcel');
    Route::get('/printer/cetak_pdf', 'PrinterController@cetak_pdf')->name('printer_cetakpdf');

    Route::get('modem','ModemController@index')->name('modem_index');
    Route::get('/modem/create','ModemController@create')->name('modem_create');
    Route::post('/modem/store','ModemController@store')->name('modem_store');
    Route::get('modem/{id}/edit','ModemController@edit')->name('modem_edit');
    Route::patch('modem/{id}','ModemController@update')->name('modem_update');
    Route::delete('/modem/{id}','ModemController@destroy')->name('modem_delete');
    Route::get('/modem/index_cari/','ModemController@index_cari')->name('modem_index_cari');
    Route::get('/modem/export_excel', 'ModemController@export_excel')->name('modem_cetakexcel');
    Route::get('/modem/cetak_pdf', 'ModemController@cetak_pdf')->name('modem_cetakpdf');

    Route::get('webcame','WebcameController@index')->name('webcame_index');
    Route::get('/webcame/create','WebcameController@create')->name('webcame_create');
    Route::post('/webcame/store','WebcameController@store')->name('webcame_store');
    Route::get('webcame/{id}/edit','WebcameController@edit')->name('webcame_edit');
    Route::patch('webcame/{id}','WebcameController@update')->name('webcame_update');
    Route::delete('/webcame/{id}','WebcameController@destroy')->name('webcame_delete');
    Route::get('/webcame/index_cari/','WebcameController@index_cari')->name('webcame_index_cari');
    Route::get('/webcame/export_excel', 'WebcameController@export_excel')->name('webcame_cetakexcel');
    Route::get('/webcame/cetak_pdf', 'WebcameController@cetak_pdf')->name('webcame_cetakpdf');

    Route::get('isp','IspController@index')->name('isp_index');
    Route::get('/isp/create','IspController@create')->name('isp_create');
    Route::post('/isp/store','IspController@store')->name('isp_store');
    Route::get('isp/{id}/edit','IspController@edit')->name('isp_edit');
    Route::patch('isp/{id}','IspController@update')->name('isp_update');
    Route::delete('/isp/{id}','IspController@destroy')->name('isp_delete');
    Route::get('/isp/index_cari/','IspController@index_cari')->name('isp_index_cari');
    Route::get('/isp/export_excel', 'IspController@export_excel')->name('isp_cetakexcel');
    Route::get('/isp/cetak_pdf', 'IspController@cetak_pdf')->name('isp_cetakpdf');

    Route::get('switch','SwitchHController@index')->name('switch_index');
    Route::get('/switch/create','SwitchHController@create')->name('switch_create');
    Route::post('/switch/store','SwitchHController@store')->name('switch_store');
    Route::get('switch/{id}/edit','SwitchHController@edit')->name('switch_edit');
    Route::patch('switch/{id}','SwitchHController@update')->name('switch_update');
    Route::delete('/switch/{id}','SwitchHController@destroy')->name('switch_delete');
    Route::get('/switch/index_cari/','SwitchHController@index_cari')->name('switch_index_cari');
    Route::get('/switch/export_excel', 'SwitchHController@export_excel')->name('switch_cetakexcel');
    Route::get('/switch/cetak_pdf', 'SwitchHController@cetak_pdf')->name('switch_cetakpdf');

    Route::get('telpon','TelponController@index')->name('telpon_index');
    Route::get('/telpon/create','TelponController@create')->name('telpon_create');
    Route::post('/telpon/store','TelponController@store')->name('telpon_store');
    Route::get('telpon/{id}/edit','TelponController@edit')->name('telpon_edit');
    Route::patch('telpon/{id}','TelponController@update')->name('telpon_update');
    Route::delete('/telpon/{id}','TelponController@destroy')->name('telpon_delete');
    Route::get('/telpon/index_cari/','TelponController@index_cari')->name('telpon_index_cari');
    Route::get('/telpon/export_excel', 'TelponController@export_excel')->name('telpon_cetakexcel');
    Route::get('/telpon/cetak_pdf', 'TelponController@cetak_pdf')->name('telpon_cetakpdf');

    Route::get('ups','UpsController@index')->name('ups_index');
    Route::get('/ups/create','UpsController@create')->name('ups_create');
    Route::post('/ups/store','UpsController@store')->name('ups_store');
    Route::get('ups/{id}/edit','UpsController@edit')->name('ups_edit');
    Route::patch('ups/{id}','UpsController@update')->name('ups_update');
    Route::delete('/ups/{id}','UpsController@destroy')->name('ups_delete');
    Route::get('/ups/index_cari/','UpsController@index_cari')->name('ups_index_cari');
    Route::get('/ups/export_excel', 'UpsController@export_excel')->name('ups_cetakexcel');
    Route::get('/ups/cetak_pdf', 'UpsController@cetak_pdf')->name('ups_cetakpdf');

    Route::get('email','EmailController@index')->name('email_index');
    Route::get('/email/create','EmailController@create')->name('email_create');
    Route::post('/email/store','EmailController@store')->name('email_store');
    Route::get('email/{id}/edit','EmailController@edit')->name('email_edit');
    Route::patch('email/{id}','EmailController@update')->name('email_update');
    Route::delete('/email/{id}','EmailController@destroy')->name('email_delete');
    Route::get('/email/index_cari/','EmailController@index_cari')->name('email_index_cari');
    Route::get('/email/export_excel', 'EmailController@export_excel')->name('email_cetakexcel');
    Route::get('/email/cetak_pdf', 'EmailController@cetak_pdf')->name('email_cetakpdf');

    Route::get('kodelokasi','KodelokasiController@index')->name('kodelokasi_index');
    Route::get('/kodelokasi/create','KodelokasiController@create')->name('kodelokasi_create');
    Route::post('/kodelokasi/store','KodelokasiController@store')->name('kodelokasi_store');
    Route::get('kodelokasi/{id}/edit','KodelokasiController@edit')->name('kodelokasi_edit');
    Route::patch('kodelokasi/{id}','KodelokasiController@update')->name('kodelokasi_update');
    Route::delete('/kodelokasi/{id}','KodelokasiController@destroy')->name('kodelokasi_delete');

    Route::get('laptop','LaptopController@index')->name('laptop_index');
    Route::get('/laptop/create','LaptopController@create')->name('laptop_create');
    Route::post('/laptop/store','LaptopController@store')->name('laptop_store');
    Route::get('laptop/{id}/edit','LaptopController@edit')->name('laptop_edit');
    Route::patch('laptop/{id}','LaptopController@update')->name('laptop_update');
    Route::delete('/laptop/{id}','LaptopController@destroy')->name('laptop_delete');
    Route::get('/laptop/export_excel', 'LaptopController@export_excel')->name('laptop_cetakexcel');
    Route::get('/laptop/cetak_pdf', 'LaptopController@cetak_pdf')->name('laptop_cetakpdf');

    Route::get('transaksi','TransaksiController@index')->name('transaksi_index');
    Route::get('transaksi/create','TransaksiController@create')->name('transaksi_create');
    Route::post('transaksi/create','TransaksiController@create')->name('transaksi_create');
    Route::post('transaksi/store','TransaksiController@store')->name('transaksi_store');
    Route::delete('transaksi/{id}','TransaksiController@destroy')->name('transaksi_delete');
});



Route::get('/home', 'HomeController@index')->name('home');
