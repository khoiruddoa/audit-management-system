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
                                        <input type="text" disabled class="form-control"
                                            value="{{ $audit->auditee->auditee }}">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tahun Audit</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled name="periode" class="form-control"
                                            value="{{ $audit->periode }}">
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

                                            <input type="text" name="judul"
                                            class="form-control mb-2" x-on:input="selectedOption = ''; isDisabled = $event.target.value !== ''">
                                    

                                            <select x-model="selectedOption" :disabled="isDisabled"
                                                @change="tahapan = $event.target.selectedOptions[0].getAttribute('data-tahapan')"
                                                class="form-select" name="pustaka_audit_id" aria-label="Default select example">
                                                <option selected>=== Pilih Satu ===</option>
                                                @foreach ($program_kerja as $item)
                                                    <option value="{{ $item->id }}" data-tahapan="{{ $item->tahapan }}">
                                                        {{ $item->judul }}</option>
                                                @endforeach
                                            </select>
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

                        </div>
                    </div>

                </div>


            </div>
        </section>


    </main><!-- End #main -->
@endsection
