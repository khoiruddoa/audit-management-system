
 @extends('dashboard.layouts.main')

 @section('container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Tindak Lanjut Auditee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tindak Lanjut Auditee</li>
          <li class="breadcrumb-item active">Daftar Tindak Lanjut Auditee</li>
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
                    <h5 class="card-title">Data Tindak Lanjut Audite</h5>
                </div>
               
            </div>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
              
                    <th scope="col">Program Audit</th>
                   
                    <th scope="col">Temuan Audit</th>
                    <th scope="col">Tindak Lanjut Audit</th>
                    
                    <th scope="col">Status</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($tindakLanjut as $item)
                  <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$item->tanggapanAudit->kertasKerjaAudit->programKerjaAudit->pustakaAudit->judul}}</td>
                  
                  <td>{{$item->tanggapanAudit->kertasKerjaAudit->temuan}}</td>
                  <td>{!!$item->tindakan!!}</td>
                  <td><div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example"
                        onchange="redirectToLink(this.value)">
                        <option selected disabled>-- Pilih Satu --</option>
                        <option value="">Detail</option>
                        <option
                            value="">
                            Terima Tindak Lanjut</option>
                        <option
                            value="">
                          </option>
                    </select>
                </div>

                <script>
                    function redirectToLink(value) {
                        if (value) {
                            window.location.href = value;
                        }
                    }
                </script></td>
                    {{-- <td>{{$item->perencanaanAudit->rencana}}</td>
                    <td>{{$item->perencanaanAudit->auditee->auditee}}</td>
                    <td>{{$item->pustakaAudit->judul}}</td>
                    <td>{{$item->perencanaanAudit->firstdate}} - {{$item->perencanaanAudit->enddate}}</td>
                    
                   
                    <td>{{$item->kertasKerjaAudit->count()}}</td>
                    
                    <td> <a href="{{route('temuan_audit_detail', ['id' => $item->id])}}" class="btn btn-primary">Tanggapi</a></td>
                    --}}
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

  