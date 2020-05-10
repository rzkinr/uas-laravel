<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use DB;
use App\Models\Merk;


class Merk_controller extends Controller
{
    public function index()
    {
        $title = 'List Merk';
        $data = Merk::orderBy('created_at', 'desc')->get();

        return view('merk.merk_index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Merk';

        return view('merk.merk_add', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        // $mk = new Merk;
        // $mk->merk_id = \Uuid::generate(4);
        // $mk->nama = $request->nama;
        // $mk->save();
        Merk::insert([
            'merk_id' => \Uuid::generate(4),
            'nama' => $request->nama,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil Ditambah');
        return redirect('merk');
    }

    public function edit($id)
    {
        $title = 'Edit Merk';
        $dt = Merk::where('merk_id', $id)->first();

        return view('merk.merk_edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        Merk::where('merk_id', $id)->update([
            'nama' => $request->nama,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('merk');
    }

    public function delete($id)
    {
        try {
            Merk::where('merk_id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('merk');
    }
}
