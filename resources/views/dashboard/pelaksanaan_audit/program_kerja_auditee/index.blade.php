@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Program Kerja Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Kelengkapan Dokumen</li>
                  
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
    


            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title text-center">Program Kerja Audit</h5>
                                </div>
                               

                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Aktivitas Audit</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Kelengkapan Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($program_kerja as $item)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$item->pustakaAudit->judul}}</td>
                                            <td></td>
                                            <td><a href="{{route('kelengkapan_document_auditee',['id' => $item->id])}}" class="btn btn-secondary"><i class="bi bi-collection"></i></a></td>
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
