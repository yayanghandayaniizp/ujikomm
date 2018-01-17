<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Dataiklan;
use App\Merekmobil;
use App\Tipemobil;
use App\Wilayah;   
use Session;
use App\Role;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if($request->ajax()){
            $iklans = Dataiklan::with('Merekmobil');
            return Datatables::of($iklans)
              ->addColumn('action',function($iklan){
                return view('datatable._action', [
                    'model'     => $iklan,
                    'form_url'  => route('Iklan.destroy',$iklan->id),
                    'edit_url'  => route('Iklan.edit',$iklan->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $iklan->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'judul','name'=>'judul', 'title'=>'Judul'])
        ->addColumn(['data'=>'deskripsi','name'=>'deskripsi', 'title'=>'Deskripsi'])
        ->addColumn(['data'=>'kondisi','name'=>'kondisi', 'title'=>'Kondisi'])
        ->addColumn(['data'=>'harga','name'=>'harga', 'title'=>'Harga'])
        ->addColumn(['data'=>'tahun','name'=>'tahun', 'title'=>'Tahun'])
        ->addColumn(['data'=>'telp','name'=>'telp', 'title'=>'No.telp'])
        ->addColumn(['data'=>'Merekmobil.nama_merek','name'=>'Merekmobil.nama_merek','title'=>'Merek mobil'])

        ->addColumn(['data'=>'merekmobil.mereks_id','name'=>'merekmobil.nama_merek', 'title'=>'Merek Mobil'])
        ->addColumn(['data'=>'wilayah.name_wilayah','name'=>'wilayah.nama_wilayah', 'title'=>'Wilayah'])
        ->addColumn(['data'=>'user.name','name'=>'user.name', 'title'=>'Akun'])

        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('iklan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('iklan.create');
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

        // $iklann = new Dataiklan();
        // $iklann->judul = $request->a;
        // $iklann->deskripsi = $request->b;
        // $iklann->kondisi = $request->c;
        // $iklann->harga = $request->d;
        // $iklann->tahun = $request->e;
        // $iklann->mereks_id = $request->mereks_id;
        // $iklann->wilayahs_id = $request->wilayahs_id;
        // $iklann->akuns_id = $request->aku;

        $this->validate($request, [
            'judul'=>'required|exists:judul',
            'deskripsi'=>'required',
            'kondisi'=>'required',
            'harga'=>'required|numeric',
            'tahun'=>'required|numeric',
            'telp'=>'required|numeric'       
            ]);
            // 'mereks_id'=>'required|exists:mereks_id'
            
     
       $user = new Dataiklan;
            $user->judul  = $request['judul'];
            $user->deskripsi = $request['deskripsi'];
            $user->kondisi = $request['kondisi'];
            $user->harga= $request['harga'];
            $user->tahun= $request['tahun'];
            $user->harga= $request['harga'];
            $user->telp= $request['telp'];
            // $user->mereks_id= $request['mereks_id'];



            $user->save();

    
  return redirect('/admin/Iklan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


         $iklan = Dataiklan::destroy($id);
    return redirect()->route('Iklan.index');
  
    }
}
