<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use DB;
use App\Models\Supplier;

class Supplier_controller extends Controller
{
    public function index()
    {
        $title = 'List Supplier';
        $data = Supplier::orderBy('created_at', 'desc')->get();

        return view('supplier.supplier_index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Supplier';

        return view('supplier.supplier_add', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        // $mk = new Merk;
        // $mk->merk_id = \Uuid::generate(4);
        // $mk->nama = $request->nama;
        // $mk->save();
        Supplier::insert([
            'supplier_id' => \Uuid::generate(4),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil Ditambah');
        return redirect('supplier');
    }

    public function edit($id)
    {
        $title = 'Edit Supplier';
        $dt = Supplier::where('supplier_id', $id)->first();

        return view('supplier.supplier_edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        Supplier::where('supplier_id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('supplier');
    }

    public function delete($id)
    {
        try {
            Supplier::where('supplier_id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('supplier');
    }
}
