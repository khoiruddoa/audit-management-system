@extends('dashboard.layouts.main')

@section('container')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manajemen_role') }}">Manajemen Role</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
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

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>


                            </ul>

                            <form method="POST" action="{{route('manajemen_role_permission')}}">
                                @csrf
                                <input type="hidden" value="{{$role->id}}" name="role_id">
                            <div class="tab-content pt-2 ">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Detail Role {{ $role->name }}</h5>
                                    @foreach ($permissionsWithFlag as $item)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">{{ $item->name }}</div>

                                            <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="permissions[]"
                                                id="flexCheckChecked" @if($item->has_role == true) checked @endif>
                                        </div>
                                    @endforeach
                                </div><!-- End Bordered Tabs -->

                            </div>



                            <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
        </section>


    </main><!-- End #main -->
@endsection
