<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Petugas;
use Session;
use App\Role;

class PetugasController extends Controller
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
            $petugass = Petugas::all();
            return Datatables::of($petugass)
              ->addColumn('action',function($petugasss){
                return view('datatable._action', [
                    'model'     => $petugasss,
                    'form_url'  => route('Petugas.destroy',$petugasss->id),
                    'edit_url'  => route('Petugas.edit',$petugasss->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $petugasss->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'nama','name'=>'nama', 'title'=>'Nama Petugas'])
        ->addColumn(['data'=>'jabatan','name'=>'jabatan', 'title'=>'Jabatan'])

        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        
        return view('petugas.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('petugas.create');
    
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
         $petugas= new Petugas;
        $petugas->nama = $request['nama'];
         $petugas->jabatan = $request['jabatan'];

           $petugas->save();
         return redirect()->route('Petugas.index');
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
        $petugasku = Petugas::find($id);
        return view('petugas.edit')->with (compact('petugasku'));
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
         $this->validate($request, [
           'nama'=>'required',
            'jabatan'=>'required'


            ]);

            Petugas::find($id)->update([
        
'nama'=> $request['nama'],
'jabatan'=> $request['jabatan']

            ]);
            return redirect()->route('Petugas.index');
    
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
                 $petugasku = Petugas::destroy($id);
    return redirect()->route('Petugas.index');

    }
}
