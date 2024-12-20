@extends('layouts.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Jadwal</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Jadwal</h2>
                <div class="card">
                    <form action="{{ route('jadwals.update', $jadwal_pelajarans) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Hari</label>
                                <input type="text"
                                    class="form-control @error('hari') is-invalid @enderror"
                                    name="hari"
                                    value="{{ $jadwal_pelajarans->hari }}">
                                @error('hari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jam</label>
                                <input type="text"
                                    class="form-control @error('jam') is-invalid @enderror"
                                    name="jam"
                                    value="{{ $jadwal_pelajarans->jam }}">
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control selectric @error('kelas_ke') is-invalid @enderror" name="kelas_ke">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $kel)
                                        <option value="{{ $kel->id }}"
                                            {{ $kel->id == $jadwal_pelajarans->kelas_ke ? 'selected' : '' }}>
                                            {{ $kel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Mapel</label>
                                <select class="form-control selectric @error('mapel') is-invalid @enderror" name="mapel">
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($mapel as $mp)
                                        <option value="{{ $mp->id }}"
                                            {{ $mp->id == $jadwal_pelajarans->mapel_id ? 'selected' : '' }}>
                                            {{ $mp->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
