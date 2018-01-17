<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Typekamar;
use Session;
use App\Role;

class TypekamarController extends Controller
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
            $typekamarr = Typekamar::all();
            return Datatables::of($typekamarr)
              ->addColumn('action',function($typekamarrr){
                return view('datatable._action', [
                    'model'     => $typekamarrr,
                    'form_url'  => route('Typekamar.destroy',$typekamarrr->id),
                    'edit_url'  => route('Typekamar.edit',$typekamarrr->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $typekamarrr->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'namatipe','name'=>'namatipe', 'title'=>'Type kamar'])
        ->addColumn(['data'=>'harga','name'=>'harga', 'title'=>'Harga kamar'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
       


        return view('typekamar.index')->with(compact('html'));



        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('typekamar.create');
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

        $typee = new Typekamar;
        $typee->namatipe = $request['namatipe'];
         $typee->harga = $request['harga'];
        // dd($typee);

        $typee->save();
        return redirect()->route('Type.index');
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

        $typeku = Typekamar::find($id);
        return view('typekamar.edit')->with (compact('typeku'));
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
           'namatipe'=>'required',
            'harga'=>'required'
            ]);

            Wilayah::find($id)->update([
        
'namatipe'=> $request['namatipe'],
'harga'=> $request['harga']

            ]);

            return redirect()->route('Type.index');
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
        $typeeku = Typekamar::destroy($id);
    return redirect()->route('Type.index');
    }
}
