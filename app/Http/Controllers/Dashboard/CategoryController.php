<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.category.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.category.create');
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
            'name' => 'required|min:1|max:50',
        ],$pesan);

        Category::create($data);
        return redirect('/dashboard/category')->with('success','Data berhasil di simpan');
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
    public function edit(Category $category)
    {
        return view('pages.dashboard.category.edit',[
            'category' => $category
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
            'name' => 'required|min:2|max:50',
        ],$pesan);

        Category::where('id',$id)
            ->update($data);

        return redirect('/dashboard/category')->with('success','Data berhasil di update');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success','Data berhasil di hapus');
    }
}
