<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller {

    public function index(){
        return Data::all();
    }

    public function create(){ }

    //insert
    public function store(Request $request){
        $data = new Data;
        $data->nama = $request->nama;
        $data->no_telepon = $request->no_telepon;
        $data->save();

        // return "Data berhasil masuk";
        return response()->json(['pesan' => 'Data berhasil masuk', 'status' => true]);
    }

    public function show(Data $data){ }

    public function edit(Data $data){ }

    public function update(Request $request, $id){
        $nama = $request->nama;
        $no_telepon = $request->no_telepon;
        $data = Data::find($id);
        $data->nama=$nama;
        $data->no_telepon=$no_telepon;
        $data->save();

        return response()->json(['pesan' => 'Data berhasil diupdate', 'status' => true]);
        // return "Data bserhasil diupdate";
    }

    //delete
    public function destroy($id){
        $data = Data::find($id);
        $data->delete();

        // return "Data berhasil di delete";
        return response()->json(['pesan' => 'Data berhasil didelete', 'status' => true]);
    }
    //karna kita membuat api, maka yang kita set adalah api.php
}