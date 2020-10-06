<?php

namespace App\Http\Controllers;

use App\Lokasi;
use App\Kodelokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\LokasiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class LokasiController extends Controller
{
    public function index(){
        $data_lokasi=DB::table('locations')->paginate(10);
        return view('Lokasi/index',['data'=>$data_lokasi]);
    }

    public function add(){
        $datas=Kodelokasi::all();
        
        return view('Lokasi/create',['data'=>$datas]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $lokasi = DB::table('locations')
		->where('location_name','like',"%".$cari."%")
		->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Lokasi/index',['data' => $lokasi]);
 
    }

    public function cetak_pdf()
    {
    	$lokasi = Lokasi::all();
 
    	$pdf = PDF::loadview('Lokasi.lokasi_pdf',['lokasi'=>$lokasi]);
         return $pdf->download('laporan-lokasi-pdf'); 
         //return $pdf->stream();
    }

    public function export_excel()
	{
		return Excel::download(new LokasiExport, 'laporan_lokasi.xlsx');
    }
    
    public function create(Request $request){
        $this->_validation($request);
         $kode=$request->kode;
         $lokasi_id=$request->location_id;
         $hasil=$kode.'-'.$lokasi_id;
        $data = Lokasi::create([
        'location_id'=>$hasil,
        'location_name'=>$request->location_name,
        'alamat'=>$request->alamat,
        'slug'=>Str::slug($request->location_name),
        ]);
        return redirect()->route('Lokasi_index')->with('message','Data berhasil disimpan');
           // dd($request->all());
        //    dd($hasil);
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'location_id'=>'required|max:10|min:2',
        'location_name'=>'required|min:3',
        'alamat'=>'required'
        ],
        [
        'location_id.required'=>'Lokasi id tidak boleh kosong',
        'location_id.min'=>'Minimal 2 karakter',
        'location_name.required'=>'Nama lokasi tidak boleh kosong',
        'location_name.min'=>'Minimal 3 karakter',
        'alamat.required'=>'Alamat tidak boleh kosong',
        ]);
    }

    public function delete($id){
    
       DB::table('locations')->where('id',$id)->delete();
       return redirect()->route('Lokasi_index')->with('message','Data berhasil dihapus');
    }

    public function edit($id)
    {
       $datas = Lokasi::findOrFail($id);
       return view('Lokasi.update',['datas' => $datas]);
    }
    public function update(Request $request)
    {
        $this->_validation($request);
        $data = Lokasi::findOrFail($request->id);
        // $data->update($request->all());
        $data->update([
            'location_id'=>$request->location_id,
            'location_name'=>$request->location_name,
            'alamat'=>$request->alamat,
            'slug'=>Str::slug($request->location_name),
            
        ]);
        return redirect()->route('Lokasi_index')->with('message','Data berhasil diupdate');
    }
}
