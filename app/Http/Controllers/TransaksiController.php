<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Lokasi;
use App\Cpu;
use App\Monitor;
use App\Keyboard;
use App\Mouse;
use App\Printer;
use App\Scaner;
use App\Finger;
use App\Dvr;
use App\Cctv;
use App\Webcame;
use App\Modem;
use App\Telpon;
use App\Isp;
use App\Ups;
use App\Chart;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas=Chart::all();
        $lokasi=Lokasi::all();
        $cpu=Cpu::select('id','merek','tipe','sn')->get();
        $monitor=Monitor::select('merek','model','sn')->get();
        $keyboard=Keyboard::select('merek','model','jenis','sn')->get();
        $mouse=Mouse::select('merek','tipe','sn')->get();
        $printer=Printer::select('merek','tipe','sn')->get();
        $scaner=Scaner::select('merek','tipe','sn')->get();
        $finger=Finger::select('vc','ac','sn')->get();
        $dvr=Dvr::select('merek','tipe','sn')->get();
        $cctv=Cctv::select('merek','tipe','sn')->get();
        $webcame=Webcame::select('merek','tipe','sn')->get();
        $modem=Modem::select('merek','tipe','sn')->get();
        $telpon=Telpon::select('merek','tipe','sn')->get();
        $isp=Isp::select('provider','nomor_tlp')->get();
        $ups=Ups::select('merek','tipe','sn','tegangan')->get();

        return view('Transaksi.create',['lokasi'=>$lokasi, 'cpu'=>$cpu, 'monitor'=>$monitor,
        'keyboard'=>$keyboard,'mouse'=>$mouse,'printer'=>$printer,
        'scaner'=>$scaner,'finger'=>$finger,'dvr'=>$dvr,'cctv'=>$cctv,
        'webcame'=>$webcame,'modem'=>$modem,'telpon'=>$telpon,'isp'=>$isp,
        'ups'=>$ups,'data'=>$datas]);
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
        // dd($request->all());
        $data = chart::create($request->all());
         return redirect()->route('transaksi_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi, $id)
    {
        Chart::where('id',$id)->delete();
         return redirect()->route('transaksi_create');
    }
     private function _validation(Request $request){
        $validation=$request->validate([
        'merek'=>'required',
        'tipe'=>'required',
        'sn'=>'required',
        'lokasi_id'=>'required',
        ],
        
        [
        'merek.required'=>'Merek tidak boleh kosong',
        'tipe.required'=>'Tipe tidak boleh kosong',
        'sn.required'=>'Serial number tidak boleh kosong',
         'lokasi_id.required'=>'Lokasi id tidak boleh kosong',
        ]);
        
    }
}
