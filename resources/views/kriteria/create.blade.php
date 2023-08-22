@extends('layouts.app')

@section('content')
<div class="page-header">
<h3 class="page-title"> Data Kriteria </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
                </ol>
              </nav>
            </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Data Kriteria</h4>
        <p class="card-description"> Masukkan Data Kriteria </p>
            <form class="forms-sample" action="{{route('datakriteria.store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label class="font-weight-bold">Nama Kriteria</label>
                    <input type="text" class="form-control @error('nama_kriteria') is invalid @enderror" name="nama_kriteria" value="{{ old('nama_kriteria') }}" id="nama_kriteria" placeholder="Masukkan nama kriteria" required>
            @error('nama_kriteria')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Kriteria</label>
                    <input type="text" class="form-control @error('kode') is invalid @enderror" name="kode" value="{{ old('kode') }}" id="kode" placeholder="Masukkan kode kriteria" required>
            @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group">
                <label for="atribute" class="font-weight-bold">Atribute</label>
                    <select type="text" name="atribute" class="form-control @error('atribute') is-invalid @enderror" required>
                        <option>Benefit</option>
                        <option>Cost</option>
                    </select>
                    @error('atribute')
                        <div class="alert alert-danger mt-2">
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
