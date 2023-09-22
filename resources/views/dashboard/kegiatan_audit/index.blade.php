@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kegiatan Audit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Kegiatan Audit</li>
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
                                <h5 class="card-title">Data Kegiatan Audit</h5>
                            </div>
                            <div>
                                <a href="{{ route('kegiatan_audit_create') }}" class="btn btn-outline-primary">Tambah
                                    Data</a>
                            </div>

                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($kegiatan as $item)
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kegiatan }}</td>
                                    <td>@if ($item->status == 0) On progress @else Finish @endif</td>
                                    <td>


                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" onchange="redirectToLink(this.value)">
                                                <option selected disabled>-- Pilih Satu --</option>
                                                <option value="{{ route('kegiatan_audit_edit', ['id' => $item->id]) }}">
                                                    Edit</option>
                                                <option value="{{ route('kegiatan_audit_delete', ['id' => $item->id]) }}">
                                                    Hapus</option>
                                                <option value="{{ route('kegiatan_audit_finish', ['id' => $item->id]) }}">
                                                    Selesai</option>
                                            </select>
                                        </div>

                                        <script>
                                            function redirectToLink(value) {
                                                if (value) {
                                                    window.location.href = value;
                                                }
                                            }
                                        </script>
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