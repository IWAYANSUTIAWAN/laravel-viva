<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kondisi;
use Illuminate\Support\Facades\DB;
use PDF;
//fungsi excel
use App\Exports\KondisiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KondisiController extends Controller
{
    
    public function index(){
        $data_kondisi=DB::table('conditions')->paginate(10);
        return view('Kondisi/index',['data'=>$data_kondisi]);
    }
    
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $kondisi = DB::table('conditions')
		->where('kondisi','like',"%".$cari."%")
		->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Kondisi/index',['data' => $kondisi]);
 
    }
    
    public function cetak_pdf()
    {
    	$kondisi = Kondisi::all();
 
    	$pdf = PDF::loadview('Kondisi.kondisi_pdf',['kondisi'=>$kondisi]);
         return $pdf->download('laporan-kondisi-pdf'); 
        // return $pdf->stream();
    }
    public function export_excel()
	{
		return Excel::download(new KondisiExport, 'laporan_kondisi.xlsx');
	}
    public function create(Request $request){
        $this->_validation($request);
        $data = Kondisi::create($request->all());
        return redirect()->route('Kondisi_index')->with('message','Data berhasil disimpan');
            
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'kondisi'=>'required|min:2',
        ],
        [
        'kondisi.required'=>'Kondisi tidak boleh kosong',
        'kondisi.min'=>'Minimal 2 karakter',
       ]);
    }

    public function delete($id){
        DB::table('conditions')->where('id',$id)->delete();
        return redirect()->route('Kondisi_index')->with('message','Data berhasil dihapus');
    }

    public function edit($id){
        $data=Kondisi::find($id);
        return view('kondisi.update',['data'=>$data]);
    }

    public function update(Request $request, Kondisi $kondisi)
    {
       // $this->_validation($request);
        $data = Kondisi::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('Kondisi_index')->with('message','Data berhasil diupdate');
    }
}
