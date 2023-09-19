@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Susunan Tim</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pelaksanaan Audit</li>
                    <li class="breadcrumb-item active">Susunan Tim</li>
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
                                    <h5 class="card-title text-center">Susunan Tim</h5>
                                </div>
                                <div>
                                    <a href="{{route('susunan_tim_create', ['id' => $audit->id])}}" class="btn btn-outline-primary">Tambah Data</a>
                                </div>

                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Personil</th>
                                        <th scope="col">Posisi Personil</th>

                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($audit->susunanTim as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->auditor->user->name }}</td>
                                            <td>{{ $item->posisi }}</td>
                                            <td>

                                                <a href="{{ route('susunan_tim_delete', ['id' => $item->id]) }}"
                                                    class="btn btn-primary">Hapus</a>
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
