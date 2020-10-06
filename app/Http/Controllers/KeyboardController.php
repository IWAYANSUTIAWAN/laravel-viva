<?php

namespace App\Http\Controllers;

use App\Keyboard;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\KeyboardExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=DB::table('keyboard')
        ->join('locations','keyboard.lokasi_id','=','locations.location_id')
        ->select('keyboard.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Keyboard/index',['data'=>$datas]);
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
         return view('Keyboard.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Keyboard::create($request->all());
        return redirect()->route('keyboard_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function show(Keyboard $keyboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyboard $keyboard, $id)
    {
        
        $datas= DB::table('keyboard')
       ->join('locations','keyboard.lokasi_id','=','locations.location_id')
       ->select('keyboard.*','locations.location_name as location_name')
       ->where('keyboard.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Keyboard.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keyboard $keyboard)
    {
        $this->_validation($request);
        $data = Keyboard::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('keyboard_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyboard $keyboard, $id)
    {
        DB::table('keyboard')->where('id',$id)->delete();
        return redirect()->route('keyboard_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'jenis'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'region'=>'required',
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'jenis.required'=>'Jenis tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'region'=>'Region tidak boleh kosong',
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new KeyboardExport, 'Daftar-keyboard.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('keyboard')
         ->join('locations','keyboard.lokasi_id','=','locations.location_id')
         ->select('keyboard.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Keyboard.keyboard_pdf',['data'=>$data]);
         return $pdf->download('Daftar keyboard-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('keyboard')
         ->where('keyboard.merek','like',"%".$cari."%")
         ->join('locations','keyboard.lokasi_id','=','locations.location_id')
         ->select('keyboard.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Keyboard/index',['data' => $datas]);
 
    }
}
