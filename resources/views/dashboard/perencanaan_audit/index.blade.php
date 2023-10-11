@extends('dashboard.layouts.main')

@section('container')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Daftar Perencanaan Audit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Perencanaan Audit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
      {{ session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h5 class="card-title">Data Perencanaan Audit</h5>
              </div>
              <div>
                <a href="{{route('perencanaan_audit_create')}}" class="btn btn-outline-primary">Tambah Data</a>
              </div>

            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Kegiatan</th>
                  <th scope="col">Objek</th>
                  <th scope="col">Periode</th>
                 
                  <th scope="col">Tingkat Resiko</th>
                  <!-- <th scope="col">Rencana Kegiatan</th> -->
                  <th scope="col">Susunan Tim</th>
   
                  <th scope="col">Program Kerja</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($audits as $item)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$item->kegiatan->kegiatan}}</td>
                  <td>{{$item->auditee->auditee}}</td>
                  <td>{{$item->periode}}</td>
                  <td>{{$item->tingkat_resiko}}</td>
                  <!-- <td>{{$item->firstdate}} - {{$item->enddate}}</td> -->
                  <td><a href="{{route('susunan_tim',['id' => $item->id])}}" class="btn btn-secondary"><i class="bi bi-collection"></i></a></td>
                  <td><a href="{{route('program_kerja_audit',['id' => $item->id])}}" class="btn btn-secondary"><i class="bi bi-collection"></i></a></td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Satu
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('perencanaan_audit_detail', ['id' => $item->id])}}">Detail</a></li>


                        <li><a class="dropdown-item" href="{{route('perencanaan_audit_edit', ['id' => $item->id])}}">Edit</a></li>

                        <li><a class="dropdown-item" href="{{route('perencanaan_audit_delete', ['id' => $item->id])}}">Hapus</a></li>
                        <li><a class="dropdown-item" href="{{route('perencanaan_audit_status', ['id' => $item->id])}}">Lanjut Ke Pelaksanaan</a></li>
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