@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pemenuhan Dokumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('perencanaan_audit')}}">Perencanaan Audit</a></li>
                <li class="breadcrumb-item"><a href="{{route('program_kerja_audit',['id' => $audit->id])}}">Program Kerja Audit</a></li>
                <li class="breadcrumb-item active">Dokumen</li>

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
                        <h5 class="card-title text-center">List Dokumen</h5>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Program Audit</label>
                            <div class="col-sm-10">
                              
                            <input type="text" disabled class="form-control" value="{{$audit->pustakaAudit->judul}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Objek Audit</label>
                            <div class="col-sm-10">
                                 <input type="text" disabled class="form-control" value="{{$audit->perencanaanAudit->auditee->auditee}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Rencana</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="{{$audit->perencanaanAudit->kegiatan->kegiatan}}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun Audit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled name="periode" class="form-control" value="{{$audit->perencanaanAudit->periode}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Audit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" value="{{$audit->perencanaanAudit->firstdate}} s/d {{$audit->perencanaanAudit->enddate}}">
                            </div>
                        </div>




                    </div>
                </div>

            </div>


        </div>






















        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-center">List Pemenuhan Data Audit</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Data
                                </button>
                            </div>

                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Dokumen</th>
                                    <th scope="col">Tempat</th>
                                    <th scope="col">Link Dokumen</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dokumen as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->judul_dokumen}}</td>

                                    <td><a href="{{$item->tempat}}">Get Link</a></td>

                                    <td><a href="{{$item->link}}">{{$item->nama_dokumen}}</a></td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Pilih Satu
                                            </button>
                                            <ul class="dropdown-menu">

                                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModals{{$item->id}}">Edit</button></li>
                                                <li><a class="dropdown-item" href="{{route('program_kerja_audit_document_delete',['id'=>$item->id])}}">Hapus</a></li>
                                            </ul>
                                        </div>
                                        <form action="{{route('program_kerja_audit_document_update',['id'=> $item->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal fade" id="exampleModals{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Dokumen</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-md-4 col-form-label">Judul Dokumen</label>

                                                            </div>
                                                            <div class="row mb-3">

                                                                <div class="col-sm-10">
                                                                    <input type="text" name="judul_dokumen" class="form-control" value="{{$item->judul_dokumen}}" required>

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-md-4 col-form-label">Tempat Upload Dokumen</label>

                                                            </div>
                                                            <div class="row mb-3">

                                                                <div class="col-sm-10">
                                                                    <input type="text" name="tempat" value="{{$item->tempat}}" class="form-control" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
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

<form action="{{route('program_kerja_audit_document_store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokumen Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="inputText" class="col-md-4 col-form-label">Judul Dokumen</label>

                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-10">
                            <input type="text" name="judul_dokumen" class="form-control" required>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-md-4 col-form-label">Tempat Upload Dokumen</label>

                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-10">
                            <input type="text" name="tempat" class="form-control" required>
                            <input type="hidden" name="program_kerja_audit_id" value="{{$id}}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</form>



@endsection