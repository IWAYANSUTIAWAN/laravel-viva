<?php

namespace App\Http\Controllers;

use App\Anydesk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\AnydeskExport;
use Maatwebsite\Excel\Facades\Excel;
class AnydeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data_anydesk=DB::table('anydeks')
         ->join('locations','anydeks.lokasi_id','=','locations.location_id')
         ->select('anydeks.*','locations.location_name as location_name')
          ->get();
        
        return view('Anydesk/index',['data'=>$data_anydesk]);
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
         return view('Anydesk.create',['data'=>$datas]);
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
        $data = Anydesk::create($request->all());
        return redirect()->route('anydesk_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anydesk  $anydesk
     * @return \Illuminate\Http\Response
     */
    public function show(Anydesk $anydesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anydesk  $anydesk
     * @return \Illuminate\Http\Response
     */
    public function edit(Anydesk $anydesk, $id)
    {
        $datas= DB::table('anydeks')
       ->join('locations','anydeks.lokasi_id','=','locations.location_id')
       ->select('anydeks.*','locations.location_name as location_name')
       ->where('anydeks.id',$id)
       ->first();

       $data_an=DB::table('locations')->get();
       return view('Anydesk.update',['datas' => $datas,'data'=>$data_an]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anydesk  $anydesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anydesk $anydesk)
    {
        $this->_validation($request);
        $data = Anydesk::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('anydesk_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anydesk  $anydesk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anydesk $anydesk, $id)
    {
       DB::table('anydeks')->where('id',$id)->delete();
       return redirect()->route('anydesk_index')->with('message','Data berhasil dihapus');
    }

    private function _validation(Request $request){
        $validation=$request->validate([
        'lokasi_id'=>'required',
        'kode_id'=>'required',
        'password'=>'required'
        ],
        [
        'lokasi_id.required'=>'Lokasi id tidak boleh kosong',
        'kode_id.required'=>'ID tidak boleh kosong',
        'password.required'=>'sandi tidak boleh kosong'
        
        ]);
    }
    
    public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('anydeks')
         ->join('locations','anydeks.lokasi_id','=','locations.location_id')
         ->select('anydeks.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Anydesk/anydesk_pdf',['data'=>$data]);
         return $pdf->download('Daftar Anydesk-pdf'); 
         //return $pdf->stream();
    }

    public function export_excel()
	{
		return Excel::download(new AnydeskExport, 'Daftar-Anydesk.xlsx');
    }

    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('anydeks')
         ->where('location_name','like',"%".$cari."%")
         ->join('locations','anydeks.lokasi_id','=','locations.location_id')
         ->select('anydeks.*','locations.location_name as location_name')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Anydesk/index',['data' => $datas]);
 
    }
     public function cari(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        $kode = $request->kode_update;
       
        $lokasi = DB::table('locations')
		->where('location_name','like',"%".$cari."%")
		->paginate(10);
        
        // if ($kode == 1){
             return view('Anydesk/create',['data' => $lokasi]);
        // }
        // if ($kode == 2){
        //     return view('Anydesk.update',['data' => $lokasi]);
        // }
		
 
    }

}
