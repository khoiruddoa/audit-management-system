@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Daftar Tanggapan Audit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Temuan Audit</li>
                <li class="breadcrumb-item active">Daftar Tanggapan Audit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">form Tanggapan Audit</h5>
                            </div>


                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Program Audit</th>
                                    <th scope="col">Temuan</th>
                                    <!-- <th scope="col">Data Umum</th>
                                        <th scope="col">Kondisi</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Sebab</th>
                                        <th scope="col">Rekomendasi</th> -->
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kertaskerja as $item)
                                <tr>


                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->programKerjaAudit->pustakaAudit->judul }}</td>
                                    <td>{!! $item->temuan !!}</td>

                                    <td>
                                        @php
                                        $tanggapanAudit = $item->tanggapanAudit->first();
                                        @endphp
                                        @if($tanggapanAudit && in_array($tanggapanAudit->status, [1, 2]))
                                        <button type="button" class="btn btn-success" disabled>
                                            Sudah Ditanggapi
                                        </button>
                                        @elseif($tanggapanAudit && in_array($tanggapanAudit->status, [0]))
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#obackdrop{{ $item->id }}">
                                            Tinjau Ulang
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop{{ $item->id }}">
                                            Tanggapi
                                        </button>
                                        @endif

                                        <div class="modal fade" id="disablebackdrop{{ $item->id }}" tabindex="-1" data-bs-backdrop="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tanggapan Audit</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('tanggapan_audit_store')}}" method="post">
                                                        @csrf


                                                        <div class="modal-body" x-data="{ showOptional: false }">
                                                            <legend class="col-form-label col-sm-4 pt-0">Tanggapan Auditee</legend>
                                                            <fieldset class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="option" id="option1" value="1" x-on:click="showOptional = false" checked="false">
                                                                        <label class="form-check-label" for="option1">
                                                                            Setuju dengan pendapat Auditor
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="option" id="option2" value="2" x-on:click="showOptional = true" checked="false">
                                                                        <label class="form-check-label" for="option2">
                                                                            Sanggah
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </fieldset>

                                                            <div id="optional" x-show="showOptional">
                                                                <trix-editor input="{{ $item->id }}" required></trix-editor>
                                                                <input type="hidden" name="kertas_kerja_audit_id" value="{{ $item->id }}">
                                                                <input id="{{ $item->id }}" type="hidden" name="tanggapan">
                                                                <label for="inputText" class="col-sm-2 col-form-label">Lampiran</label>
                                                                <input type="text" name="lampiran" class="form-controll mb-2" required>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal 2 -->
                                        <div class="modal fade" id="obackdrop{{ $item->id }}" tabindex="-1" data-bs-backdrop="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tinjau</h5>

                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('tanggapan_audit_restore')}}" method="post">
                                                        @csrf


                                                        <div class="modal-body">
                                                            <h5>Tanggapan Auditor :</h5>
                                                            <p>
                                                                {!! $item->tanggapanAudit->first()->komentar_auditor !!}
                                                            </p>
                                                            <legend class="col-form-label col-sm-4 pt-0">Tanggapan Auditee</legend>
                                                            <fieldset class="row mb-3">
                                                                <div class="col-sm-10">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="option" id="option1" value="1" required>
                                                                        <label class="form-check-label" for="option1">
                                                                            Setuju dengan pendapat Auditor
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </fieldset>

                                                            <div id="optional" style="display: none;">
                                                                <trix-editor input="{{ $item->id }}"></trix-editor>
                                                                <input type="hidden" name="id" value="{{ $item->tanggapanAudit->first()->id }}">
                                                                <input id="{{ $item->id }}" type="hidden" name="tanggapan">
                                                                <label for="inputText" class="col-sm-2 col-form-label">Lampiran</label>
                                                                <input type="text" name="lampiran" class="form-controll mb-2">
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td> <a href="{{route('temuan_audit_detail_temuan',['id' => $item->id])}}" class="btn btn-primary">
                                            Detail
                                        </a></td>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection