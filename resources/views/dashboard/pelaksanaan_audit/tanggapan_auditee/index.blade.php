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
                    <span class="badge {{ $item->status == 1 ? 'bg-success' : ($item->status == 2 ? 'bg-warning' : 'bg-primary') }}">...</span>
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
                        <li> <button type="button"  class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#disablebackdrop{{ $item->id }}">
                            Sanggah
                          </button></li>
                        @endif
                        @if($item->status == '1')
                        <li><a class="dropdown-item" href="{{route('tindak_lanjut_audit_store',['id' => $item->id])}}">Tindak Lanjut</a></li>
                        @endif
                      </ul>
                    </div>
                  </td>
                </tr>
                <div class="modal fade" id="disablebackdrop{{ $item->id }}" tabindex="-1" data-bs-backdrop="false">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('sanggah_tanggapan')}}" method="post">
                        @csrf
                        
                        <div class="modal-body">
                          <legend class="col-form-label col-sm-4 pt-0">Sanggahan Auditor</legend>
                          

                         
                            <trix-editor input="{{ $item->id }}"></trix-editor>
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input id="{{ $item->id }}" type="hidden" name="komentar_auditor">

                          
                        </div>


                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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