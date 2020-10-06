<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Teamviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\TeamviewerExport;
use Maatwebsite\Excel\Facades\Excel;


class TeamviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data_tv=DB::table('teamviewer')
         ->join('locations','teamviewer.lokasi_id','=','locations.location_id')
         ->select('teamviewer.*','locations.location_name as location_name')
         ->get();

        return view('Teamviewer/index',['data'=>$data_tv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
          $data_lokasi=DB::table('locations')
          ->get();
         return view('Teamviewer.create',['data'=>$data_lokasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  dd($request->all());
        $this->_validation($request);
        $data = Teamviewer::create($request->all());
        return redirect()->route('tv_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teamviewer  $teamviewer
     * @return \Illuminate\Http\Response
     */
    public function show(Teamviewer $teamviewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teamviewer  $teamviewer
     * @return \Illuminate\Http\Response
     */
    public function edit(Teamviewer $teamviewer, $id)
    {
      // $datas = Teamviewer::findOrFail($id);
       $datas= DB::table('teamviewer')
       ->join('locations','teamviewer.lokasi_id','=','locations.location_id')
       ->select('teamviewer.*','locations.location_name as location_name')
       ->where('teamviewer.id',$id)
       ->first();

       $data_lokasi=DB::table('locations')->get();
       return view('Teamviewer.update',['datas' => $datas,'data'=>$data_lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teamviewer  $teamviewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teamviewer $teamviewer)
    {
        $this->_validation($request);
        $data = Teamviewer::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('tv_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teamviewer  $teamviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teamviewer $teamviewer, $id)
    {
       DB::table('teamviewer')->where('id',$id)->delete();
       return redirect()->route('tv_index')->with('message','Data berhasil dihapus');
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

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $lokasi = DB::table('locations')
		->where('location_name','like',"%".$cari."%")
		->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Teamviewer/create',['data' => $lokasi]);
 
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        // $tv = DB::table('teamviewer')
		// ->where('location_name','like',"%".$cari."%")
        // ->paginate(10);
         $tv=DB::table('teamviewer')
         ->where('location_name','like',"%".$cari."%")
         ->join('locations','teamviewer.lokasi_id','=','locations.location_id')
         ->select('teamviewer.*','locations.location_name as location_name')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Teamviewer/index',['data' => $tv]);
 
    }
    public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $tv=DB::table('teamviewer')
         ->join('locations','teamviewer.lokasi_id','=','locations.location_id')
         ->select('teamviewer.*','locations.location_name as location_name')
         ->get();
    	$pdf = PDF::loadview('Teamviewer/tv_pdf',['tv'=>$tv]);
         return $pdf->download('Daftar Teamviewer-pdf'); 
         //return $pdf->stream();
    }
    public function export_excel()
	{
		return Excel::download(new TeamviewerExport, 'Daftar-Teamviewer.xlsx');
    }
}
