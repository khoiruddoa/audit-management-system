@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manajemen Role</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/manajemen_role">Manajemen Role</a></li>
                    <li class="breadcrumb-item active">Data Baru</li>
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
                            <h5 class="card-title">Input Role</h5>
                            <!-- General Form Elements -->
                            <form action="{{ route('manajemen_role_store') }}" method="post">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Role</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            value="{{ old('name') }}" autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>


            </div>
        </section>


    </main><!-- End #main -->
@endsection
