<?php

namespace App\Http\Controllers;

use App\Scaner;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\ScanerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ScanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=DB::table('scaner')
        ->join('locations','scaner.lokasi_id','=','locations.location_id')
        ->select('scaner.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Scaner/index',['data'=>$datas]);
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
         return view('Scaner.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Scaner::create($request->all());
        return redirect()->route('scaner_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scaner  $scaner
     * @return \Illuminate\Http\Response
     */
    public function show(Scaner $scaner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scaner  $scaner
     * @return \Illuminate\Http\Response
     */
    public function edit(Scaner $scaner, $id)
    {
        $datas= DB::table('scaner')
       ->join('locations','scaner.lokasi_id','=','locations.location_id')
       ->select('scaner.*','locations.location_name as location_name')
       ->where('scaner.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Scaner.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scaner  $scaner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scaner $scaner)
    {
        $this->_validation($request);
        $data = Scaner::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('scaner_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scaner  $scaner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scaner $scaner, $id)
    {
        DB::table('scaner')->where('id',$id)->delete();
        return redirect()->route('scaner_index')->with('message','Data berhasil dihapus');
    }
    
    private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'tipe'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'region'=>'required',
        
        
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'tipe.required'=>'Tipe tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'region'=>'Region tidak boleh kosong',
        
       
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new ScanerExport, 'Daftar-scaner.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('scaner')
         ->join('locations','scaner.lokasi_id','=','locations.location_id')
         ->select('scaner.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Scaner.scaner_pdf',['data'=>$data]);
         return $pdf->download('Daftar scaner-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('scaner')
         ->where('scaner.merek','like',"%".$cari."%")
         ->join('locations','scaner.lokasi_id','=','locations.location_id')
         ->select('scaner.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Scaner/index',['data' => $datas]);
 
    }
}
