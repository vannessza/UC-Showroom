<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\motor;
use App\Models\Truck;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kendaraan";
        $kendaraan = Kendaraan::all();
        return view("petugas.kendaraan.index", compact("title", "kendaraan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Kendaraan";
        return view('petugas.kendaraan.kendaraancreate', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis' => 'required',
            'model' => 'required',
            'tahun' => 'required|numeric',
            'jumlah_penumpang' => 'required|numeric',
            'manufaktur' => 'required',
            'harga' => 'required|numeric',
            'tipe_bahan_bakar' => 'required_if:jenis,Mobil',
            'luas_bagasi' => 'required_if:jenis,Mobil',
            'jumlah_roda_ban' => 'required_if:jenis,Truck',
            'luas_area_kargo' => 'required_if:jenis,Truck',
            'ukuran_bagasi' => 'required_if:jenis,Motor',
            'kapasitas_bensin' => 'required_if:jenis,Motor',
        ]);

        $kendaraan = Kendaraan::create([
            'jenis' => $request->jenis,
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
        ]);
        
        // Menetapkan nilai-nilai relasinya terpisah berdasarkan jenis kendaraan
        if ($validateData['jenis'] === 'Mobil') {
            $kendaraan->mobil()->create([
                'tipe_bahan_bakar' => $validateData['tipe_bahan_bakar'],
                'luas_bagasi' => $validateData['luas_bagasi'],
            ]);
        } elseif ($validateData['jenis'] === 'Truck') {
            $kendaraan->truck()->create([
                'jumlah_roda_ban' => $validateData['jumlah_roda_ban'],
                'luas_area_kargo' => $validateData['luas_area_kargo'],
            ]);
        } elseif ($validateData['jenis'] === 'Motor') {
            $kendaraan->motor()->create([
                'ukuran_bagasi' => $validateData['ukuran_bagasi'],
                'kapasitas_bensin' => $validateData['kapasitas_bensin'],
            ]);
        }
        
        return redirect()->route('admin.kendaraan');
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
        $title = "Edit Kendaraan";
        $kendaraan = Kendaraan::findOrFail($id);
        return view('petugas.kendaraan.kendaraanedit', compact('kendaraan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'jenis' => 'required',
            'model' => 'required',
            'tahun' => 'required|numeric',
            'jumlah_penumpang' => 'required|numeric',
            'manufaktur' => 'required',
            'harga' => 'required|numeric',
            'tipe_bahan_bakar' => 'required_if:jenis,Mobil',
            'luas_bagasi' => 'required_if:jenis,Mobil',
            'jumlah_roda_ban' => 'required_if:jenis,Truck',
            'luas_area_kargo' => 'required_if:jenis,Truck',
            'ukuran_bagasi' => 'required_if:jenis,Motor',
            'kapasitas_bensin' => 'required_if:jenis,Motor',
        ]);

        $kendaraan->update([
            'jenis' => $request->jenis,
            'model' => $request->model,
            'tahun' => $request->tahun,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'manufaktur' => $request->manufaktur,
            'harga' => $request->harga,
        ]);

        // Mengupdate nilai-nilai relasinya berdasarkan jenis kendaraan
        if ($request->jenis === 'Mobil') {
            $kendaraan->mobil()->update([
                'tipe_bahan_bakar' => $request->tipe_bahan_bakar,
                'luas_bagasi' => $request->luas_bagasi,
            ]);
        } elseif ($request->jenis === 'Truck') {
            $kendaraan->truck()->update([
                'jumlah_roda_ban' => $request->jumlah_roda_ban,
                'luas_area_kargo' => $request->luas_area_kargo,
            ]);
        } elseif ($request->jenis === 'Motor') {
            $kendaraan->motor()->update([
                'ukuran_bagasi' => $request->ukuran_bagasi,
                'kapasitas_bensin' => $request->kapasitas_bensin,
            ]);
        }

        return redirect()->route('admin.kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        // Menghapus relasi terlebih dahulu
        if ($kendaraan->jenis === 'Mobil') {
            $kendaraan->mobil()->delete();
        } elseif ($kendaraan->jenis === 'Truck') {
            $kendaraan->truck()->delete();
        } elseif ($kendaraan->jenis === 'Motor') {
            $kendaraan->motor()->delete();
        }

        // Menghapus kendaraan
        $kendaraan->delete();

        return redirect(route('admin.kendaraan'));
    }
}
