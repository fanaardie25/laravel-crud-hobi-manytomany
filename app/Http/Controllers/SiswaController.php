<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasiswa = Siswa::with('hobi')->get();
        $datahobi = Hobi::all();
        return view('hobi.app', compact('datasiswa','datahobi'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'hobis' => 'required|array|min:1'
        ],[
            'name.required' => 'Nama Siswa Wajib Diisi',
            'name.min' => 'Nama Siswa Minimal 3 Karakter',
            'name.max' => 'Nama Siswa Maksimal 100 Karakter',
            'hobi.required' => 'Hobi Wajib Dipilih',
            'hobi.min' => 'Hobi Minimal 1',
        ]);

        $data = Siswa::create([
            'nama' => $request->input('name'),
        ]);
    
        $data->hobi()->sync($request->hobis);

        return redirect()->route('siswa.index')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datasiswa = Siswa::with('hobi')->findOrFail($id);
        $datahobi = Hobi::all();
        return view('hobi.edit', compact('datasiswa','datahobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'hobis' => 'required|array|min:1'
        ],[
            'name.required' => 'Nama Siswa Wajib Diisi',
            'name.min' => 'Nama Siswa Minimal 3 Karakter',
            'name.max' => 'Nama Siswa Maksimal 100 Karakter',
            'hobis.required' => 'Hobi Wajib Dipilih',
            'hobis.min' => 'Hobi Minimal 1',
        ]);

        $data = Siswa::findOrFail($id);


        $data->update([
            'name' => $request->input('name'),
        ]);

        $data->hobi()->sync($request->input('hobis'));

        return redirect()->route('siswa.index')->with('success','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Siswa::findOrFail($id);

        $data->hobi()->detach();

        $data->delete();

        return redirect()->route('siswa.index')->with('success','data berhasil dihapus');
    }
}
