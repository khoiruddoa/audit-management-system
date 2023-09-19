@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pustaka Referensi Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pustaka Audit</li>
                    <li class="breadcrumb-item active">Pustaka Referensi Audit</li>
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
                                    <h5 class="card-title">Daftar Pustaka Referensi Audit</h5>
                                </div>
                                <div>
                                    <a href="{{route('pustaka_referensi_audit_create')}}" class="btn btn-outline-primary">Tambah Data</a>
                                </div>

                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Program</th>
                                        <th scope="col">Referensi</th>
                                        <th scope="col">Lampiran</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $item)
                                    <tr>
                                        
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $item->judul }}</td>
                                        <td>{!! $item->referensi !!}</td>
                                        <td>{{ $item->lampiran}}</td>
                                        <td>

                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>==Pilih Satu==</option>
                                                    <option value="1">Detail</option>
                                                    <option value="2">Edit</option>
                                                    <option value="3">Hapus</option>
                                                </select>
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
