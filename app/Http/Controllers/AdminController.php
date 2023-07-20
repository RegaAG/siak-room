<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.ruangan',[
            'datas' => Ruangan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahRuangan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'room_type' => 'required',
            'capacity' => 'required',
            'location' => 'required',
            'foto' => ['required','mimes:jpeg,jpg,png'],
        ]);

        $foto_file = $request->file('foto');
        $foto_ektensi = $foto_file->extension();
        $foto_nama = date('ymdhis'). '.' .$foto_ektensi;
        $foto_file->move(public_path('foto'),$foto_nama);
        
        $store = [
            'name' => ucwords($request->input('name')),
            'room_type' => ucwords($request->input('room_type')),
            'capacity' => $request->input('capacity'),
            'location' => ucwords($request->input('location')),
            'foto' => $foto_nama
        ];

        Ruangan::create($store);

        return redirect('/admin/dashboard')->with('info', 'Kelas Berhasil Ditambah') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.editRuangan',[
            'data' => Ruangan::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'room_type' => 'required',
            'capacity' => 'required',
            'location' => 'required',
        ]);

        if ($request->hasFile('foto')) {

            $request->validate([
                'foto' => ['required','mimes:jpeg,jpg,png'],
            ]);

            $foto_file = $request->file('foto');
            $foto_ektensi = $foto_file->extension();
            $foto_nama = date('ymdhis'). '.' .$foto_ektensi;
            $foto_file->move(public_path('foto'),$foto_nama);

            $data = Ruangan::where('id', $id)->first();
            File::delete(public_path('foto').'/'. $data->foto );

            $update = [
            'name' => ucwords($request->input('name')),
            'room_type' => ucwords($request->input('room_type')),
            'capacity' => $request->input('capacity'),
            'location' => ucwords($request->input('location')),
            'foto' => $foto_nama
            ];

            Ruangan::where('id', $id)->update($update);
            return redirect('/admin/dashboard');
        }
        else
        {
            $update = [
            'name' => ucwords($request->input('name')),
            'room_type' => ucwords($request->input('room_type')),
            'capacity' => $request->input('capacity'),
            'location' => ucwords($request->input('location')),
            ];

            Ruangan::where('id', $id)->update($update);
            return redirect('/admin/dashboard')->with('info', 'Kelas Berhasil Update');
        }
    }


    public function destroy(Ruangan $ruangan, $id)
    {
        $data = Ruangan::where('id', $id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        $data->delete();
        return redirect('/admin/dashboard')->with('info','Data Berhasil Dihapus');
    }
}
