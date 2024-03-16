@extends('layout.app')
@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jabatan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/employee') }}">Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                                @foreach ($errors->all() as $error)
                                    <div class="alert-title">{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Create Employee</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" value="{{ old('nip') }}" name="nip" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tahun Lahir</label>
                                <input type="text" value="{{ old('year_birth') }}" name="year_birth"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea type="text" value="{{ old('address') }}" name="address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="number" value="{{ old('phone_number') }}" name="phone_number"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <div class="">
                                    <div class="pretty p-default p-curve">
                                        <input type="radio" name="islam" id="type" value="islam" />
                                        <label>Islam</label>
                                    </div>
                                    <div class="pretty p-default p-curve">
                                        <input type="radio" name="kristen" id="type" value="kristen" />
                                        <label>Kriten</label>
                                    </div>
                                    <div class="pretty p-default p-curve">
                                        <input type="radio" name="katholik" id="type" value="katholik" />
                                        <label>Katholik</label>
                                    </div>
                                    <div class="pretty p-default p-curve">
                                        <input type="radio" name="hindu" id="type" value="hindu" />
                                        <label>Hindu</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select type="text" value="" name="status" class="form-control select2">
                                    <option>-- Pilih Status --</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select type="text" value="" name="position_id" class="form-control select2">
                                    <option>-- Pilih Jabatan --</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('employee.index') }}" class="btn btn-warning mr-2">Back</a>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
