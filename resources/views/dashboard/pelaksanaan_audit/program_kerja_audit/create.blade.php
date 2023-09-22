@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Program Kerja Audit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pelaksanaan audit</li>
                <li class="breadcrumb-item active">Tambah Program Kerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Program Kerja</h5>

                        <!-- General Form Elements -->
                        <form method="post" action="{{ route('program_kerja_audit_store') }}">
                            @csrf
                            <input type="hidden" name="perencanaan_audit_id" value="{{$audit->id}}">


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Objek Audit</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control" value="{{ $audit->auditee->auditee }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tahun Audit</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled name="periode" class="form-control" value="{{ $audit->periode }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Dilaksanakan Oleh</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="susunan_tim_id" aria-label="Default select example">
                                        <option selected disabled>=== Pilih Satu ===</option>


                                        @foreach ($susunan_tims as $item)
                                        <option value="{{ $item->id }}">{{ $item->auditor->user->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                                <div class="col-sm-10">
                                    <input type="date" name="waktu" class="form-control">
                                </div>
                            </div>

                            <div x-data="{ selectedOption: '', tahapan: '', selectOption: '', isDisabled: false }">


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Aktivitas Audit</label>
                                    <div class="col-sm-10">
                                        <div> <select x-model="selectedOption" :disabled="isDisabled" @change="tahapan = $event.target.selectedOptions[0].getAttribute('data-tahapan')" class="form-select" name="pustaka_audit_id" aria-label="Default select example">
                                                <option selected>=== Pilih Satu ===</option>
                                                @foreach ($program_kerja as $item)
                                                <option value="{{ $item->id }}" data-tahapan="{{ $item->tahapan }}">
                                                    {{ $item->judul }}
                                                </option>
                                                @endforeach
                                            </select></div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Tambah Aktivitas Baru
                                        </button>

                                        <!-- Modal -->


                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Langkah Audit</label>
                                    <div class="col-sm-10">
                                        <input id="x" type="hidden" name="tahapan">
                                        <trix-editor input="x" x-html="tahapan"></trix-editor>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                        <form action="{{route('pustaka_program_audit_out_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pustaka Baru</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-md-4 col-form-label">Judul Program</label>

                                            </div>
                                            <div class="row mb-3">

                                                <div class="col-sm-10">
                                                    <input type="text" name="judul" class="form-control" required>

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-md-4 col-form-label">Tahapan</label>

                                            </div>
                                            <div class="row mb-3">

                                                <div class="col-sm-10">

                                                    <input id="z" type="hidden" name="tahapan">
                                                    <input type="hidden" name="auditee_id" value="{{$audit->auditee_id}}">
                                                    <trix-editor input="z" id="editor"></trix-editor>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" onclick="validateTrixEditorContent()">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>

            </div>


        </div>
    </section>


</main><!-- End #main -->
<script>
    function validateTrixEditorContent() {
        // Dapatkan referensi ke editor Trix
        var trix = document.querySelector("#editor");

        // Dapatkan konten teks dari editor Trix
        var content = trix.editor.getDocument().toString().trim();

        // Periksa apakah konten kosong atau tidak
        if (content === "") {
            // Tampilkan pesan kesalahan jika konten kosong
            alert("Tahapan tidak boleh kosong");
        } else {
            // Lakukan pengiriman formulir atau tindakan lain jika konten valid
            // Misalnya, di sini Anda dapat mengirimkan formulir dengan JavaScript
            // document.querySelector('form').submit();
        }
    }
</script>
@endsection