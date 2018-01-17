<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Pengunjung;
use Session;
use App\Role;

class PengunjungController extends Controller
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
            $pengunjungg = Pengunjung::all();
            return Datatables::of($pengunjungg)
              ->addColumn('action',function($pengunjunggg){
                return view('datatable._action', [
                    'model'     => $pengunjunggg,
                    'form_url'  => route('Pengunjung.destroy',$pengunjunggg->id),
                    'edit_url'  => route('Pengunjung.edit',$pengunjunggg->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $pengunjunggg->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'nama','name'=>'nama', 'title'=>'Nama Pengunjung'])
        ->addColumn(['data'=>'tlp','name'=>'tlp', 'title'=>'No Telepon'])
        ->addColumn(['data'=>'ktp','name'=>'ktp', 'title'=>'No KTP'])
         ->addColumn(['data'=>'alamat','name'=>'alamat', 'title'=>'Alamat'])


        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('pengunjung.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengunjung.create');
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

        $pengunjjung = new Pengunjung;
        $pengunjjung->nama = $request['nama'];
         $pengunjjung->tlp = $request['tlp'];
          $pengunjjung->ktp = $request['ktp'];
           $pengunjjung->alamat = $request['alamat'];
        // dd($pengunjjung);

        $pengunjjung->save();
        return redirect()->route('Pengunjung.index');
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

         $pengunjungku = Pengunjung::find($id);
        return view('pengunjung.edit')->with (compact('pengunjungku'));
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
            'tlp'=>'required|numeric',
            'ktp'=>'required|numeric',
            'alamat' => 'required'


            ]);

            Pengunjung::find($id)->update([
        
'nama'=> $request['nama'],
'tlp'=> $request['tlp'],
'ktp'=> $request['ktp'],
'alamat'=> $request['alamat']

            ]);
            return redirect()->route('Pengunjung.index');
    
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
         $pengunjungku = Pengunjung::destroy($id);
    return redirect()->route('Pengunjung.index');
    }
}
