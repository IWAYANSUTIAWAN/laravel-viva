<?php

namespace App\Http\Controllers;

use App\Dvr;
use App\Kondisi;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\DvrExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class DvrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_cctv=DB::table('dvr')
         ->join('locations','dvr.lokasi_id','=','locations.location_id')
         ->select('dvr.*','locations.location_name as location_name','locations.slug as slug')
         ->get();

        
        return view('Dvr/index',['data'=>$data_cctv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $datas=DB::table('locations')
          ->get();

        $kondisi=Kondisi::all();
        $region=Region::all();
         return view('Dvr.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Dvr::create($request->all());
        return redirect()->route('dvr_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dvr  $dvr
     * @return \Illuminate\Http\Response
     */
    public function show(Dvr $dvr)
    {
        return view('Dvr.detail',compact('Dvr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dvr  $dvr
     * @return \Illuminate\Http\Response
     */
    public function edit(Dvr $dvr, $id)
    {
        $datas= DB::table('dvr')
       ->join('locations','dvr.lokasi_id','=','locations.location_id')
       ->select('dvr.*','locations.location_name as location_name')
       ->where('dvr.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Dvr.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dvr  $dvr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dvr $dvr)
    {
        $this->_validation($request);
        $data = Dvr::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('dvr_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dvr  $dvr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dvr $dvr, $id)
    {
        DB::table('dvr')->where('id',$id)->delete();
        return redirect()->route('dvr_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'tipe'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'region'=>'required',
        'ukuran_hd'=>'required'
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'tipe.required'=>'Tipe tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'region'=>'Region tidak boleh kosong',
        'ukuran_hd'=>'Ukuran Hd tidak boleh kosong'
        
        ]);
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('dvr')
         ->where('dvr.merek','like',"%".$cari."%")
         ->join('locations','dvr.lokasi_id','=','locations.location_id')
         ->select('dvr.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Dvr/index',['data' => $datas]);
 
    }
    public function export_excel()
	{
		return Excel::download(new DvrExport, 'Daftar-dvr.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('dvr')
         ->join('locations','dvr.lokasi_id','=','locations.location_id')
         ->select('dvr.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Dvr/dvr_pdf',['data'=>$data]);
         return $pdf->download('Daftar dvr-pdf'); 
         //return $pdf->stream();
    }
}
