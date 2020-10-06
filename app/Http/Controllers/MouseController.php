<?php

namespace App\Http\Controllers;

use App\Mouse;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\MouseExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class MouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data_mouse=DB::table('mouse')
        ->join('locations','mouse.lokasi_id','=','locations.location_id')
        ->select('mouse.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Mouse/index',['data'=>$data_mouse]);
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
         return view('Mouse.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Mouse::create($request->all());
        return redirect()->route('mouse_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function show(Mouse $mouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Mouse $mouse, $id)
    {
         $datas= DB::table('mouse')
       ->join('locations','mouse.lokasi_id','=','locations.location_id')
       ->select('mouse.*','locations.location_name as location_name')
       ->where('mouse.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Mouse.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mouse $mouse)
    {
        $this->_validation($request);
        $data = Mouse::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('mouse_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mouse  $mouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mouse $mouse, $id)
    {
         DB::table('mouse')->where('id',$id)->delete();
        return redirect()->route('mouse_index')->with('message','Data berhasil dihapus');
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
		return Excel::download(new MouseExport, 'Daftar-mouse.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('mouse')
         ->join('locations','mouse.lokasi_id','=','locations.location_id')
         ->select('mouse.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Mouse.mouse_pdf',['data'=>$data]);
         return $pdf->download('Daftar mouse-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('mouse')
         ->where('mouse.merek','like',"%".$cari."%")
         ->join('locations','mouse.lokasi_id','=','locations.location_id')
         ->select('mouse.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Mouse/index',['data' => $datas]);
 
    }
}
