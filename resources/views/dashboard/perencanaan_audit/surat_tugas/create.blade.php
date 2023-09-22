@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Surat Tugas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pelaksanaan audit</li>
                    <li class="breadcrumb-item active">Surat Tugas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body mt-4">

                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Surat Tugas</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#bordered-profile" type="button" role="tab"
                                        aria-controls="profile" aria-selected="false">Preview Surat Tugas</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2" id="borderedTabContent">
                                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="card-body">
                                        <h5 class="card-title">Input Surat Tugas</h5>

                                        <!-- General Form Elements -->
                                        <form method="post" action="{{ route('surat_tugas_store') }}">
                                            @csrf
                                            <input type="hidden" name="perencanaan_audit_id" value="{{$audit->id}}">

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Nomor Surat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nomor_surat" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Surat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tanggal_surat" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Tujuan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tujuan" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Tempat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tempat" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">

                                                <div class="row mb-3">
                                                    <label for="inputText"
                                                        class="col-sm-2 col-form-label">Keterangan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="keterangan" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Penanda
                                                        Tangan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="penanda_tangan" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Jabatan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="jabatan" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="inputText"
                                                        class="col-sm-2 col-form-label">Tembusan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tembusan" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>

                                        </form><!-- End General Form Elements -->

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="bordered-profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                   










                                   
                            
                                    <div class="area">
                                      <div class="row m-4">
                                          <div class="col-md-12">
                                              <h1>Surat Tugas</h1>
                                              <hr>
                              
                                              <div class="row detail-tugas">
                                                  <div class="col-md-6">
                                                      
                                                      <p><strong>Tanggal:</strong>{{$suratTugas->tanggal_surat ?? null}}</p>
                                                      
                                                  </div>
                                                  
                                              </div>
                              
                                              <div class="deskripsi-tugas">
                                                  
                                                  <p>Surat ini disampaikan kepada : </p>

                                                  </div>
                                                  
                                                 
                                                 
                                                  <div class="col-md-6">
                                                     
                                                    <p><strong>Nama:</strong> </p> @foreach ($audit->susunanTim as $item)<p>
                                                        {{$loop->iteration ?? null}}. {{$item->auditor->user->name ?? null}} <strong>Jabatan:</strong> {{$item->posisi ?? null }}</p>
                                                        @endforeach
                                                    <p><strong>Departemen:</strong> SPI</p>
                                                </div>
                                               

                                              <div class="tindakan">
                                                  <p>Dalam rangka melaksanakan tugas audit yang diperlukan, kami dengan ini menugaskan rekan-rekan untuk melakukan audit di {{$audit->auditee->auditee ?? null}}.</p>
                                                  
                                              </div>


                                              <div>
                                                <p>Mohon rekan-rekan melakukan tugas audit dengan cermat dan teliti. Harap melaporkan hasil audit kepada [Penanda Tangan] dengan salinan tembusan kepada [Jabatan] pada akhir audit.

                                                    Demikian surat tugas audit ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.
                                                    
                                                    Hormat kami,
                                                    
                                                    [Penanda Tangan]
                                                    [Jabatan]
                                                    
                                                    </p>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                


                                  <style>
                                    .area * {
                                        
                                        font-family: "Times New Roman", serif;
                                       
                                    }
                            
                                    h1, h4 {
                                        text-align: center;
                                    }
                            
                                    hr {
                                        border: none;
                                        border-top: 1px solid black;
                                    }
                            
                                    .detail-tugas {
                                        margin-bottom: 20px;
                                    }
                            
                                    .detail-tugas p {
                                        margin-bottom: 5px;
                                    }
                            
                                    .deskripsi-tugas, .tindakan {
                                        margin-bottom: 20px;
                                    }
                            
                                    .tindakan ul {
                                        padding-left: 20px;
                                    }
                                </style>
















                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>


            </div>
        </section>


    </main><!-- End #main -->
@endsection
