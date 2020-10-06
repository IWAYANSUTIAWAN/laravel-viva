<?php

namespace App\Http\Controllers;

use App\Email;
use App\Region;
use App\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use PDF;
//fungsi excel
use App\Exports\EmailExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas=DB::table('email')
         ->join('locations','email.lokasi_id','=','locations.location_id')
         ->select('email.*','locations.location_name as location_name','locations.slug as slug')
         ->get();

        
        return view('email/index',['data'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $datas=DB::table('locations')->get();
      
        $region=Region::all();
         return view('Email.create',['data'=>$datas,'region'=>$region]);
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
        $data = email::create($request->all());
        return redirect()->route('email_index')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email, $id)
    {
        $datas= DB::table('email')
       ->join('locations','email.lokasi_id','=','locations.location_id')
       ->select('email.*','locations.location_name as location_name')
       ->where('email.id',$id)
       ->first();

        $data_an=DB::table('locations')->get();
        $region=Region::all();
       return view('email.update',['datas' => $datas,'data'=>$data_an,'region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        $this->_validation($request);
        $data = email::findOrFail($request->id);
        $data->update($request->all());
        return redirect()->route('email_index')->with('message','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email, $id)
    {
        DB::table('email')->where('id',$id)->delete();
        return redirect()->route('email_index')->with('message','Data berhasil dihapus');
    }
    private function _validation(Request $request){
        $validation=$request->validate([
        'gmail'=>'required',
        'zimbra'=>'required',
        'dropbox'=>'required',
        ],
        [
        'gmail.required'=>'Gmail tidak boleh kosong',
        'zimbra.required'=>'Zimbra tidak boleh kosong',
        'dropbox.required'=>'Dropbox tidak boleh kosong',
        ]);
    }
    public function index_cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $datas=DB::table('email')
         ->where('email.merek','like',"%".$cari."%")
         ->join('locations','email.lokasi_id','=','locations.location_id')
         ->select('email.*','locations.location_name as location_name','locations.slug as slug')
         ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('email/index',['data' => $datas]);
 
    }
    public function export_excel()
	{
		return Excel::download(new emailExport, 'Daftar-email.xlsx');
    }
     public function cetak_pdf()
    {
    	//$tv = Teamviewer::all();
        $data=DB::table('email')
         ->join('locations','email.lokasi_id','=','locations.location_id')
         ->select('email.*','locations.location_name as location_name')
         ->get();

    	$pdf = PDF::loadview('email/email_pdf',['data'=>$data]);
         return $pdf->download('Daftar email-pdf'); 
         //return $pdf->stream();
    }
}
