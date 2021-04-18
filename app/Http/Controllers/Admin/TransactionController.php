<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TransactionDetaiil;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $items = Transaction::with(['travel_package', 'users', 'details'])->paginate(5);

        return view('pages.transaction.index', [
            'items' => $items
        ]);
    }


    public function show($id){
    $item =    Transaction::with(['travel_package', 'users', 'details'])->find($id);

    return view('pages.transaction.detail', [
        'item' => $item
    ]);
    }


    public function edit($id){
        $item = Transaction::find($id);



        return view('pages.transaction.edit', [
            'item' => $item
        ]);

    }


    public function update(Request $request, $id){
        $data = $request->all();

        $item = Transaction::find($id);

        $item->update($data);

        return redirect()->route('transaction.index');

    }

    public function destroy($id){
        $item = Transaction::find($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }

    public function backIndex(){
        return redirect()->route('transaction.index');
    }
}
