<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\TravelPackage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $items = Gallery::with(['travel_package'])->paginate(5);

        return view('pages.gallery.index', [
            'items' => $items
        ]);
    }


    public function create(){
        $travel_packages = TravelPackage::all();

        return view('pages.gallery.create', [
            'travel_packages' => $travel_packages
        ]);
    }

    public function store(Request $request){
        $items = new Gallery;

        $items->travel_packages_id = $request->travel_packages_id;
        $items->image = $request->image;

        if($request->hasFile('image')){
            $path = 'public/gambar';
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $upload = $request->file('image')->storeAs($path, $name);

            $items['image'] = $name;
        }

        // dd($items);

        $items->save();

        return redirect()->route('gallery.index')->with('status','Data berhasil ditambahkan!');

    }


    public function edit($id){
        $item = Gallery::find($id);
        $travel_packages = TravelPackage::all();
        return view('pages.gallery.edit', [
            'item' => $item,
            'travel_packages' => $travel_packages
        ]);
    }


    public function update( Request $request, $id){
        $item = Gallery::find($id);

        $item->travel_packages_id = $request->travel_packages_id;
        $item->image = $request->image;

        if($request->hasFile('image')){
            $path = 'public/gambar';
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $upload = $request->file('image')->storeAs($path, $name);

            $item['image'] = $name;
        }


        $item->save();
        return redirect()->route('gallery.index');

    }


    public function destroy($id){
        $hapus = Gallery::find($id);

        $hapus->delete();

        return redirect()->route('gallery.index')->with('status','Data berhasil dihapus!');
    }
}
