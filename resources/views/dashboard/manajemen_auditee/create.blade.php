
 @extends('dashboard.layouts.main')

 @section('container')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manajemen Auditee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Manajemen Auditee</li>
          <li class="breadcrumb-item active">Data Baru</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-10">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Input Data Auditee</h5>
  
                <!-- General Form Elements -->
                <form action="{{route('manajemen_auditee_store')}}" method="post">
                  @csrf
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kode Auditee</label>
                    <div class="col-sm-10">
                      <input type="text" name="kode" class="form-control  @error('kode') is-invalid @enderror"
                      id="kode" value="{{ old('kode') }}" autofocus>
                  @error('kode')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-10">
                      <input type="text" name="auditee" class="form-control  @error('auditee') is-invalid @enderror"
                      id="auditee" value="{{ old('auditee') }}" autofocus>
                  @error('auditee')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                    </div>
                  </div>
                  
                    
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">PIC</label>
                    <div class="col-sm-10">
                      <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" aria-label="Default select example">
                          <option selected disabled>== Pilih Satu ==</option>
                          @foreach($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                          @endforeach
                      </select>
                      @error('user_id')
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

  