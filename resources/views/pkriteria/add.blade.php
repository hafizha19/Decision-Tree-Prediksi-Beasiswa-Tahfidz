@extends('layouts.app')

@section('title')
Tambah Kriteria
@endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{ Route('kriteria.index') }}" class="btn btn-danger">Kembali</a>
</div>

<div class="container-fluid">
    @if ( $status = \Session::get('sukses'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success d-block">{{ $status }}</div>
        </div>
    </div>
    @endif

    <div class="row  justify-content-center">

        <!-- Page Heading -->
        <h2 class="h3 mb-4 text-gray-800">Penilaian Kriteria</h2>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" class="row justify-content-between" action="{{route('pkriteria.store')}}">
                @csrf
                <div class="col-lg-5">
                    {!! App\Helpers\AppForm::selectModelno('Kriteria 1', 'id_kriteria_1', \DB::table('kriteria')
                    ->select('id','nama')->where('user_id', '=', Auth::id())->get(), "id", "nama",true) !!}
                </div>
                <div class="col-lg-2">
                    {!! App\Helpers\AppForm::input('text', '','nilai',true) !!}
                </div>
                <div class="col-lg-5">
                    {!! App\Helpers\AppForm::selectModel('', 'id_kriteria_2', \DB::table('kriteria')
                    ->select('id','nama')->where('user_id', '=', Auth::id())->get(), "id", "nama",true) !!}
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Tambahkan penilaian">
            </form>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class=" row justify-content-center">

                        <h5>Penilaian</h5>
                    </div>
                </div>
                {{-- @dd(\DB::table('kriteria')->select('nama')->where('id','=',$data[0]->id_kriteria_1)->where('user_id','=', Auth::user()->id)->first()->nama) --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
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
                                        @foreach ($data as $d)
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
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p>1</p>
                                            </td>
                                            <td>
                                                <p>Sama</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>2</p>
                                            </td>
                                            <td>
                                                <p>Sedikit Lebih Penting</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>3</p>
                                            </td>
                                            <td>
                                                <p>Lebih Penting</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>4</p>
                                            </td>
                                            <td>
                                                <p>Sangat Lebih Penting</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>5</p>
                                            </td>
                                            <td>
                                                <p>Mutlak Lebih Penting</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection