@extends('layouts.app')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <span class="card-body d-lg-flex align-items-center">
                    <h4 class="card-title">Data Alternatif</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-blue btn-sm my-1 my-sm-1 ml-auto">Cancel</a>
                  </span>
                    <div class="card-body">
                    <table class="table table-hover">
			  <thead>
				<tr>
				  <th>NAMA KRITERIA</th>
				  <th>NILAI</th>
				</tr>
			  </thead>
			  <tbody>
                <tr>
                @foreach($nilais as $val)
				          <td>{{ $val->nama_kriteria }}</td>
                  <td>{{ $val->nilai }}</td>
                </tr>
                @endforeach
			  </tbody>
			</table>
                  </div>
                </div>          
</div>
@endsection