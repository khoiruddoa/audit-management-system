@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Program Kerja Audit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('pelaksanaan_audit')}}">Pelaksanaan Audit</a></li>
                <li class="breadcrumb-item active">Program Kerja Audit</li>
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
                        <h5 class="card-title text-center">Ringkasan Penugasan</h5>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Type Audit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="{{$audit->jenis_audit}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Objek Audit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="{{$audit->auditee->auditee}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Rencana</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="{{$audit->kegiatan->kegiatan}}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun Audit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled name="periode" class="form-control" value="{{$audit->periode}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Audit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="{{$audit->firstdate}} s/d {{$audit->enddate}}">
                            </div>
                        </div>



                        <div class="card-body">
                            <h5 class="card-title text-center">Susunan Tim</h5>

                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Posisi Penugasan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($susunan_tims as $susunan_tim)
                                    <tr>

                                        <td>{{$susunan_tim->auditor->user->name}}</td>
                                        <td>{{$susunan_tim->posisi}}</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
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
                                <h5 class="card-title text-center">Program Kerja Audit</h5>
                            </div>
                            <div>
                                <a href="{{route('program_kerja_audit_create', ['id' => $audit->id])}}" class="btn btn-outline-primary">Tambah Data</a>
                            </div>

                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Aktivitas Audit</th>
                                    <th scope="col">PIC</th>
                                    <th scope="col">Kelengkapan Dokumen</th>
                                    <th scope="col">Kertas Kerja Audit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($program_kerja as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->pustakaAudit->judul}}</td>

                                    <td>{{$item->susunanTim->auditor->user->name}}</td>
                                    <td><a href="{{route('program_kerja_audit_document',['id' => $item->id])}}" class="btn btn-secondary"><i class="bi bi-collection"></i></a></td>



                                    <td><a href="{{route('kertas_kerja_audit',['id' => $item->id])}}" class="btn btn-secondary"><i class="bi bi-collection"></i></a></td>
                                    </td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Pilih Satu
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{route('program_kerja_audit_detail', ['id' => $item->id])}}">Detail</a></li>


                                                <li><a class="dropdown-item" href="{{route('program_kerja_audit_edit', ['id' => $item->id])}}">Edit</a></li>

                                                <li><a class="dropdown-item" href="{{route('program_kerja_audit_delete', ['id' => $item->id])}}">Hapus</a></li>
                                                <li><a class="dropdown-item" href="{{route('pelaksanaan_program_kerja_audit_finish', ['id' => $item->id])}}">Selesai</a></li>


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