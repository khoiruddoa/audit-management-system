@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pustaka Program Audit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pustaka Program Audit</li>
                <li class="breadcrumb-item active">Data Baru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data Program Audit</h5>

                        <!-- General Form Elements -->
                        <form action="{{route('pustaka_program_audit_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Divisi</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('auditee_id') is-invalid @enderror" name="auditee_id" aria-label="Default select example">
                                        <option selected disabled>=== Pilih Satu ===</option>
                                        @foreach ($divisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->auditee }}</option>
                                        @endforeach
                                    </select>
                                    @error('auditee_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul Program</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control  @error('judul') is-invalid @enderror">
                                    @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tahapan</label>
                                <div class="col-sm-10">

                                    <input id="x" type="hidden" name="tahapan">
                                    <trix-editor input="x"></trix-editor>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Lampiran</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" type="file" id="formFile">
                                    @error('lampiran')
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


</main><!-- End #main -->
@endsection
