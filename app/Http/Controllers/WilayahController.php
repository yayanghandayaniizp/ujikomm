<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Wilayah;
use Session;
use App\Role;

class WilayahController extends Controller

	
{
    //

    public function index(Request $request, Builder $htmlBuilder)
{
    // return view('wilayah.index');
    if($request->ajax()){
            $wilayah = wilayah::all();
            return Datatables::of($wilayah)
              ->addColumn('action',function($wilayahh){
                return view('datatable._action', [
                    'model'     => $wilayahh,
                    'form_url'  => route('Wilayah.destroy',$wilayahh->id),
                    'edit_url'  => route('Wilayah.edit',$wilayahh->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $wilayahh->name . ' ?' ]);
            })->make(true);

              }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'nama_wilayah','name'=>'nama_wilayah', 'title'=>'Nama Wilayah'])
        ->addColumn(['data'=>'kabupaten','name'=>'kabupaten', 'title'=>'Kabupaten'])
        ->addColumn(['data'=>'kecamatan','name'=>'kecamatan', 'title'=>'Kecamatan'])
        ->addColumn(['data'=>'kode_pos','name'=>'kode_pos', 'title'=>'Kode Pos'])

        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('wilayah.index')->with(compact('html'));
}

 public function edit($id)
    {
        //

        $wilayahku = Wilayah::find($id);
        return view('wilayah.edit')->with (compact('wilayahku'));
    }

  public function store(Request $request)
    {
        //
             $this->validate($request, [
            'nama_wilayah'=>'required',
            'kabupaten'=>'required',
            'kecamatan'=>'required',
            'kode_pos'=>'required']);

            $user = new Wilayah;
            $user->nama_wilayah = $request['nama_wilayah'];
            $user->kabupaten = $request['kabupaten'];
            $user->kecamatan = $request['kecamatan'];
            $user->kode_pos = $request['kode_pos'];
            $user->save();

        return redirect('/admin/Wilayah');
       
        }

         public function create()
    {
        //
        return view('wilayah.create');
    }

 public function update(Request $request, $id)
    {
        //

         $this->validate($request, [
           'nama_wilayah'=>'required',
            'kabupaten'=>'required',
            'kecamatan'=>'required',
            'kode_pos'=>'required|exist:kode_pos']);

            Wilayah::find($id)->update([
        
'nama_wilayah'=> $request['nama_wilayah'],
'kabupaten'=> $request['kabupaten'],
'kecamatan'=> $request['kecamatan'],
'kode_pos'=> $request['kode_pos']
            ]);

            return redirect()->route('Wilayah.index');


    }


 public function show($id)
    {
        //
    
    }

    public function destroy($id)
    {
        //

         $akuntabel = Wilayah::destroy($id);
    return redirect()->route('Wilayah.index');
  
    }
}
	 