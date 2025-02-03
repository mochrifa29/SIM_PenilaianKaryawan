<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => User::all()
        ];
        return view('pages.user.index',$data);
    }

    public function profile($email){
        $data = [
            'title' => 'Profile',
            'profile' => User::where('email',$email)->first()
        ];
        return view('pages.profile.index',$data);
    }

    public function ubah_password(Request $request,$email){
        $request->validate([
            'password_baru' => 'required',
        ]);

        User::where('email',$email)->update([
            'password' => bcrypt($request->password_baru) ,
        ]);

        return redirect('/user')->with('success', 'Password Berhasil Diubah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Form Tambah User'
        ];
        return view('pages.user.form_tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users|email',
            'role' => 'required',
            'password' => 'required',
            'password_conf' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();

        return redirect('/user')->with('success', 'Data Berhasil Dihapus');
    }
}
