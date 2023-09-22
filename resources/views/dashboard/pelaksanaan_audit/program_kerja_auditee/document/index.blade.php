@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pemenuhan Dokumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pelaksanaan Audit</li>
                <li class="breadcrumb-item active">Program Kerja Audit</li>
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
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">List Dokumen</h5>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Program Audit</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" value=""> -->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Objek Audit</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" value=""> -->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Rencana</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" value=""> -->
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun Audit</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled name="periode" class="form-control" value=""> -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Audit</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" value=""> -->
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

                                    <td><a href="{{$item->link}}">Get Link</a></td>

                                    <td>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModals{{$item->id}}">Upload</button>
                                        <form action="{{route('upload_link_document',['id'=> $item->id])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal fade" id="exampleModals{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Link Dokumen</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-md-4 col-form-label">Link</label>

                                                            </div>
                                                            <div class="row mb-3">

                                                                <div class="col-sm-10">
                                                                    <input type="text" name="link" class="form-control" value="{{$item->link}}" required>

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


@endsection