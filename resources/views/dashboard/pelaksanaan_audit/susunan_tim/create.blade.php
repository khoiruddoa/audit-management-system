
 @extends('dashboard.layouts.main')

 @section('container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Susunan Tim</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pelaksanaan audit</li>
          <li class="breadcrumb-item active">Tambah susunan tim</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-10">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Input Susunan Tim</h5>
  
                <!-- General Form Elements -->
                <form method="post" action="{{route('susunan_tim_store')}}">
                  @csrf
                 <input type="hidden" name="perencanaan_audit_id" value="{{$audit->id}}">
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Nama Anggota</label>
                    <div class="col-sm-10">
                      <select class="form-select @error('auditor_id') is-invalid @enderror" name="auditor_id" aria-label="Default select example">
                        <option selected disabled>=== Pilih Satu ===</option>
                        @foreach ($auditors as $item)
                            
          
                        <option value="{{$item->id}}">{{$item->user->name}}</option>
                        @endforeach
                      </select>
                      @error('auditor_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Posisi Anggota</label>
                    <div class="col-sm-10">
                      <select class="form-select @error('posisi') is-invalid @enderror" name="posisi" aria-label="Default select example">
                        <option selected disabled>=== Pilih Satu ===</option>
                      
                            
                        
                        <option value="supervisor">supervisor</option>
                        <option value="ketua tim">ketua tim</option>
                        <option value="anggota tim">anggota tim</option>
                       
                      </select>
                      @error('posisi')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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

  