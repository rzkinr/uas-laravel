<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Merk;
use App\Models\Kategori;
use App\Models\Supplier;

use DB;
use DataTables;

use App\Exports\ItemExport;
use Maatwebsite\Excel\Facades\Excel;

class Item_controller extends Controller
{
    public function index()
    {
        $title = 'List Item';
        $data = Item::orderBy('created_at', 'desc')->get();

        return view('item.item_index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Item';
        $merks = Merk::orderBy('nama', 'asc')->get();
        $kategori = Kategori::orderBy('nama', 'asc')->get();
        $supplier = Supplier::orderBy('nama', 'asc')->get();

        return view('item.item_add', compact('title', 'merks', 'kategori', 'supplier'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'price' => 'required',
            'buy' => 'required',
            'stock' => 'required',
            'discount' => 'required',
            'merk_id' => 'required',
            'supplier_id' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required'
        ]);

        // $mk = new kategori;
        // $mk->kategori_id = \Uuid::generate(4);
        // $mk->nama = $request->nama;
        // $mk->save();
        Item::insert([
            'item_id' => \Uuid::generate(4),
            'nama' => $request->nama,
            'price' => $request->price,
            'buy' => $request->buy,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'merk_id' => $request->merk_id,
            'supplier_id' => $request->supplier_id,
            'keterangan' => $request->keterangan,
            'kategori_id' => $request->kategori_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil Ditambah');
        return redirect('item');
    }

    public function edit($id)
    {
        $title = 'Edit Item';
        $merks = Merk::orderBy('nama', 'asc')->get();
        $kategori = Kategori::orderBy('nama', 'asc')->get();
        $supplier = Supplier::orderBy('nama', 'asc')->get();
        $dt = Item::where('item_id', $id)->first();

        return view('item.item_edit', compact('title', 'merks', 'kategori', 'supplier', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'price' => 'required',
            'buy' => 'required',
            'stock' => 'required',
            'discount' => 'required',
            'merk_id' => 'required',
            'supplier_id' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required'
        ]);

        Item::where('item_id', $id)->update([
            // 'item_id'=>\Uuid::generate(4),
            'nama' => $request->nama,
            'price' => $request->price,
            'buy' => $request->buy,
            'stock' => $request->stock,
            'discount' => $request->discount,
            'merk_id' => $request->merk_id,
            'supplier_id' => $request->supplier_id,
            'keterangan' => $request->keterangan,
            'kategori_id' => $request->kategori_id,
            // 'created_at'=>date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \Session::flash('pesan', 'Data berhasil diupdate');
        return redirect('item');
    }

    public function delete($id)
    {
        try {
            Item::where('item_id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }

        return redirect('item');
    }

    public function cloning(Request $request, $id)
    {
        $dt = Item::where('item_id', $id)->first();

        Item::insert([
            'item_id' => \Uuid::generate(4),
            'nama' => $$dt->price,
            'price' => $dt->price,
            'buy' => $dt->buy,
            'stock' => $dt->stock,
            'discount' => $dt->discount,
            'merk_id' => $dt->merk_id,
            'kategori_id' => $dt->kategori_id,
            'supplier_id' => $dt->supplier_id,
            'keterangan' => $dt->keterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        \Session::flash('pesan', 'Data berhasil Di Clone');
        return redirect('item');
    }

    public function export()
    {
        return Excel::download(new ItemExport, 'item.xlsx');
    }
}
