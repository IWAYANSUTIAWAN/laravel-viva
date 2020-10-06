<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        //  $datas = Region::all();
        // return view('Region/region',['data'=>$datas]);

        $data_region=DB::table('regions')->paginate(10);
        return view('Region/region',['data'=>$data_region]);
    }
 //menampilkan form tambah data
    public function add(){
       return view('Region/create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request){
        $this->_validation($request);
        $data = Region::create($request->all());
        return redirect()->route('Region_index')->with('message','Data berhasil disimpan');
            
    }
        private function _validation(Request $request){
                   $validation=$request->validate([
                    'region'=>'required|max:50|min:2',
                    ],
                    [
                    'region.required'=>'Harus diisi',
                    'region.min'=>'Minimal 2 karakter',
                   ]);
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $datas = Region::findOrFail($id);
        return view('Region.update',['datas' => $datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        $this->_validation($request);
        $data = Region::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('Region_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
    
       DB::table('regions')->where('id',$id)->delete();
       return redirect()->route('Region_index')->with('message','Data berhasil dihapus');
    }
}
