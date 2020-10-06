<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CrudController extends Controller
{
    public function index(){
        $data_barang=DB::table('data-barang')->paginate(3);
        return view('crud',['data_barang'=>$data_barang]);
    }

    //menampilkan form tambah data
    public function tambah(){
       return view('crudtambah');
    }

    //simpan data
    public function simpan(Request $request){
        
        $this->_validation($request); //-> ini function untuk validasi
       DB::table('data-barang')->insert([
        'kode_barang'=>$request->kode_barang,
        'nama_barang'=>$request->nama_barang
       ]);       
        
       return redirect()->route('crud')->with('message','Data berhasil disimpan');
         
    }

    //function untuk validasi yang dipakai saat save dan update
    private function _validation(Request $request){
            $validation=$request->validate([
            'kode_barang'=>'required|max:10|min:3',
            'nama_barang'=>'required|min:3'],
            [
            'kode_barang.required'=>'Harus diisi',
            'kode_barang.min'=>'Minimal 3 karakter',
            'nama_barang.required'=>'Harus diisi',
            'nama_barang.min'=>'Minimal 3 karakter',

            ]);
    }

    //Menghapus data
    public function delete($id){
    
       DB::table('data-barang')->where('id',$id)->delete();
      
     return redirect()->route('crud')->with('message','Data berhasil dihapus');
    }

    //menampilkan form edit data
    public function edit($id){
       $data_barang= DB::table('data-barang')->where('id',$id)->first();
       return view('crudedit',['data_barang'=>$data_barang]);

    }

    // melakukan Update data
    public function update(Request $request, $id){
        $this->_validation($request);
        DB::table('data-barang')->where('id',$id)->update([
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang
        ]);

        return redirect()->route('crud')->with('message','Data Berhasil di Update');
    }
}
