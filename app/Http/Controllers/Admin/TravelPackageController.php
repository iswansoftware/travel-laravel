<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TravelPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TravelPackageController extends Controller
{
    public function index(){
        $items = TravelPackage::all();

        return view('pages.travel-package.index', [
            'items' => $items
        ]);
    }

    public function create(){
        return view('pages.travel-package.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required|string|max:255|min:5',
            'location' => 'required|string|max:255|min:5',
            'about' => 'required',
            'featured_event' => 'required|string|max:255|min:5',
            'foods' => 'required|string|max:255|min:5',
            'language' => 'required|string|max:255|min:5',
            'departure_date' => 'required',
            'duration' => 'required|string|max:255|min:5',
            'title' => 'required|string|max:255|min:5',
            'type' => 'required|string|max:255|min:5',
            'price' => 'required',
        ]);

        $items = new TravelPackage;

        $items->title = $request->title;
        $items->slug =  Str::slug($request->title);
        $items->location = $request->location;
        $items->about = $request->about;
        $items->featured_event = $request->featured_event;
        $items->foods = $request->foods;
        $items->language = $request->language;
        $items->departure_date = $request->departure_date;
        $items->duration = $request->duration;
        $items->type = $request->type;
        $items->price = $request->price;

        // dd($items);

        $items->save();

        return redirect()->route('travel-package.index')->with('success', 'Data berhasil ditambahkan!');

    }


    public function edit($id){
        $item = TravelPackage::find($id);

        return view('pages.travel-package.edit', [
            'item' => $item
        ]);
    }

    public function update( Request $request, $id){

        $this->validate($request, [
            'title' => 'required|string|max:255|min:5',
            'location' => 'required|string|max:255|min:5',
            'about' => 'required',
            'featured_event' => 'required|string|max:255|min:5',
            'foods' => 'required|string|max:255|min:5',
            'language' => 'required|string|max:255|min:5',
            'departure_date' => 'required',
            'duration' => 'required|string|max:255|min:5',
            'title' => 'required|string|max:255|min:5',
            'type' => 'required|string|max:255|min:5',
            'price' => 'required',
        ]);

        $item = TravelPackage::find($id);
        $item->title = $request->title;
        $item->slug =  Str::slug($request->title);
        $item->location = $request->location;
        $item->about = $request->about;
        $item->featured_event = $request->featured_event;
        $item->foods = $request->foods;
        $item->language = $request->language;
        $item->departure_date = $request->departure_date;
        $item->duration = $request->duration;
        $item->type = $request->type;
        $item->price = $request->price;

        $item->save();
        return redirect()->route('travel-package.index')->with('success', 'Data berhasil diubah!');

    }


    public function destroy($id){
        $item = TravelPackage::find($id);
        $item->delete();

        return redirect()->route('travel-package.index')->with('success', 'Data berhasil dihapus!');
    }
}
