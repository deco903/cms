<?php

namespace App\Http\Controllers;

use App\posts;
use App\category;
use App\tags;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = posts::paginate(5);
        return view ('admin.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tags::all();
        $categories = category::all();
        return view('admin.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ]);

        //store

        // $gambar = $request->file('gambar');
        // $new_gambar = Request()->title.'.'.$gambar->getClientOriginalExtension();
        // // $gambar->move(public_path('uploads/post'),$new_gambar );


        // $post = posts::create([
        //     'judul' => $request->judul,
        //     'category_id' => $request->category_id,
        //     'content' => $request->content,
        //     'gambar' => 'uploads/post'. $new_gambar,
        //     'slug' => Str::slug($request->judul)
        // ]);

        // //input to post_tags (as pivot)   
        // $post->tags()->attach($request->tags);// input array     
        // $gambar->move('uploads/post/',$new_gambar);


        $judul = $request->judul;
        $category_id = $request->category_id;
        $content = $request->content;
        $image = $request->file('gambar');
        $imageName = Request()->judul.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/post'),$imageName);

        $post = new posts();
        
        $post->judul = $judul;
        $post->category_id = $category_id;
        $post->content = $content;
        $post->gambar = $imageName;
        $post->users_id = Auth::id();
       
        $post->save();
        $post->tags()->attach($request->tags);
        return redirect('/post')->with('pesan','data berhasil ditambah');
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
    public function edit($id)
    {
        $categories = category::all();
        $tags = tags::all();
        $post = posts::find($id);
        return view ('admin.post.edit',compact('post','tags','categories'));
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
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $post = posts::find($id);

        if($request->has('gambar')){
            $judul = $request->judul;
            $category_id = $request->category_id;
            $content = $request->content;
            $image = $request->file('gambar');
            $imageName = Request()->judul.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/post'),$imageName);


            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => $imageName,
                'slug' => Str::slug($request->judul)
                ];

            }else{
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->sync($request->tags); // update array 
        $post->update($post_data);   

        return redirect()->route('pos.index')->with('pesan','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post = posts::find($id);
         $post->delete();

          return redirect()->back()->with('pesan','data berhasil dihapus');
    }

    //soft delete
    public function tampil_hapus()
    {
        $post = posts::onlyTrashed()->paginate(10);
        return view('admin.post.hapus', compact('post'));
    }

     public function restore($id)
    {
        $post = posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('pesan','data berhasil direstore');
    }

     public function kill($id)
    {
         $post = posts::withTrashed()->where('id', $id)->first();
         $post->forceDelete();

         return redirect()->back()->with('pesan','data berhasil dihapus permanen');
    }
}
