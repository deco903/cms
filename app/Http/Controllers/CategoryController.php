<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::paginate(10);
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        //validate
        $request->validate([
            'name' => 'required|min:3'
        ]);

        // Store
        $category = category::create([
            'name' => $request->name,
            'slug' => str::slug($request->name)
        ]);
            return redirect('/category')->with('pesan','data berhasil ditambah');
    }

    public function edit($id)
    {
        $categories = category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $update_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        Category::whereid($id)->update($update_data);
        return redirect()->route('cat.index')->with('pesan','data berhasil dirubah');
    }

    public function destroy($id)
    {
        $categories = category::find($id);
        $categories->delete();

        return redirect()->back()->with('pesan','data berhasil dihapus');
    }


}
