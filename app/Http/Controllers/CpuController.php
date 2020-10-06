<?php

namespace App\Http\Controllers;

use App\Cpu;
use App\Kondisi;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\CpuExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class CpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_cpu=DB::table('cpu')
        ->join('locations','cpu.lokasi_id','=','locations.location_id')
        ->select('cpu.*','locations.location_name as location_name','locations.slug as slug')
        ->get();
        
        return view('Cpu/index',['data'=>$data_cpu]);
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
         return view('Cpu.create',['data'=>$datas,'kondisi'=>$kondisi,'region'=>$region]);
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
        $data = Cpu::create($request->all());
        return redirect()->route('cpu_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function show(Cpu $cpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpu $cpu,$id)
    {
        $datas= DB::table('cpu')
       ->join('locations','cpu.lokasi_id','=','locations.location_id')
       ->select('cpu.*','locations.location_name as location_name')
       ->where('cpu.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $kondisi=Kondisi::all();
        $region=Region::all();
       return view('Cpu.update',['datas' => $datas,'data'=>$data_an,'kondisi'=>$kondisi,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cpu $cpu)
    {
        $this->_validation($request);
        $data = Cpu::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('cpu_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpu $cpu, $id)
    {
        DB::table('cpu')->where('id',$id)->delete();
        return redirect()->route('cpu_index')->with('message','Data berhasil dihapus');
    }

     private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'tipe'=>'required',
        'sn'=>'required',
        'kondisi'=>'required',
        'lokasi_name'=>'required',
        'region'=>'required',
        'nama_pengguna'=>'required',
        'os'=>'required',
        ],
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'tipe.required'=>'Tipe tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
        'kondisi.required'=>'kondisi tidak boleh kosong',
        'lokasi_name'=>'lokasi tidak boleh kosong',
        'region'=>'Region tidak boleh kosong',
        'nama_pengguna'=>'Pengguna tidak boleh kosong',
        'os'=>'Sistem Operasi tidak boleh kosong'
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new CpuExport, 'Daftar-cpu.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('cpu')
         ->join('locations','cpu.lokasi_id','=','locations.location_id')
         ->select('cpu.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('Cpu.cpu_pdf',['data'=>$data]);
         return $pdf->download('Daftar cpu-pdf'); 
         //return $pdf->stream();
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('cpu')
         ->where('cpu.merek','like',"%".$cari."%")
         ->join('locations','cpu.lokasi_id','=','locations.location_id')
         ->select('cpu.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('Cpu/index',['data' => $datas]);
 
    }
}
