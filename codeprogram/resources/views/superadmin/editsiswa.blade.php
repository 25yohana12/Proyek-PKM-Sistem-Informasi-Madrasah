@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2>Edit Data Kelas</h2>

    <form action="{{ route('superadmin.siswa.update', $siswa->siswa_id) }}" method="POST" enctype="multipart/form-data" id="editKelasForm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
        </div>

        <div class="mb-3">
            <label for="namaWali" class="form-label">Wali Kelas</label>
            <input type="text" name="namaWali" id="namaWali" class="form-control" value="{{ $siswa->namaWali }}">
        </div>

        <div class="mb-3">
            <label for="jumlahMurid" class="form-label">Jumlah Murid (Total)</label>
            <input type="number" name="jumlahMurid" id="jumlahMurid" class="form-control" 
                   value="{{ $siswa->jumlahMurid }}" readonly style="background-color: #f8f9fa;">
            <small class="text-muted">Otomatis dihitung dari jumlah siswa + siswi</small>
        </div>

        <div class="mb-3">
            <label for="jumlahSiswa" class="form-label">Jumlah Siswa (Laki-laki)</label>
            <input type="number" name="jumlahSiswa" id="jumlahSiswa" class="form-control" 
                   value="{{ $siswa->jumlahSiswa }}" oninput="calculateTotal()">
        </div>

        <div class="mb-3">
            <label for="jumlahSiswi" class="form-label">Jumlah Siswi (Perempuan)</label>
            <input type="number" name="jumlahSiswi" id="jumlahSiswi" class="form-control" 
                   value="{{ $siswa->jumlahSiswi }}" oninput="calculateTotal()">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>

        @if($siswa->gambar)
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini:</label><br>
                <img src="{{ asset('storage/' . $siswa->gambar) }}" alt="gambar" width="200" style="border-radius: 5px;">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('superadmin.siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
function calculateTotal() {
    const jumlahSiswa = parseInt(document.getElementById('jumlahSiswa').value) || 0;
    const jumlahSiswi = parseInt(document.getElementById('jumlahSiswi').value) || 0;
    const totalMurid = jumlahSiswa + jumlahSiswi;
    
    document.getElementById('jumlahMurid').value = totalMurid;
    
    // Visual feedback
    const jumlahMuridInput = document.getElementById('jumlahMurid');
    if (totalMurid > 0) {
        jumlahMuridInput.style.backgroundColor = '#d4edda';
        jumlahMuridInput.style.borderColor = '#28a745';
    } else {
        jumlahMuridInput.style.backgroundColor = '#f8f9fa';
        jumlahMuridInput.style.borderColor = '#ced4da';
    }
}

// Form validation
document.getElementById('editKelasForm').addEventListener('submit', function(e) {
    const jumlahSiswa = parseInt(document.getElementById('jumlahSiswa').value) || 0;
    const jumlahSiswi = parseInt(document.getElementById('jumlahSiswi').value) || 0;
    const jumlahMurid = parseInt(document.getElementById('jumlahMurid').value) || 0;
    
    // Validasi: jumlah murid harus sama dengan jumlah siswa laki-laki + perempuan
    if (jumlahMurid !== (jumlahSiswa + jumlahSiswi)) {
        e.preventDefault();
        alert('Error: Jumlah murid harus sama dengan jumlah siswa laki-laki + perempuan!');
        return false;
    }
    
    // Validasi: minimal harus ada 1 murid
    if (jumlahMurid === 0) {
        e.preventDefault();
        alert('Peringatan: Silakan masukkan jumlah siswa laki-laki dan/atau perempuan!');
        return false;
    }
    
    return true;
});

// Initialize calculation on page load
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
});
</script>
@endsection
