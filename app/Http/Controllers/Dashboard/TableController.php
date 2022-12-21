<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.dashboard.table.index',[
            'tables' => Table::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan = [
            'required' => ':attribute harus diisi !',
            'min' => 'field harus diisi minimal :min karakter !',            
            'max' => 'field harus diisi maksimal :max karakter !',
        ];

        // dd($request);
        $data = $request->validate([
            'no_table' => 'required|min:1|max:50',
            'no_room' => ''
        ],$pesan);

        Table::create($data);
        return redirect('/dashboard/table')->with('success','Data berhasil di simpan');
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
     * @param  int  $idp
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('pages.dashboard.table.edit',[
            'table' => $table
        ]);
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
        $pesan = [
            'required' => ':attribute harus diisi !',
            'min' => 'field harus diisi minimal :min karakter !',            
            'max' => 'field harus diisi maksimal :max karakter !',
        ];

        // dd($request);
        $data = $request->validate([
            'no_table' => 'required|min:2|max:50',
            'no_room' => ''
        ],$pesan);

        Table::where('id',$id)
            ->update($data);

        return redirect('/dashboard/table')->with('success','Data berhasil di update');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        Table::destroy($table->id);
        return redirect('/dashboard/table')->with('success','Data berhasil di hapus');
    }
}
