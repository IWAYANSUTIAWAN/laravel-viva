<?php

namespace App\Http\Controllers;

use App\Monitor;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\MonitorExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_monitor=DB::table('monitor')
        ->join('locations','monitor.lokasi_id','=','locations.location_id')
        ->select('monitor.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Monitor/index',['data'=>$data_monitor]);
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
         return view('Monitor.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Monitor::create($request->all());
        return redirect()->route('monitor_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function show(Monitor $monitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitor $monitor,$id)
    {
        $datas= DB::table('monitor')
       ->join('locations','monitor.lokasi_id','=','locations.location_id')
       ->select('monitor.*','locations.location_name as location_name')
       ->where('monitor.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Monitor.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitor $monitor)
    {
        $this->_validation($request);
        $data = Monitor::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('monitor_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitor, $id)
    {
        DB::table('monitor')->where('id',$id)->delete();
        return redirect()->route('monitor_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'model'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'region'=>'required',
        'ukuran'=>'required',
        
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'model.required'=>'Model tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'region'=>'Region tidak boleh kosong',
        'ukuran'=>'ukuran tidak boleh kosong',
       
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new MonitorExport, 'Daftar-monitor.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('monitor')
         ->join('locations','monitor.lokasi_id','=','locations.location_id')
         ->select('monitor.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('monitor.monitor_pdf',['data'=>$data]);
         return $pdf->download('Daftar monitor-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('monitor')
         ->where('monitor.merek','like',"%".$cari."%")
         ->join('locations','monitor.lokasi_id','=','locations.location_id')
         ->select('monitor.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Monitor/index',['data' => $datas]);
 
    }
}
