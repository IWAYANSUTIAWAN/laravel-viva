<?php

namespace App\Http\Controllers;

use App\kodelokasi;
use Illuminate\Http\Request;

class KodelokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Kodelokasi::all();
        return view('Kodelokasi.index',['data'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kodelokasi.create');
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
        $data = Kodelokasi::create($request->all());
        return redirect()->route('kodelokasi_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kodelokasi  $kodelokasi
     * @return \Illuminate\Http\Response
     */
    public function show(kodelokasi $kodelokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kodelokasi  $kodelokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(kodelokasi $kodelokasi, $id)
    {
        $datas=Kodelokasi::where('Kodelokasi.id',$id)->first();
        return view('Kodelokasi.update',['datas' => $datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kodelokasi  $kodelokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kodelokasi $kodelokasi)
    {
        $this->_validation($request);
        $data = Kodelokasi::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('kodelokasi_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kodelokasi  $kodelokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(kodelokasi $kodelokasi,$id)
    {
        // DB::table('keyboard')->where('id',$id)->delete();\
        Kodelokasi::where('kodelokasi.id',$id)->delete();
        return redirect()->route('kodelokasi_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'Kodelokasi'=>'required','Tipelokasi'=>'required'
        ],
        ['Kodelokasi.required'=>'kodelokasi tidak boleh kosong',
        'Tipelokasi.required'=>'tipe tidak boleh kosong',
        ]);
    }
}
