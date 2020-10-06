<?php

namespace App\Http\Controllers;

use App\Switch_h;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\switch_hExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class SwitchHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=DB::table('switch')
        ->join('locations','switch.lokasi_id','=','locations.location_id')
        ->select('switch.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Switch/index',['data'=>$datas]);
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
         return view('Switch.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Switch_h::create($request->all());
        return redirect()->route('switch_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Switch_h  $switch_h
     * @return \Illuminate\Http\Response
     */
    public function show(Switch_h $switch_h)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Switch_h  $switch_h
     * @return \Illuminate\Http\Response
     */
    public function edit(Switch_h $switch_h, $id)
    {
         $datas= DB::table('switch')
       ->join('locations','switch.lokasi_id','=','locations.location_id')
       ->select('switch.*','locations.location_name as location_name')
       ->where('switch.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Switch.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Switch_h  $switch_h
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Switch_h $switch_h)
    {
        $this->_validation($request);
        $data = Switch_h::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('switch_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Switch_h  $switch_h
     * @return \Illuminate\Http\Response
     */
    public function destroy(Switch_h $switch_h, $id)
    {
         DB::table('switch')->where('id',$id)->delete();
        return redirect()->route('switch_index')->with('message','Data berhasil dihapus');
    }

     private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'port'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'region'=>'required',
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'port.required'=>'Jumllah port tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'region'=>'Region tidak boleh kosong',
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new Switch_hExport, 'Daftar-switch.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('switch')
         ->join('locations','switch.lokasi_id','=','locations.location_id')
         ->select('switch.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Switch.switch_pdf',['data'=>$data]);
         return $pdf->download('Daftar switch-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('switch')
         ->where('switch.merek','like',"%".$cari."%")
         ->join('locations','switch.lokasi_id','=','locations.location_id')
         ->select('switch.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Switch/index',['data' => $datas]);
 
    }
}
