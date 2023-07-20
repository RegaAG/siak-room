<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.akun',[
            'datas' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createAkun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'class' => 'required',
            'faculty' => 'required',
            'program' => 'required',
            'semester' => 'required',
            'username' => 'required|unique:users|min:5',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $data = [
            'name' => ucwords($request->input('name')),
            'class' => strtoupper($request->input('class')),
            'faculty' => ucwords($request->input('faculty')),
            'program' => ucwords($request->input('program')),
            'semester' => $request->input('semester'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'is_admin' => $request->input('is_admin'),
        ];

        User::create($data);

        return redirect('/admin/dashboard/akun')->with('info', 'Registrasi Akun Success!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.editAkun',[
            'data' => User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (! Hash::check($request->password, $user->password)) {
            return redirect('/admin/dashboard/akun/' . $id . '/edit')->with('info', 'Password Salah');
        }else
        {
            if($request->input('username') === $user->username){
                $request->validate([
                'name' => ['required'],
                'class' => ['required'],
                'faculty' => ['required'],
                'program' => ['required'],
                'semester' => ['required'],
                'username' => ['required','min:5'],
                'password' => ['required'],
                'is_admin' => ['required'],
                ]);

                $datas = [
                'name' => ucwords($request->input('name')),
                'class' => strtoupper($request->input('class')),
                'faculty' => ucwords($request->input('faculty')),
                'program' => ucwords($request->input('program')),
                'semester' => $request->input('semester'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'is_admin' => $request->input('is_admin'),
                ];

                $user->update($datas);
                return redirect('/admin/dashboard/akun')->with('info', 'Edit Akun Success!!!'); 
            }else
            {
                $request->validate([
                'name' => ['required'],
                'class' => ['required'],
                'faculty' => ['required'],
                'program' => ['required'],
                'semester' => ['required'],
                'username' => ['required','unique:users','min:5'],
                'password' => ['required'],
                'is_admin' => ['required'],
                ]);

                $datas = [
                'name' => ucwords($request->input('name')),
                'class' => strtoupper($request->input('class')),
                'faculty' => ucwords($request->input('faculty')),
                'program' => ucwords($request->input('program')),
                'semester' => $request->input('semester'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'is_admin' => $request->input('is_admin'),
                ];

                $user->update($datas);
                return redirect('/admin/dashboard/akun')->with('info', 'Update Akun Success!!!');

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $akun = User::where('id', $id)->first();
        $akun->delete();
        return redirect('/admin/dashboard/akun')->with('info', 'Akun Berhasil Dihapus!!!');
    }
}
