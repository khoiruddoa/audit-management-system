@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Perencanaan Audit</li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>



                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Detail Tanggapan Audit</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Program Kerja Audit</div>
                                    <div class="col-lg-9 col-md-8">{{ $tanggapan->kertasKerjaAudit->programKerjaAudit->pustakaAudit->judul }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tanggal</div>
                                    <div class="col-lg-9 col-md-8">{{ $tanggapan->kertasKerjaAudit->tanggal }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Temuan</div>
                                    <div class="col-lg-9 col-md-8">{!! $tanggapan->kertasKerjaAudit->temuan !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Kondisi</div>
                                    <div class="col-lg-9 col-md-8">{!! $tanggapan->kertasKerjaAudit->kondisi !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Kriteria</div>
                                    <div class="col-lg-9 col-md-8">{!! $tanggapan->kertasKerjaAudit->kriteria !!}</div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Sebab</div>
                                    <div class="col-lg-9 col-md-8">{!!  $tanggapan->kertasKerjaAudit->sebab !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Akibat</div>
                                    <div class="col-lg-9 col-md-8">{!! $tanggapan->kertasKerjaAudit->akibat !!}</div>
                                </div>
                               
                               

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Rekomendasi</div>
                                    <div class="col-lg-9 col-md-8">{!! $tanggapan->kertasKerjaAudit->rekomendasi !!}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Batas Waktu</div>
                                    <div class="col-lg-9 col-md-8">{{ $tanggapan->kertasKerjaAudit->batas_waktu }} 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tim Auditor</div>
                                    <div class="col-lg-9 col-md-8">
                                       
                                        <div>
                                            {{$tanggapan->kertasKerjaAudit->programKerjaAudit->susunanTim->auditor->user->name}}
                                        </div>
                                      
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggapan Auditee</div>
                                    <div class="col-lg-9 col-md-8">{{ $tanggapan->tanggapan }} 
                                    </div>
                                </div>
                                
                                
                                
                                
                                <!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
    </section>


</main><!-- End #main -->
@endsection