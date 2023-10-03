
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
                    <th scope="col">Status</th>
                    <th scope="col">Tindak Lanjut Auditee</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($tanggapan as $item)
                  <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$item->kertasKerjaAudit->programKerjaAudit->pustakaAudit->judul}}</td>
                 
                  <td>{{$item->kertasKerjaAudit->temuan}}</td>
                  <td>Mohon ditindak lanjuti</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#disablebackdrop{{ $item->id }}">
                      Tindak
                  </button>
                  <div class="modal fade" id="disablebackdrop{{ $item->id }}"
                      tabindex="-1" data-bs-backdrop="false">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Tindak Lanjut Audit</h5>
                                  <button type="button" class="btn-close"
                                      data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('tindak_lanjut_auditee_store')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                              <div class="modal-body">
                                  <trix-editor input="a{{ $item->id }}" required>
                                  </trix-editor>

                                  <input type="hidden" name="tanggapan_audit_id"
                                      value="{{ $item->id }}">
                                  <input id="a{{ $item->id }}" type="hidden"
                                      name="tindakan">
                                  <label for="inputText"
                                      class="col-sm-2 col-form-label">Lampiran</label>

                                  <input type="file" name="lampiran"
                                      class="form-controll mb-2" required>

                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                  <button type="submit"
                                      class="btn btn-primary">Simpan</button>
                              </div>
                              </form>
                          </div>
                      </div>
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

  