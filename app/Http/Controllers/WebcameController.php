<?php

namespace App\Http\Controllers;

use App\Webcame;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\WebcameExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class WebcameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=DB::table('webcame')
        ->join('locations','webcame.lokasi_id','=','locations.location_id')
        ->select('webcame.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Webcame/index',['data'=>$datas]);
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
         return view('Webcame.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Webcame::create($request->all());
        return redirect()->route('webcame_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Webcame  $webcame
     * @return \Illuminate\Http\Response
     */
    public function show(Webcame $webcame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Webcame  $webcame
     * @return \Illuminate\Http\Response
     */
    public function edit(Webcame $webcame, $id)
    {
        $datas= DB::table('webcame')
       ->join('locations','webcame.lokasi_id','=','locations.location_id')
       ->select('webcame.*','locations.location_name as location_name')
       ->where('webcame.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Webcame.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Webcame  $webcame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webcame $webcame)
    {
        $this->_validation($request);
        $data = Webcame::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('webcame_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Webcame  $webcame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webcame $webcame, $id)
    {
        DB::table('webcame')->where('id',$id)->delete();
        return redirect()->route('webcame_index')->with('message','Data berhasil dihapus');
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
		return Excel::download(new WebcameExport, 'Daftar-webcame.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('webcame')
         ->join('locations','webcame.lokasi_id','=','locations.location_id')
         ->select('webcame.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Webcame.webcame_pdf',['data'=>$data]);
         return $pdf->download('Daftar webcame-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('webcame')
         ->where('webcame.merek','like',"%".$cari."%")
         ->join('locations','webcame.lokasi_id','=','locations.location_id')
         ->select('webcame.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Webcame/index',['data' => $datas]);
 
    }
}
