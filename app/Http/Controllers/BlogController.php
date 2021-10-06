<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\category;

class BlogController extends Controller
{
    public function index(Posts $posts)
    {
        $category_widget = category::all();
    	$data = $posts->latest()->take(5)->get();
    	return view('blog.blog', compact('data','category_widget'));
    }

    public function isi_post($id)
    {
        $category_widget = category::all();
    	$data = Posts::where('id',$id)->get();
    	return view('blog.isi_post', compact('data','category_widget'));
    }

    public function list_post()
    {
        $category_widget = category::all();
        $data = posts::latest()->paginate(6);
        return view('blog.list_post', compact('data','category_widget'));
    }

    public function list_category(Category $category)
    {
        $category_widget = category::all();
        $data = $category->posts()->paginate(5);
        return view('blog.list_post', compact('data','category_widget'));
    }

    public function cari(request $request)
    {
        $category_widget = category::all();
        $data = posts::where('judul', $request->cari)->orWhere('judul','like','%'. $request->cari.'%')->paginate(5);
        return view('blog.list_post', compact('data','category_widget'));
    }
}
