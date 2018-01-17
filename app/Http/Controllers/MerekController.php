<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Merekmobil;
use Session;
use App\Role;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        // return view('merek.index');
        if($request->ajax()){
            $merek = Merekmobil::all();
            return Datatables::of($merek)
              ->addColumn('action',function($merekk){
                return view('datatable._action', [
                    'model'     => $merekk,
                    'form_url'  => route('Merek.destroy',$merekk->id),
                    'edit_url'  => route('Merek.edit',$merekk->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $merekk->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'nama_merek','name'=>'nama_merek', 'title'=>'Merek Mobil'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('merek.index')->with(compact('html'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('merek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $this->validate($request, [
          
         //   'nama_merek'=>'required']);

         //    $user = new Merekmobil;
         //    $user->nama_merek = $request['nama_merek'];
         //    $user->save();
         // return redirect()->route('Merek.index');
        $merek = new Merekmobil;
        $merek->nama_merek = $request['nama_merek'];
        // dd($merek);

        $merek->save();
        return redirect()->route('Merek.index');
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
         $merekku = Merekmobil::find($id);
        return view('merek.edit')->with (compact('merekku'));
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
         
            'nama_merek'=>'required']);
           
            Merekmobil::find($id)->update([
        
        'nama_merek'=> $request['nama_merek']
            ]);

            return redirect()->route('Merek.index');
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

         $akuntabel = Merekmobil::destroy($id);
    return redirect()->route('Merek.index');
    }
}
