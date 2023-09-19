@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Kertas Kerja Audit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pelaksanaan audit</li>
                    <li class="breadcrumb-item active">Tambah Kertas Kerja</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Kertas Kerja</h5>



                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Auditor</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control"
                                        value="{{ $program_kerja->susunanTim->auditor->user->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul Program Audit</label>
                                <div class="col-sm-10">
                                    <input type="text" disabled class="form-control"
                                        value="{{ $program_kerja->pustakaAudit->judul }}">
                                </div>
                            </div>

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('kertas_kerja_audit_store') }}">
                                @csrf
                                <input type="hidden" name="program_kerja_audit_id" value="{{ $program_kerja->id }}">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Judul Temuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="temuan" class="form-control @error('temuan') is-invalid @enderror" id="temuan"
                                        value="{{ old('temuan') }}" autofocus>
                                    @error('temuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        value="{{ old('tanggal') }}" >
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Data Umum</label>
                                    <div class="col-sm-10">

                                        <input id="x" type="hidden" name="data_umum">
                                        <trix-editor input="x"></trix-editor>
                                       
                                        @error('data_umum')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Kondisi</label>
                                    <div class="col-sm-10">

                                        <input id="y" type="hidden" name="kondisi">
                                        <trix-editor input="y"></trix-editor>
                                        @error('kondisi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" x-data="{ searchText: '', selectedRows: [] }">
                                    <label for="inputText" class="col-sm-2 col-form-label">Kriteria</label>

                                    <div class="col-sm-10">

                                        <input id="z" type="hidden" name="kriteria">
                                        <trix-editor input="z" x-html="selectedRows.join(', ')"></trix-editor>
                                        @error('kriteria')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#basicModal">
                                            Referensi
                                        </button>
                                    </div>
                                    <div class="modal fade" id="basicModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Daftar Referensi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" >
                                                    <div class="w-full mt-6">
                                                      <input type="text" id="simple-search" x-model="searchText" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
                                                    </div>
                                                    <div class="table-responsive overflow-auto" style="height: 200px;">
                                                      <table class="table table-bordered table-striped">
                                                        <thead>
                                                          <tr>
                                                            <!-- Kolom-kolom di sini -->
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          @foreach ($referensi as $item)
                                                            <template x-if="searchText === '' || '{{ strtolower($item->judul) }}'.includes(searchText.toLowerCase()) || '{{ $item->referensi }}'.includes(searchText)">
                                                              <tr>
                                                                <td>
                                                                  <label>
                                                                    <input type="checkbox" x-model="selectedRows" value="{{ $item->referensi }}">
                                                                    {!! $item->referensi !!}
                                                                  </label>
                                                                </td>
                                                              </tr>
                                                            </template>
                                                          @endforeach
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                  
                
                                                  </div>
                                                  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                   


                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Sebab</label>
                                    <div class="col-sm-10">

                                        <input id="a" type="hidden" name="sebab">
                                        <trix-editor input="a"></trix-editor>
                                        @error('sebab')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Rekomendasi</label>
                                    <div class="col-sm-10">

                                        <input id="b" type="hidden" name="rekomendasi">
                                        <trix-editor input="b"></trix-editor>
                                        @error('rekomendasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Batas Waktu</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="batas_waktu" class="form-control @error('batas_waktu') is-invalid @enderror" id="batas_waktu"
                                        value="{{ old('batas_waktu') }}">
                                    @error('batas_waktu')
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
