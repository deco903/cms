<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{
    public function index()
    {
    	$user = user::paginate(10);
    	return view('admin.user.index',compact('user'));
    }

    public function create()
    {
    	return view('admin.user.create');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
	        'name' => 'required|min:3|max:100',
	        'email' => 'required|email',
	        'tipe' => 'required',
	     ]);

    	//if user using default password
    	if ($request->input(['password'])) {
    		$password = bcrypt($request->password);
         }else{
         	$password = bcrypt('1234');
         }
    	
    	  user::create([
	    	  'name' => $request->name,
	    	  'email' => $request->email,
	    	  'tipe' => $request->tipe,
	    	  'password' => $password
    		
    	    ]);

    	return redirect()->back()->with('pesan','Nama user berhasil ditambah');
    }

    public function edit($id)
    {
    	$user = user::find($id);
    	return view('admin.user.edit', compact('user'));
    }

     public function update(Request $request, $id)
    {
    	$validatedData = $request->validate([
	        'name' => 'required|min:3|max:100',
	        'tipe' => 'required',
	     ]);

    	if ($request->input(['password'])) {
    		$user_data = [
	    		'name' => $request->name,
	    		'tipe' => $request->tipe,
	    		'password' => bcrypt($request->password)
	    	    ];
         }else{
         	$user_data = [
	    		'name' => $request->name,
	    		'tipe' => $request->tipe
	    	    ];
         }

         $user = user::find($id);
         $user->update($user_data);

         return redirect()->route('user.index')->with('pesan','Data User berhasil dirubah');
    	
    }

    Public function destroy($id)
    {
    	$user = user::find($id);
    	$user->delete();

    	return redirect()->back()->with('pesan','Data user berhasil dihapus');
    }

}
