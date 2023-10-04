@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Daftar Tanggapan Auditee</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tanggapan Auditee</li>
        <li class="breadcrumb-item active">Daftar Tanggapan Auditee</li>
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
                <h5 class="card-title">Data Tanggapan Audite</h5>
              </div>

            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>

                  <th scope="col">Program Audit</th>
                  <th scope="col">Tanggal Kegiatan</th>
                  <th scope="col">Temuan Audit</th>
                  <th scope="col">Tanggapan Audit</th>

                  <th scope="col">Status</th>

                </tr>
              </thead>
              <tbody>
                @foreach($tanggapan as $item)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$item->kertasKerjaAudit->programKerjaAudit->pustakaAudit->judul}}</td>
                  <td>{{$item->kertasKerjaAudit->programKerjaAudit->perencanaanAudit->firstdate}} - {{$item->kertasKerjaAudit->programKerjaAudit->perencanaanAudit->enddate}}</td>
                  <td>{{$item->kertasKerjaAudit->temuan}}</td>
                  <td>
                    <span class="badge {{ $item->status == 1 ? 'bg-primary' : ($item->status == 2 ? 'bg-warning' : 'bg-light') }}">...</span>
                      {!!$item->tanggapan!!}
                   
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Satu
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('tanggapan_auditee_auditor_detail',['id'=> $item->id])}}">Detail</a></li>
                        @if($item->status == '2')
                        <li><a class="dropdown-item" href="">Terima Tanggapan</a></li>
                        <li><a class="dropdown-item" href="">Sanggah</a></li>
                        @endif
                        @if($item->status == '1')
                        <li><a class="dropdown-item" href="{{route('tindak_lanjut_audit_store',['id' => $item->id])}}">Tindak Lanjut</a></li>
                        @endif
                      </ul>
                    </div>
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