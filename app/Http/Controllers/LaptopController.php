<?php

namespace App\Http\Controllers;

use App\Laptop;
use Illuminate\Http\Request;
use App\Exports\LaptopExport;
use Maatwebsite\Excel\Facades\Excel;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Laptop::all();
        return view('Laptop/index',['data'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Laptop.create');
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
        $data=Laptop::create($request->all());
        return redirect()->route('laptop_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit(Laptop $laptop, $id)
    {
        $data=Laptop::where('laptops.id',$id)->first();
        return view('Laptop.update',['datas'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laptop $laptop)
    {
        $this->_validation($request);
        $data=Laptop::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('laptop_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laptop $laptop, $id)
    {
        Laptop::where('id',$id)->delete();
        return redirect()->route('laptop_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'vendor'=>'required',
        'tipe'=>'required',
        'sn_laptop'=>'required',
        'os'=>'required',
        'sn_os'=>'required',
        'pengguna'=>'required',
        ],
        [
        'vendor.required'=>'Nama Vendor tidak boleh kosong',
        'tipe.required'=>'Tipe tidak boleh kosong',
        'sn_laptop.required'=>'Serial number Laptop tidak boleh kosong',
        'os.required'=>'Sistem Operasi tidak boleh kosong',
        'sn_os'=>'SN Sistem Operasi tidak boleh kosong',
        'pengguna'=>'Pengguna laptop tidak boleh kosong',
        ]);
    }
    public function export_excel()
	{
		return Excel::download(new LaptopExport, 'Daftar-Laptop.xlsx');
    }
}
