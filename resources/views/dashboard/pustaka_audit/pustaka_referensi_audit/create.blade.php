
 @extends('dashboard.layouts.main')

 @section('container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pustaka Referensi Audit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pustaka Referensi Audit</li>
          <li class="breadcrumb-item active">Data Baru</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-10">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Input Data Referensi Audit</h5>
  
                <!-- General Form Elements -->
                <form action="{{route('pustaka_referensi_audit_store')}}" method="post">
                  @csrf
                  
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Judul Referensi</label>
                    <div class="col-sm-10">
                      <input type="text" name="judul" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Referensi</label>
                    <div class="col-sm-10">
        
                      <input id="x" type="hidden" name="referensi">
                      <trix-editor input="x"></trix-editor>
                    </div>
                  </div>
        
                  
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                      <input class="form-control" name="lampiran" type="file" id="formFile">
                    </div>
                  </div>
                  <div class="row mb-3">
                    
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
  
                </form><!-- End General Form Elements -->
  
              </div>
            </div>
  
          </div>
  
          
        </div>
      </section>


  </main><!-- End #main -->
  @endsection

  