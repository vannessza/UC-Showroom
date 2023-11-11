@extends('petugas.layouts.main')

@section('container')

<div class="form-signin form m-auto p-4">
    <h1>Edit Kendaraan</h1>
    <form method="post" action="{{ route('admin.kendaraan.update', $kendaraan->id) }}">
        @csrf

        <!-- Bagian Jenis Kendaraan -->
        <div class="mb-3">
            <label for="jenis" class="form-label"></label>
            <select class="form-select" id="jenis" name="jenis" required>
                <option value="" @if ($kendaraan->jenis == '') selected @endif>Pilih Jenis Kendaraan</option>
                <option value="Mobil" @if ($kendaraan->jenis == 'Mobil') selected @endif>Mobil</option>
                <option value="Motor" @if ($kendaraan->jenis == 'Motor') selected @endif>Motor</option>
                <option value="Truck" @if ($kendaraan->jenis == 'Truck') selected @endif>Truck</option>
            </select>
        </div>
        

        <!-- Bagian Informasi Utama -->
        <div class="form-floating">
            <input type="text" name="model" class="form-control mb-3" id="model" placeholder="model" required value="{{ $kendaraan->model }}">
            <label for="model">Model</label>
        </div>
        <div class="form-floating">
            <input type="tahun" name="tahun" class="form-control mb-3" id="tahun" placeholder="tahun" required value="{{ $kendaraan->tahun }}">
            <label for="tahun">Tahun</label>
        </div>
        <div class="form-floating">
            <input type="jumlah_penumpang" name="jumlah_penumpang" class="form-control mb-3" id="jumlah_penumpang" placeholder="jumlah_penumpang" required value="{{ $kendaraan->jumlah_penumpang }}">
            <label for="jumlah_penumpang">Jumlah Penumpang</label>
        </div>
        <div class="form-floating">
            <input type="manufaktur" name="manufaktur" class="form-control mb-3" id="manufaktur" placeholder="manufaktur" required value="{{ $kendaraan->manufaktur }}">
            <label for="manufaktur">Manufaktur</label>
        </div>
        <div class="form-floating">
            <input type="harga" name="harga" class="form-control mb-3" id="harga" placeholder="harga" required value="{{ $kendaraan->harga }}">
            <label for="harga">Harga</label>
        </div>

        <!-- Informasi Tambahan untuk Mobil -->
        <div id="mobil-fields" style="display: none;">
            @if ($kendaraan->mobil)
                <div class="form-floating">
                    <input type="tipe_bahan_bakar" name="tipe_bahan_bakar" class="form-control mb-3" id="tipe_bahan_bakar" placeholder="tipe_bahan_bakar" value="{{ $kendaraan->mobil->tipe_bahan_bakar }}">
                    <label for="tipe_bahan_bakar">Tipe Bahan Bakar</label>
                </div>
                <div class="form-floating">
                    <input type="luas_bagasi" name="luas_bagasi" class="form-control mb-3" id="luas_bagasi" placeholder="luas_bagasi" value="{{ $kendaraan->mobil->luas_bagasi }}">
                    <label for="luas_bagasi">Luas Bagasi</label>
                </div>
            @else
                <div class="form-floating">
                    <input type="tipe_bahan_bakar" name="tipe_bahan_bakar" class="form-control mb-3" id="tipe_bahan_bakar" placeholder="tipe_bahan_bakar">
                    <label for="tipe_bahan_bakar">Tipe Bahan Bakar</label>
                </div>
                <div class="form-floating">
                    <input type="luas_bagasi" name="luas_bagasi" class="form-control mb-3" id="luas_bagasi" placeholder="luas_bagasi">
                    <label for="luas_bagasi">Luas Bagasi</label>
                </div>
            @endif
        </div>

        <!-- Informasi Tambahan untuk Truck -->
        <div id="truck-fields" style="display: none;">
            @if ($kendaraan->truck)
                <div class="form-floating">
                    <input type="jumlah_roda_ban" name="jumlah_roda_ban" class="form-control mb-3" id="jumlah_roda_ban" placeholder="jumlah_roda_ban" value="{{ $kendaraan->truck->jumlah_roda_ban }}">
                    <label for="jumlah_roda_ban">Jumlah Roda Ban</label>
                </div>
                <div class="form-floating">
                    <input type="luas_area_kargo" name="luas_area_kargo" class="form-control mb-3" id="luas_area_kargo" placeholder="luas_area_kargo" value="{{ $kendaraan->truck->luas_area_kargo }}">
                    <label for="luas_area_kargo">Luas Area Kargo</label>
                </div>
            @else
                <div class="form-floating">
                    <input type="jumlah_roda_ban" name="jumlah_roda_ban" class="form-control mb-3" id="jumlah_roda_ban" placeholder="jumlah_roda_ban" >
                    <label for="jumlah_roda_ban">Jumlah Roda Ban</label>
                </div>
                <div class="form-floating">
                    <input type="luas_area_kargo" name="luas_area_kargo" class="form-control mb-3" id="luas_area_kargo" placeholder="luas_area_kargo">
                    <label for="luas_area_kargo">Luas Area Kargo</label>
                </div>
            @endif
        </div>

        <!-- Informasi Tambahan untuk Motor -->
        <div id="motor-fields" style="display: none;">
            @if ($kendaraan->motor)
                <div class="form-floating">
                    <input type="ukuran_bagasi" name="ukuran_bagasi" class="form-control mb-3" id="ukuran_bagasi" placeholder="ukuran_bagasi" value="{{ $kendaraan->motor->ukuran_bagasi }}">
                    <label for="ukuran_bagasi">Ukuran Bagasi</label>
                </div>
                <div class="form-floating">
                    <input type="kapasitas_bensin" name="kapasitas_bensin" class="form-control mb-3" id="kapasitas_bensin" placeholder="kapasitas_bensin" value="{{ $kendaraan->motor->kapasitas_bensin }}">
                    <label for="kapasitas_bensin">Kapasitas Bensin</label>
                </div>
            @else
                <div class="form-floating">
                    <input type="ukuran_bagasi" name="ukuran_bagasi" class="form-control mb-3" id="ukuran_bagasi" placeholder="ukuran_bagasi">
                    <label for="ukuran_bagasi">Ukuran Bagasi</label>
                </div>
                <div class="form-floating">
                    <input type="kapasitas_bensin" name="kapasitas_bensin" class="form-control mb-3" id="kapasitas_bensin" placeholder="kapasitas_bensin">
                    <label for="kapasitas_bensin">Kapasitas Bensin</label>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
