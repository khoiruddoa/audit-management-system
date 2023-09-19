@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kertas Kerja Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pelaksanaan Audit</li>
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
                                    <a href="{{ route('kertas_kerja_audit_create',['id' => $program_kerja->id]) }}"
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
                                        <th scope="row">{{$loop->iteration}}</th>
                                        
                                        <td>{{$item->temuan}}</td>
                                        <td>test</td>
                                        <td>

                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example"
                                                    onchange="redirectToLink(this.value)">
                                                    <option selected disabled>-- Pilih Satu --</option>
                                                    <option value="{{route('kertas_kerja_audit_detail', ['id' => $item->id])}}">Detail</option>
                                                    <option value="{{route('kertas_kerja_audit_edit', ['id' => $item->id])}}">Edit</option>
                                                   
                                                    <option
                                                        value="{{route('kertas_kerja_audit_delete', ['id' => $item->id])}}">
                                                        Hapus</option>
                                                       
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
