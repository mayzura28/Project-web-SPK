@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-statistic-1 rounded">
                <div class="card-icon bg-primary">
                    <i class="fas fa-th-large"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Nilais</h4>
                    </div>
                    <div class="card-body">
                        {{ $countNilais }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-statistic-1 rounded">
                <div class="card-icon bg-primary">
                    <i class="far fa-folder"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Alternatifs</h4>
                    </div>
                    <div class="card-body">
                        {{ $countAlternatifs }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-statistic-1 rounded">
                <div class="card-icon bg-primary">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Klasifikasis</h4>
                    </div>
                    <div class="card-body">
                        {{ $countKlasifikasis }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-statistic-1 rounded">
                <div class="card-icon bg-primary">
                    <i class="far fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kriterias</h4>
                    </div>
                    <div class="card-body">
                        {{ $countKriterias }}
                    </div>
                </div>
            </div>
        </div>
      </div>
      @can('administrator')
      <br>
      <div class="row">
        <div class="col-md-3">
            <div class="card card-statistic-1 rounded">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $countUsers }}
                    </div>
                </div>
            </div>
        </div>
        @endcan
      </div> 
@endsection
    