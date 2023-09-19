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
                                        <th scope="col">Nama Kegiatan</th>
                                        <th scope="col">Temuan Audit</th>
                                        <th scope="col">Data Umum</th>
                                        <th scope="col">Kondisi</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Sebab</th>
                                        <th scope="col">Rekomendasi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kertaskerja as $item)
                                        <tr>


                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->programKerjaAudit->pustakaAudit->judul }}</td>
                                            <td>{!! $item->temuan !!}</td>
                                            <td>{!! $item->data_umum !!}</td>
                                            <td>{!! $item->kondisi !!}</td>
                                            <td>{!! $item->kriteria !!}</td>
                                            <td>{!! $item->sebab !!}</td>
                                            <td>{!! $item->rekomendasi !!}</td>


                                            <td>

                                        

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#disablebackdrop{{ $item->id }}">
                                                    Tanggapi
                                                </button>
                                                <div class="modal fade" id="disablebackdrop{{ $item->id }}"
                                                    tabindex="-1" data-bs-backdrop="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tanggapan Audit</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{route('tanggapan_audit_store')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                            <div class="modal-body">
                                                                <trix-editor input="{{ $item->id }}" required>
                                                                </trix-editor>

                                                                <input type="hidden" name="kertas_kerja_audit_id"
                                                                    value="{{ $item->id }}">
                                                                <input id="{{ $item->id }}" type="hidden"
                                                                    name="tanggapan">
                                                                <label for="inputText"
                                                                    class="col-sm-2 col-form-label">Lampiran</label>

                                                                <input type="file" name="lampiran"
                                                                    class="form-controll mb-2" required>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


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
