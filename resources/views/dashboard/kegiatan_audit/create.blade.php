@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Kegiatan Audit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kegiatan_audit') }}">Kegiatan Audit</a></li>
        <li class="breadcrumb-item active">Data Baru</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Input Data Kegiatan</h5>

            <!-- General Form Elements -->
            <form action="{{route('kegiatan_audit_store')}}" method="post">
              @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                <div class="col-sm-10">
                  <input type="text" required name="kegiatan" class="form-control  @error('kegiatan') is-invalid @enderror" id="kegiatan" value="{{ old('kegiatan') }}" autofocus>
                  @error('kegiatan')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Anggaran</label>
                <div class="col-sm-10">
                  <input type="text" required name="anggaran" id="anggaran" class="form-control  @error('anggaran') is-invalid @enderror" id="anggaran" value="{{ old('anggaran') }}">
                  @error('anggaran')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>


              <div class="row mb-3">

                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>


    </div>
  </section>

  <script>
    document.getElementById('anggaran').addEventListener('input', function() {
      // Ambil nilai input
      let anggaranInput = this.value;

      // Hilangkan semua karakter selain digit (angka)
      anggaranInput = anggaranInput.replace(/\D/g, '');

      // Format nilai dengan pemisah ribuan
      anggaranInput = Number(anggaranInput).toLocaleString('id-ID');

      // Masukkan kembali nilai yang telah diformat ke input
      this.value = anggaranInput;
    });
  </script>

</main><!-- End #main -->
@endsection