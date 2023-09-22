@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Perencanaan Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Perencanaan Audit</li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Input Data Perencanaan Audit</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('perencanaan_audit_store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('kegiatan_id') is-invalid @enderror"
                                            name="kegiatan_id" aria-label="Default select example">
                                            <option selected disabled>=== Pilih Satu ===</option>
                                            @foreach ($kegiatan as $item)
                                                <option value="{{ $item->id }}">{{ $item->kegiatan }}</option>
                                            @endforeach
                                        </select>
                                        @error('kegiatan_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Jenis Audit</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="jenis_audit"
                                            class="form-control @error('jenis_audit') is-invalid @enderror" id="jenis_audit"
                                            value="{{ old('jenis_audit') }}" autofocus>
                                        @error('jenis_audit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Jenis Program Audit</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('jenis_program_audit') is-invalid @enderror"
                                                type="radio" name="jenis_program_audit" id="jenis_program_audit1"
                                                value="terencana">
                                            <label class="form-check-label" for="jenis_program_audit1">
                                                Terencana
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('jenis_program_audit') is-invalid @enderror"
                                                type="radio" name="jenis_program_audit" id="jenis_program_audit2"
                                                value="tidak terencana">
                                            <label class="form-check-label" for="jenis_program_audit2">
                                                Tidak Terencana
                                            </label>
                                        </div>
                                        @error('jenis_program_audit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </fieldset>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Tingkat Resiko</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input @error('tingkat_resiko') is-invalid @enderror"
                                                type="radio" name="tingkat_resiko" id="tingkat_resiko1" value="low">
                                            <label class="form-check-label" for="tingkat_resiko1">
                                                Low
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('tingkat_resiko') is-invalid @enderror"
                                                type="radio" name="tingkat_resiko" id="tingkat_resiko2" value="medium">
                                            <label class="form-check-label" for="tingkat_resiko2">
                                                Medium
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('tingkat_resiko') is-invalid @enderror"
                                                type="radio" name="tingkat_resiko" id="tingkat_resiko3" value="high">
                                            <label class="form-check-label" for="tingkat_resiko3">
                                                High
                                            </label>
                                        </div>
                                        @error('tingkat_resiko')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </fieldset>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Auditee</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('auditee_id') is-invalid @enderror"
                                            name="auditee_id" aria-label="Default select example">
                                            <option selected disabled>=== Pilih Satu ===</option>
                                            @foreach ($auditees as $item)
                                                <option value="{{ $item->id }}">{{ $item->auditee }}</option>
                                            @endforeach
                                        </select>
                                        @error('auditee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Periode Audit</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="periode"
                                            class="form-control   @error('periode') is-invalid @enderror" id="periode"
                                            value="{{ old('periode') }}" autofocus>
                                        @error('periode')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Rencana Kegiatan</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="firstdate"
                                            class="form-control   @error('firstdate') is-invalid @enderror" id="firstdate"
                                            value="{{ old('firstdate') }}" autofocus>
                                        @error('firstdate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror s/d <input type="date" name="enddate"
                                            class="form-control   @error('enddate') is-invalid @enderror" id="enddate"
                                            value="{{ old('enddate') }}" autofocus>
                                        @error('enddate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Dasar Audit</label>
                                    <div class="col-sm-10">

                                        <input id="b" type="hidden" name="dasar_audit">
                                        <trix-editor input="b"></trix-editor>
                                    </div>
                                </div>

                                <!-- <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Anggaran</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="anggaran"
                                            class="form-control   @error('anggaran') is-invalid @enderror" id="anggaran"
                                            value="{{ old('anggaran') }}" autofocus>
                                        @error('anggar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> -->



                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Lampiran Perencanaan</label>
                                    <div class="col-sm-10">
                                        <input name="file" type="file" id="formFile"
                                            class="form-control 
                      @error('file') is-invalid @enderror"
                                            id="file" value="{{ old('file') }}" autofocus>
                                        @error('file')
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
