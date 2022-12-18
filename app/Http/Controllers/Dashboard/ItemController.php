<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.dashboard.item.index',[
            'items' => Item::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.item.create',[
            'items' => Item::all(),
            'categories' => Category::all(),
        ]);
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
            'numeric' => ':attribute harus diisi angka !',
            'image' => ':attribute harus diisi image !'
        ];

        // dd($request);
        $a = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'price' => 'required',
        ],$pesan);

        // dd();
        
        // jika images ada isinya atau true
        if ($request->file('image')) {
            $a['image'] = $request->file('image')->store('menu-images');
        }

        Item::create($a);
        // $request->session()->flash('success', 'Registration successfull! Please Login');
        return redirect('/dashboard/item')->with('success','Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //return response
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Detail Data Post',
        //     'data'    => $item  
        // ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, Category $categories)
    {
        return view('pages.dashboard.item.edit',[
            'categories' => Category::all(),
            'item' => $item
            ]
        );
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
            'numeric' => ':attribute harus diisi angka !',
            'image' => ':attribute harus diisi image !'
        ];

        $data = $request->validate([
            'name' => 'required|max:255|min:2',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'price' => 'required|numeric',
        ], $pesan);

        if ($request->file('image')) {
            // menghapus foto lama agar tidak memenuhi media penyimpanan
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $data['image'] = $request->file('image')->store('menu-images');
        }

        Item::where('id',$id)
        ->update($data);
        // $request->session()->flash('success', 'Registration successfull! Please Login');
        return redirect('/dashboard/item')->with('success','Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        // dd($id);
        if ($item->image) {
            Storage::delete($item->image);
        }

        Item::destroy($item->id);
        return redirect('/dashboard/item')->with('success','Data berhasil di hapus');
    }
}
