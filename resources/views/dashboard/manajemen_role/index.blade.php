@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manajemen Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                  
                    <li class="breadcrumb-item active">Manajemen Role</li>
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
                                    <h5 class="card-title">Data Role</h5>
                                </div>
                                <div>
                                    <a href="{{route('manajemen_role_create')}}" class="btn btn-outline-primary">Tambah
                                        Role</a>
                                </div>


                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>

                                        <th scope="col">Nama Role</th>

                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>

                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('manajemen_role_detail', ['id' => $item->id]) }}">Detail</a>
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
