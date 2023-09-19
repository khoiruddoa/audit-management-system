@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kertas Kerja Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pelaksanaan_audit') }}">Program Kerja Audit</a></li>
                    <li class="breadcrumb-item active">Kertas Kerja Audit</li>
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

                                    <h5 class="card-title">Detail Kertas Kerja</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Tanggal</div>
                                        <div class="col-lg-9 col-md-8">{{$kertas->tanggal}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Aktivitas Audit</div>
                                        <div class="col-lg-9 col-md-8">{{$kertas->programKerjaAudit->pustakaAudit->judul}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Temuan</div>
                                        <div class="col-lg-9 col-md-8">{{$kertas->temuan}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Data Umum</div>
                                        <div class="col-lg-9 col-md-8">{!!$kertas->data_umum!!}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Kondisi</div>
                                        <div class="col-lg-9 col-md-8">{!!$kertas->kondisi!!}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Kriteria</div>
                                        <div class="col-lg-9 col-md-8">{!!$kertas->kondisi!!}</div>
                                    </div>

                                    

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Sebab</div>
                                        <div class="col-lg-9 col-md-8">{!!$kertas->sebab!!}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Rekomendasi</div>
                                        <div class="col-lg-9 col-md-8">{!!$kertas->rekomendasi!!}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Batas Waktu</div>
                                        <div class="col-lg-9 col-md-8">{{$kertas->batas_waktu}}</div>
                                    </div>



                                </div>




                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main><!-- End #main -->
@endsection
