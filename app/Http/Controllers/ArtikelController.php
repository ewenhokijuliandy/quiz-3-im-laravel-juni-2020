<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;

class ArtikelController extends Controller
{
    public function home(){
        return view('home');
    }

    public function index(){
        $artikel = ArtikelModel::get_all();
        return view('index', compact('artikel'));
    }

    public function create(){
        return view('form');
    }

    public function store(Request $request){
       $new_artikel = ArtikelModel::save($request->all());
        return redirect('/artikel');
    }

    public function show($id){
        $data = ArtikelModel::find_by_id($id);
        return view('detail', compact('data'));
    }

    public function edit($id){
        $data = ArtikelModel::find_by_id($id);
        return view('edit', compact('data'));
    }

    public function update($id, Request $request){
        $data = ArtikelModel::update($id, $request->all());
        return redirect('/artikel');
    }

    public function destroy($id){
        $deleted = ArtikelModel::destroy($id);
        return redirect('/artikel');
    }
}

?>