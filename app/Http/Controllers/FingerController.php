<?php

namespace App\Http\Controllers;

use App\Finger;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\FingerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class FingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=DB::table('finger')
        ->join('locations','finger.lokasi_id','=','locations.location_id')
        ->select('finger.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Finger/index',['data'=>$datas]);
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
         return view('Finger.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Finger::create($request->all());
        return redirect()->route('finger_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function show(Finger $finger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function edit(Finger $finger, $id)
    {
         $datas= DB::table('finger')
       ->join('locations','finger.lokasi_id','=','locations.location_id')
       ->select('finger.*','locations.location_name as location_name')
       ->where('finger.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Finger.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finger $finger)
    {
         $this->_validation($request);
        $data = Finger::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('finger_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finger  $finger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finger $finger, $id)
    {
         DB::table('finger')->where('id',$id)->delete();
        return redirect()->route('finger_index')->with('message','Data berhasil dihapus');
    }

    private function _validation(Request $request){
        $validation=$request->validate([
        'sn'=>'required',
        'vc'=>'required',
        'ac'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
       
        
        ],
        [
        'sn.required'=>'Serial number tidak boleh kosong',
        'vc.required'=>'Verification code tidak boleh kosong',
        'ac.required'=>'Activation code tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        
        
       
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new FingerExport, 'Daftar-finger.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('finger')
         ->join('locations','finger.lokasi_id','=','locations.location_id')
         ->select('finger.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Finger.finger_pdf',['data'=>$data]);
         return $pdf->download('Daftar finger-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('finger')
         ->where('finger.merek','like',"%".$cari."%")
         ->join('locations','finger.lokasi_id','=','locations.location_id')
         ->select('finger.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Finger/index',['data' => $datas]);
 
    }
}
