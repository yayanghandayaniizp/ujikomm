<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Kamar;
use Session;
use App\Role;
use App\Typekamar;

class KamarController extends Controller
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
            $kamarr = Kamar::all();
            return Datatables::of($kamarr)
              ->addColumn('action',function($kamarrr){
                return view('datatable._action', [
                    'model'     => $kamarrr,
                    'form_url'  => route('Kamar.destroy',$kamarrr->id),
                    'edit_url'  => route('Kamar.edit',$kamarrr->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $kamarrr->name . ' ?' ]);
            })->make(true);
            
             }


     $html = $htmlBuilder
        ->addColumn(['data'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'status', 'title'=>'Status'])
        ->addColumn(['data'=>'namatipe.types_id','name'=>'namatipe.namatipe', 'title'=>'Typekamar'])


        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('kamar.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kamar.create');
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
        $kamaar = new Kamar;
        $kamaar->status = $request['status'];
        $kamaar->types_id = $request['types_id'];
        $kamaar->namatipe = $request['namatipe'];


         $kamaar->save();
        return redirect()->route('Kamar.index');
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
        $kamarku = Kamar::find($id);
        return view('kamar.edit')->with (compact('kamarku'));
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
           'status'=>'required',

            ]);
        Kamar::find($id)->update([

     'status'=> $request['status']

        ]);
            return redirect()->route('Kamar.index');
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
         $kamarku = Kamar::destroy($id);
    return redirect()->route('Kamar.index');

    }
}
