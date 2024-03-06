@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kertas Kerja Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('pelaksanaan_audit')}}">Pelaksanaan Audit</a></li>
                    <li class="breadcrumb-item"><a href="{{route('pelaksanaan_program_kerja_audit',['id' => $program_kerja->perencanaanAudit->id])}}">Program Kerja Audit</a> </li>
                    <li class="breadcrumb-item active">Kertas Kerja Audit</li>
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
                            <h5 class="card-title text-center">Ringkasan Program Audit</h5>


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Auditor</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control"
                                        value="{{ $program_kerja->susunanTim->auditor->user->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul Program Audit</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control"
                                        value="{{ $program_kerja->pustakaAudit->judul }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Prosedur Audit</label>
                                <div class="col-sm-10">
                                    {!! $program_kerja->tahapan !!}
                                </div>
                            </div>





                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Lihat Dokumen
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kelengkapan Dokumen</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <h5 class="card-title text-center">List Pemenuhan Data
                                                                        Audit</h5>
                                                                </div>

                                                            </div>
                                                            <!-- Table with stripped rows -->
                                                            <table class="table datatable">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">No</th>
                                                                        <th scope="col">Judul Dokumen</th>
                                                                        <th scope="col">Link Dokumen</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($dokumen as $item)
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                                            <td>{{ $item->judul_dokumen }}</td>


                                                                            @if ($item->link !== null)
                                                                                <td><a
                                                                                        href="{{ $item->link }}">{{ $item->nama_dokumen }}</a>
                                                                                </td>
                                                                            @else
                                                                                <td>Belum Upload Dokumen</td>
                                                                            @endif

                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                            <!-- End Table with stripped rows -->

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>




                <div class="row">
                    <div class="col-lg-10">

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-center">Kertas Kerja Audit</h5>
                                    </div>
                                    <div>
                                        <a href="{{ route('kertas_kerja_audit_create', ['id' => $program_kerja->id]) }}"
                                            class="btn btn-outline-primary">Tambah Data</a>
                                    </div>

                                </div>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Temuan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kertas_kerja as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>

                                                <td>{{ $item->temuan }}</td>
                                                <td>@if($item->status == '1') Sudah dikonfirmasi @else Belum dikonfirmasi @endif</td>
                                                <td>

                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            Pilih Satu
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('kertas_kerja_audit_detail', ['id' => $item->id]) }}">Detail</a>
                                                            </li>


                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('kertas_kerja_audit_edit', ['id' => $item->id]) }}">Edit</a>
                                                            </li>

                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('kertas_kerja_audit_delete', ['id' => $item->id]) }}">Hapus</a>
                                                            </li>
                                                            <li>@if($item->status == '1')
                                                                <a class="dropdown-item"
                                                                href="{{ route('kertas_kerja_audit_batal_konfirmasi', ['id' => $item->id]) }}">Batal konfirmasi</a>

                                                                @else
                                                                <a class="dropdown-item"
                                                                    href="{{ route('kertas_kerja_audit_konfirmasi', ['id' => $item->id]) }}">Konfirmasi</a>

                                                                   @endif
                                                                </li>

                                                        </ul>

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
