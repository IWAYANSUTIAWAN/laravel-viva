<?php

namespace App\Http\Controllers;

use App\Ups;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\UpsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class UpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=DB::table('ups')
        ->join('locations','ups.lokasi_id','=','locations.location_id')
        ->select('ups.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Ups/index',['data'=>$datas]);
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
         return view('Ups.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Ups::create($request->all());
        return redirect()->route('ups_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function show(Ups $ups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function edit(Ups $ups, $id)
    {
        $datas= DB::table('ups')
       ->join('locations','ups.lokasi_id','=','locations.location_id')
       ->select('ups.*','locations.location_name as location_name')
       ->where('ups.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Ups.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ups $ups)
    {
        $this->_validation($request);
        $data = Ups::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('ups_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ups  $ups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ups $ups, $id)
    {
        DB::table('Ups')->where('id',$id)->delete();
        return redirect()->route('ups_index')->with('message','Data berhasil dihapus');
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
		return Excel::download(new UpsExport, 'Daftar-ups.xlsx');
    }
    public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('ups')
         ->join('locations','ups.lokasi_id','=','locations.location_id')
         ->select('ups.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Ups.ups_pdf',['data'=>$data]);
         return $pdf->download('Daftar ups-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('ups')
         ->where('ups.merek','like',"%".$cari."%")
         ->join('locations','ups.lokasi_id','=','locations.location_id')
         ->select('ups.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Ups/index',['data' => $datas]);
 
    }
}
