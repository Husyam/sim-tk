@extends('layouts.app')

@section('title', 'Advanced Forms')

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
                    <div class="breadcrumb-item">Nilai</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Nilai</h2>
                <div class="card">
                    <form action="{{ route('nilai.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="siswa_id">Nama Siswa</label>
                                <select class="form-control selectric @error('siswa_id') is-invalid @enderror" name="siswa_id" id="siswa_id">
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($siswa as $siswaa)
                                        <option value="{{ $siswaa->id }}">
                                            {{ $siswaa->name }} ({{ $siswaa->id }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mapel_id">Mapel</label>
                                <select class="form-control selectric @error('mapel_id') is-invalid @enderror" name="mapel_id" id="mapel_id">
                                    <option value="">Pilih Matkul</option>
                                    @foreach ($matkul as $makul)
                                        <option value="{{ $makul->id }}">{{ $makul->name }}</option>
                                    @endforeach
                                </select>
                                @error('mapel_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number"
                                    class="form-control @error('nilai')
                                is-invalid
                            @enderror"
                                    name="nilai">
                                @error('nilai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
