<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\str;
use App\tags;

class TagsController extends Controller
{
    public function index(){
        $tag = tags::paginate(10);
        return view ('admin.tag.index', compact('tag'));
    }

    public function create(){
        return view ('admin.tag.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:20|min:3'
        ]);

        tags::create([
            'name' => $request->name,
            'slug' => str::slug($request->name)
        ]);

        return redirect('/tag')->with('pesan','data berhasil ditambah');
    }

    public function edit($id){
        $tag = tags::find($id);
        return view ('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|max:20|min:3'
        ]);

        $update_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        tags::whereid($id)->update($update_data);
        return redirect('/tag')->with('pesan','data berhasil dirubah');
    }

    public function destroy($id){
        $tag = tags::find($id);
        $tag->delete();

        return redirect('/tag')->with('pesan','data berhasil dihapus');
    }
}
