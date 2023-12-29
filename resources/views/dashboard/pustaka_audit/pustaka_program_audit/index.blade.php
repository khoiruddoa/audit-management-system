@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pustaka Program Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pustaka Audit</li>
                    <li class="breadcrumb-item active">Pustaka Program Audit</li>
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
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Daftar Pustaka Program Audit</h5>
                                </div>
                                <div>
                                    <a href="{{route('pustaka_program_audit_create')}}" class="btn btn-outline-primary">Tambah Data</a>
                                </div>

                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Judul Program</th>
                                        <th scope="col">Tahapan</th>
                                        <th scope="col">Lampiran</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $item)
                                    <tr>

                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $item->auditee->auditee }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{!! $item->tahapan !!}</td>
                                        <td><a href="{{ $item->lampiran}}">download</a></td>
                                        <td>
                                            <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Pilih Satu
                                            </button>
                                            <ul class="dropdown-menu">


                                                <li><a class="dropdown-item" href="{{route('pustaka_program_audit_edit', ['id' => $item->id])}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="{{route('pustaka_program_audit_delete', ['id' => $item->id])}}">Hapus</a></li>


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
