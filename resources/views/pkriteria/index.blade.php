@extends('layouts.app')

@section('title')
Kriteria
@endsection

@section('title')
penilaian kriteria
@endsection

@section('content')
{{-- @php
    $k = \App\Kriteria::where('user_id', '=', Auth::user()->id)->get();    
@endphp
@dump($k->pluck('id')->values()->toArray()) --}}
<div class="container-fluid">

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class=" row justify-content-center">

                        <h5>Nilai Kriteria (Eigen Vector)</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $d) --}}
                                <tr>
                                    <td>
                                        {{-- {{$d->nama}} --}}

                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <a href="{{route('pkriteria.add')}}" class="btn btn-primary">Tambah Penilaian Kriteria</a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class=" row justify-content-center">
        
                        <h5>Penilaian Kriteria</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kriteria 1</th>
                                    <th>Nilai</th>
                                    <th>Kriteria 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $d)
                                <tr>
                                    <td>
                                        <p>{{\DB::table('kriteria')->select('nama')->where('id','=',$d->id_kriteria_1)->where('user_id','=', Auth::user()->id)->first()->nama}}</p>
                                    </td>
                                    <td>{{$d->nilai}}</td>
                                    <td>
                                        <p>{{\DB::table('kriteria')->select('nama')->where('id','=',$d->id_kriteria_2)->where('user_id','=', Auth::user()->id)->first()->nama}}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection