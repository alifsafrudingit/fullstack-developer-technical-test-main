@extends('layout.app')
@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/employee') }}">Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                aria-selected="true">Data Karyawan</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Nama Karyawan</strong>
                                    <br>
                                    <p class="text-muted">{{ $employee->name }}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>NIP</strong>
                                    <br>
                                    <p class="text-muted">{{ $employee->nip }}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Nomomr Telepone</strong>
                                    <br>
                                    <p class="text-muted">{{ $employee->phone_number }}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Alamat</strong>
                                    <br>
                                    <p class="text-muted">{{ $employee->address }}</p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <strong>Agama</strong>
                                    <br>
                                    <p class="text-muted">{{ $employee->religion }}</p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <strong>Photo KTP</strong>
                                    <br>
                                    <img style="max-width:40px" src="{{ Storage::url($employee->id_cart_photo) }}" />
                                </div>
                                <div class="col-md-3 col-6">
                                    <strong>Agama</strong>
                                    <br>
                                    <p class="text-muted">{{ $employee->religion }}</p>
                                </div>
                            </div>
                            <a href="{{ route('client.index') }}" class="btn btn-warning mr-2">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
