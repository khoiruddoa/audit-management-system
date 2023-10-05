
 @extends('dashboard.layouts.main')

 @section('container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Temuan Audit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Temuan Audit</li>
          <li class="breadcrumb-item active">Daftar Temuan Audit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Data Temuan Audit</h5>
                  
                </div>
               
            </div>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Objek Audit</th>
                    <th scope="col">Program Audit</th>
                    <th scope="col">Tanggal Kegiatan</th>
                    <th scope="col">Temuan Audit</th>
                    <th scope="col">Sudah ditanggapi</th>
                    <th scope="col">Tinjau Ulang</th>
                     <th scope="col">Tindak Lanjut</th>

                    
                    <th scope="col">Aksi</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($audits as $item)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->perencanaanAudit->kegiatan->kegiatan}}</td>
                    <td>{{$item->perencanaanAudit->auditee->auditee}}</td>
                    <td>{{$item->pustakaAudit->judul}}</td>
                    <td>{{$item->perencanaanAudit->firstdate}} - {{$item->perencanaanAudit->enddate}}</td>
                    
                   
                    <td>{{$item->kertasKerjaAudit->count()}}</td>
                  <td>@php
                $tanggapanAudit = $item->kertasKerjaAudit->filter(function($tanggapan) {
                    return $tanggapan->tanggapanAudit->count() > 0;
                });
                echo $tanggapanAudit->count();
                @endphp</td>
                <td>@php
                $tanggapanAudit = $item->kertasKerjaAudit->filter(function($tanggapan) {
                    return $tanggapan->tanggapanAudit->where('status','0')->count() > 0;
                });
                echo $tanggapanAudit->count();
                @endphp</td>
                <td>@php
                $tanggapanAudit = $item->kertasKerjaAudit->filter(function($tanggapan) {
                    return $tanggapan->tanggapanAudit->where('status','1')->count() > 0;
                });
                echo $tanggapanAudit->count();
                @endphp</td>
                    
                    <td> <a href="{{route('temuan_audit_detail', ['id' => $item->id])}}" class="btn btn-primary">Detail</a></td>
                   
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

  