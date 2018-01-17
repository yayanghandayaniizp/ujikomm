<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Tipemobil;
use Session;
use App\Role;

class TipeController extends Controller
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
            $tipemobil = tipemobil::all();
            return Datatables::of($tipemobil)
              ->addColumn('action',function($tipemobill){
                return view('datatable._action', [
                    'model'     => $tipemobill,
                    'form_url'  => route('Tipe.destroy',$tipemobill->id),
                    'edit_url'  => route('Tipe.edit',$tipemobill->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $tipemobill->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'nama_tipe','name'=>'nama_tipe', 'title'=>'Nama Tipe'])
        ->addColumn(['data'=>'merek_id','name'=>'merek_id', 'title'=>'Merek'])

        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('tipe.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipe.index');
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
        $this->validate($request, [
            'nama_tipe'=>'required',
            'merek_id'=>'required']);

            $user = new Tipemobil;
            $user->nama_tipe = $request['nama_tipe'];
            $user->merek_id = $request['merek_id'];
        

            $user->save();
        return redirect('/admin/Tipe');
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
    }
}
