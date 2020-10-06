<?php

namespace App\Http\Controllers;

use App\Cctv;
use App\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\CctvExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class CctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data_cctv=DB::table('cctv')
         ->join('locations','cctv.lokasi_id','=','locations.location_id')
         ->select('cctv.*','locations.location_name as location_name','locations.slug as slug')
         ->get();

        
        return view('Cctv/index',['data'=>$data_cctv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $datas=DB::table('locations')->get();

        $kondisi=Kondisi::all();
         return view('Cctv.create',['data'=>$datas,'kondisi'=>$kondisi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = Cctv::create($request->all());
        return redirect()->route('cctv_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function show(Cctv $cctv, $id)
    {
       
       
    //    return view('Cctv.update',['datas' => $datas,'data'=>$data_an]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function edit(Cctv $cctv, $id)
    {
        $datas= DB::table('cctv')
       ->join('locations','cctv.lokasi_id','=','locations.location_id')
       ->select('cctv.*','locations.location_name as location_name')
       ->where('cctv.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
       return view('Cctv.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cctv $cctv)
    {
        $this->_validation($request);
        $data = Cctv::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('cctv_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cctv $cctv, $id)
    {
        DB::table('Cctv')->where('id',$id)->delete();
        return redirect()->route('cctv_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'tipe'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'jenis_cam'=>'required'
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'tipe.required'=>'Tipe tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'jenis_cam'=>'Jenis kamera tidak boleh kosong'
        
        ]);
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('cctv')
         ->where('cctv.merek','like',"%".$cari."%")
         ->join('locations','cctv.lokasi_id','=','locations.location_id')
         ->select('cctv.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Cctv/index',['data' => $datas]);
 
    }
    public function export_excel()
	{
		return Excel::download(new CctvExport, 'Daftar-kamera cctv.xlsx');
    }
    public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('cctv')
         ->join('locations','cctv.lokasi_id','=','locations.location_id')
         ->select('cctv.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Cctv/cctv_pdf',['data'=>$data]);
         return $pdf->download('Daftar Cctv-pdf'); 
         //return $pdf->stream();
    }

}
