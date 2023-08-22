@extends('layouts.app')

@section('content')
<div class="page-header">
<h3 class="page-title"> Data Klasifikasi </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Klasifikasi</li>
                </ol>
              </nav>
            </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Klasifikasi</h4>
        <p class="card-description"> Masukkan Data Klasifikasi </p>
            <form action="{{ route('subkriteria.update', $kriterias->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="kriteria_id" class="font-weight-bold">Nama Kriteria</label>
                <select name="kriteria_id" class="custom-select my-1 mr-sm-2 bg-light" id="kriteria_id" value="{{$kriterias->kriteria_id}}" required>
                    <option selected>{{$kriterias->nama_kriteria}}</option>
                    @foreach($data_klasifikasi as $kriteria)
                    <option value="{{$kriteria->id}}">{{$kriteria->nama_kriteria}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Klasifikasi</label>
                    <input type="text" class="form-control @error('klasifikasi') is invalid @enderror" name="klasifikasi" value="{{ old('klasifikasi', $kriterias->klasifikasi) }}" id="klasifikasi" placeholder="Masukkan Klasifikasi" required>
            @error('klasifikasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Nilai</label>
                    <input type="text" class="form-control @error('nilai') is invalid @enderror" name="nilai" value="{{ old('nilai', $kriterias->nilai) }}" id="nilai" placeholder="Masukkan Nilai" required>
            @error('nilai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Save</button>
            <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
            
            </form>
        </div>
    </div>
</div>
@endsection
