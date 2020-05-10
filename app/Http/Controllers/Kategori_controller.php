<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Kategori;

use Illuminate\Http\Request;

class Kategori_controller extends Controller
{
    public function index()
    {
        $title = 'List Kategori';
        $data = Kategori::orderBy('created_at', 'desc')->get();

        return view('kategori.kategori_index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Kategori';

        return view('kategori.kategori_add', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        // $mk = new kategori;
        // $mk->kategori_id = \Uuid::generate(4);
        // $mk->nama = $request->nama;
        // $mk->save();
        Kategori::insert([
            'kategori_id' => \Uuid::generate(4),
            'nama' => $request->nama,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        \Session::flash('sukses', 'Data berhasil Ditambah');
        return redirect('kategori');
    }

    public function edit($id)
    {
        try {
            $title = 'Edit kategori';
            $dt = Kategori::where('kategori_id', $id)->first();

            return view('kategori.kategori_edit', compact('title', 'dt'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required'
        ]);

        Kategori::where('kategori_id', $id)->update([
            'nama' => $request->nama,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        \Session::flash('sukses', 'Data berhasil diupdate');
        return redirect('kategori');
    }

    public function delete($id)
    {
        try {
            Kategori::where('kategori_id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect('kategori');
    }

    public function yajra(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $users = Kategori::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'kategori_id',
            'nama'
        ]);
        $datatables = DataTables::of($users)
            ->addColumn('action', function ($kategori) {
                return '<center><a href="kategori/' . $kategori->kategori_id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a href="kategori/' . $kategori->kategori_id . '" class="btn btn-hapus btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a></center>';
            });

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
}
