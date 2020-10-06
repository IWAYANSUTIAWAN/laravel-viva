<?php

namespace App\Http\Controllers;

use App\Isp;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\ispExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class IspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=DB::table('isp')
        ->join('locations','isp.lokasi_id','=','locations.location_id')
        ->select('isp.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Isp/index',['data'=>$datas]);
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
         return view('Isp.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Isp::create($request->all());
        return redirect()->route('isp_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Isp  $isp
     * @return \Illuminate\Http\Response
     */
    public function show(Isp $isp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Isp  $isp
     * @return \Illuminate\Http\Response
     */
    public function edit(Isp $isp, $id)
    {
        $datas= DB::table('isp')
       ->join('locations','isp.lokasi_id','=','locations.location_id')
       ->select('isp.*','locations.location_name as location_name')
       ->where('isp.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Isp.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Isp  $isp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Isp $isp)
    {
        $this->_validation($request);
        $data = Isp::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('isp_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Isp  $isp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Isp $isp, $id)
    {
         DB::table('isp')->where('id',$id)->delete();
        return redirect()->route('isp_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
       'kecepatan'=>'required',
        'status'=>'required',
        'provider'=>'required',
        ],
        [
        'kecepatan.required'=>'Kecepatan tidak boleh kosong',
        'status.required'=>'status tidak boleh kosong',
        'provider.required'=>'provider tidak boleh kosong',
      ]);
    }
    public function export_excel()
	{
		return Excel::download(new IspExport, 'Daftar-isp.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('isp')
         ->join('locations','isp.lokasi_id','=','locations.location_id')
         ->select('isp.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Isp.isp_pdf',['data'=>$data]);
         return $pdf->download('Daftar isp-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('isp')
         ->where('isp.merek','like',"%".$cari."%")
         ->join('locations','isp.lokasi_id','=','locations.location_id')
         ->select('isp.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Isp/index',['data' => $datas]);
 
    }
}

