@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Detail</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pelaksanaan Audit</li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>



                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Detail Perencanaan Audit</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Rencana Audit</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->kegiatan->kegiatan }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Jenis Audit</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->jenis_audit }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Jenis Program Audit</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->jenis_program_audit }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Tingkat Resiko</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->tingkat_resiko }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Divisi</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->auditee->auditee }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Dasar Audit</div>
                                        <div class="col-lg-9 col-md-8">{!! $audit->dasar_audit !!}</div>
                                    </div>
                                 
                                    @if($audit->file)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Lampiran</div>
                                        <div class="col-lg-9 col-md-8"><a href="{{ $audit->file }}">Download</a> </div>
                                    </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Periode</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->periode }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tanggal Pelaksanaan</div>
                                        <div class="col-lg-9 col-md-8">{{ $audit->firstdate }} s/d {{ $audit->enddate }}
                                        </div>
                                    </div>

                                    
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tim Auditor</div>
                                    <div class="col-lg-9 col-md-8">
                                        @foreach($audit->susunanTim as $tim)
                                        <div>
                                            {{$tim->auditor->user->name}}
                                        </div>
                                        @endforeach
                                    </div>

                                </div>






                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
        </section>

    </main><!-- End #main -->
@endsection
