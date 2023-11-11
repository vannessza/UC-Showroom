@extends('petugas.layouts.main')

@section('container')

<div class="form-signin form m-auto p-4">
    <h1>Create Kendaraan</h1>
    <form method="post" action="{{ route('admin.kendaraan.store') }}">
        @csrf

        <!-- Bagian Jenis Kendaraan -->
        <div class="mb-3">
            <label for="jenis" class="form-label"></label>
            <select class="form-select" id="jenis" name="jenis" required>
                <option value="">Pilih Jenis Kendaraan</option>
                <option value="Mobil">Mobil</option>
                <option value="Motor">Motor</option>
                <option value="Truck">Truck</option>
            </select>
        </div>
        
        <!-- Bagian Informasi Utama -->
        <div class="form-floating">
            <input type="text" name="model" class="form-control mb-3" id="model" placeholder="model" required value="{{ old('model') }}">
            <label for="model">Model</label>
        </div>
        <div class="form-floating">
            <input type="tahun" name="tahun" class="form-control mb-3" id="tahun" placeholder="tahun" required value="{{ old('tahun') }}">
            <label for="tahun">Tahun</label>
        </div>
        <div class="form-floating">
            <input type="jumlah_penumpang" name="jumlah_penumpang" class="form-control mb-3" id="jumlah_penumpang" placeholder="jumlah_penumpang" required value="{{ old('jumlah_penumpang') }}">
            <label for="jumlah_penumpang">Jumlah Penumpang</label>
        </div>
        <div class="form-floating">
            <input type="manufaktur" name="manufaktur" class="form-control mb-3" id="manufaktur" placeholder="manufaktur" required value="{{ old('manufaktur') }}">
            <label for="manufaktur">Manufaktur</label>
        </div>
        <div class="form-floating">
            <input type="harga" name="harga" class="form-control mb-3" id="harga" placeholder="harga" required value="{{ old('harga') }}">
            <label for="harga">Harga</label>
        </div>

        <!-- Informasi Tambahan untuk Mobil -->
        <div id="mobil-fields" style="display: none;">
            <div class="form-floating">
                <input type="tipe_bahan_bakar" name="tipe_bahan_bakar" class="form-control mb-3" id="tipe_bahan_bakar" placeholder="tipe_bahan_bakar" value="{{ old('tipe_bahan_bakar') }}">
                <label for="tipe_bahan_bakar">Tipe Bahan Bakar</label>
            </div>
            <div class="form-floating">
                <input type="luas_bagasi" name="luas_bagasi" class="form-control mb-3" id="luas_bagasi" placeholder="luas_bagasi" value="{{ old('luas_bagasi') }}">
                <label for="luas_bagasi">Luas Bagasi</label>
            </div>
        </div>

        <!-- Informasi Tambahan untuk Truck -->
        <div id="truck-fields" style="display: none;">
            <div class="form-floating">
                <input type="jumlah_roda_ban" name="jumlah_roda_ban" class="form-control mb-3" id="jumlah_roda_ban" placeholder="jumlah_roda_ban" value="{{ old('jumlah_roda_ban') }}">
                <label for="jumlah_roda_ban">Jumlah Roda Ban</label>
            </div>
            <div class="form-floating">
                <input type="luas_area_kargo" name="luas_area_kargo" class="form-control mb-3" id="luas_area_kargo" placeholder="luas_area_kargo" value="{{ old('luas_area_kargo') }}">
                <label for="luas_area_kargo">Luas Area Kargo</label>
            </div>
        </div>

        <!-- Informasi Tambahan untuk Motor -->
        <div id="motor-fields" style="display: none;">
            <div class="form-floating">
                <input type="ukuran_bagasi" name="ukuran_bagasi" class="form-control mb-3" id="ukuran_bagasi" placeholder="ukuran_bagasi" value="{{ old('ukuran_bagasi') }}">
                <label for="ukuran_bagasi">Ukuran Bagasi</label>
            </div>
            <div class="form-floating">
                <input type="kapasitas_bensin" name="kapasitas_bensin" class="form-control mb-3" id="kapasitas_bensin" placeholder="kapasitas_bensin" value="{{ old('kapasitas_bensin') }}">
                <label for="kapasitas_bensin">Kapasitas Bensin</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection