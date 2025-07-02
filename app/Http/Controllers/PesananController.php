<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    public function dashboard (){
        $data = Pesanan::all();
        return view ('dashboard' , compact('data'));
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pesanan::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-primary btn-edit" data-id="' . $row->id . '">Edit</button>
                    <button class="btn btn-danger btn-delete" data-id="' . $row->id . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Pesanan.index');
    }

    public function create()
    {
        return view('Pesanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'produk' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_pesanan' => 'required|date'
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('Pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'produk' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_pesanan' => 'required|date'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($request->all());

        return redirect()->route('Pesanan.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Pesanan::destroy($id);
        return redirect()->route('Pesanan.index')->with('success', 'Data berhasil dihapus');
    }

    public function generatePDF() {
        $data = Pesanan::all();
        $pdf = pdf::loadView('Pesanan.export-pdf', compact('data'));

        return $pdf->download('pesanan.pdf');
    }
}
