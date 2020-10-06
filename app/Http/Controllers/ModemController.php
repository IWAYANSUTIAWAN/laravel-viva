<?php

namespace App\Http\Controllers;

use App\Modem;
use Illuminate\Http\Request;
use App\Kondisi;
use App\Region;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\ModemExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ModemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=DB::table('modem')
        ->join('locations','modem.lokasi_id','=','locations.location_id')
        ->select('modem.*','locations.location_name as location_name','locations.slug as slug')
        ->get();

        return view('Modem/index',['data'=>$datas]);
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
         return view('Modem.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Modem::create($request->all());
        return redirect()->route('modem_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modem  $modem
     * @return \Illuminate\Http\Response
     */
    public function show(Modem $modem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modem  $modem
     * @return \Illuminate\Http\Response
     */
    public function edit(Modem $modem, $id)
    {
        $datas= DB::table('modem')
       ->join('locations','modem.lokasi_id','=','locations.location_id')
       ->select('modem.*','locations.location_name as location_name')
       ->where('modem.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Modem.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modem  $modem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modem $modem)
    {
        $this->_validation($request);
        $data = Modem::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('modem_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modem  $modem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modem $modem)
    {
        DB::table('Modem')->where('id',$id)->delete();
        return redirect()->route('modem_index')->with('message','Data berhasil dihapus');
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
		return Excel::download(new ModemExport, 'Daftar-modem.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('modem')
         ->join('locations','modem.lokasi_id','=','locations.location_id')
         ->select('modem.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Modem.modem_pdf',['data'=>$data]);
         return $pdf->download('Daftar modem-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('modem')
         ->where('modem.merek','like',"%".$cari."%")
         ->join('locations','modem.lokasi_id','=','locations.location_id')
         ->select('modem.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Modem/index',['data' => $datas]);
 
    }
}
