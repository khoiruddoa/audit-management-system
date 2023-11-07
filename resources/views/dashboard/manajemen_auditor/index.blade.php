@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">
      

        <div class="pagetitle">
            <h1>Manajemen Auditor</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Data Auditor</li>
                   
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
                                    <h5 class="card-title">Data Auditor</h5>
                                </div>
                                <div>
                                    <a href="{{ route('manajemen_auditor_create') }}" class="btn btn-outline-primary">Tambah
                                        Data</a>
                                </div>


                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Inisial</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($auditors as $auditor)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $auditor->user->nip }}</td>
                                            <td>{{ $auditor->user->name }}</td>
                                            <td>{{ $auditor->user->inisial }}</td>
                                            <td>

                                                <a href="{{ route('manajemen_auditor_delete', ['id' => $auditor->id]) }}"
                                                    class="btn btn-primary"  onclick="return confirm('are you sure delete this data?')">Hapus</a>
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
