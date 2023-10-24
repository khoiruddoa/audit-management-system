@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manajemen Auditee</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Manajemen Auditee</li>
                    <li class="breadcrumb-item active">Tabel</li>
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
                                    <h5 class="card-title">Data Auditee</h5>
                                </div>
                                <div>
                                    <a href="{{ route('manajemen_auditee_create') }}" class="btn btn-outline-primary">Tambah
                                        Data</a>
                                </div>

                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Auditee</th>
                                        <th scope="col">Nama Auditee</th>
                                        <th scope="col">Penanggung Jawab</th>
                                        <th scope="col">Jabatan Unit Kerja</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($auditees as $auditee)
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $auditee->kode }}</td>
                                            <td>{{ $auditee->auditee }}</td>
                                            <td>{{ $auditee->user->name }}</td>
                                            <td>{{ $auditee->user->jabatan }}</td>
                                            <td>




                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Pilih Satu
                                                    </button>
                                                    <ul class="dropdown-menu">


                                                        <li><a class="dropdown-item"
                                                                href="{{ route('manajemen_auditee_detail', ['id' => $auditee->id]) }}">Detail</a>
                                                        </li>



                                                        <li><a class="dropdown-item"
                                                                href="{{ route('manajemen_auditee_delete', ['id' => $auditee->id]) }}"
                                                                onclick="return confirm('are you sure delete this data?')">Hapus</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('manajemen_auditee_edit', ['id' => $auditee->id]) }}">Edit</a>
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
