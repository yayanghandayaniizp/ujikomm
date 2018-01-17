<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\User;
use Session;
use App\Role;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
    // return view('akuntabel.index');
        if($request->ajax()){
            $akuntabel = User::all();
            return Datatables::of($akuntabel)
              ->addColumn('action',function($akuntabel){
                return view('datatable._action', [
                    'model'     => $akuntabel,
                    'form_url'  => route('User.destroy',$akuntabel->id),
                    'edit_url'  => route('User.edit',$akuntabel->id),
                    'confirm_message' => 'Yakin Ingin Menghapus ' . $akuntabel->name . ' ?' ]);
            })->make(true);
        }


        $html = $htmlBuilder
        ->addColumn(['data'=>'id','name'=>'id', 'title'=>'No'])
        ->addColumn(['data'=>'name','name'=>'name', 'title'=>'Nama pengguna'])
        ->addColumn(['data'=>'email','name'=>'email', 'title'=>'Alamat email'])

        ->addColumn(['data'=>'action','name'=>'action','title'=>'Action','orderable'=>false,'searchable'=>false]);
        return view('akuntabel.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('akuntabel.create');
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|string|min:6']);

            $user = new User;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);

            $adminRole = Role::where('name','admin')->first();
            $user->save();
            $user->attachRole($adminRole);

        return redirect('/admin/User');
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

        $akuntabel = User::find($id);
        return view('akuntabel.edit')->with (compact('akuntabel'));
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
           'name'=>'required',
            'email'=>'required',
            'password'=>'required']);

            User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
            ]);

            return redirect()->route('User.index');


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
  $akuntabel = User::destroy($id);
    return redirect()->route('User.index');
    }
}
