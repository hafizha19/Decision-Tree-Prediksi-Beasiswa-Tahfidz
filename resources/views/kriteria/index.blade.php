@extends('layouts.app')

@section('title')
Kriteria
@endsection

@section('content')
<div class="container-fluid">

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row  justify-content-center">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Kriteria</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form method="POST" action="{{route('kriteria.store')}}">
                @csrf
                {{-- <div class="form-group mb-2"> --}}
                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                {{-- </div> --}}
                <div class="form-group mx-sm-3 mb-2">
                    <label for="nama" class="sr-only">Nama Kriteria</label>
                    <input class="form-control" id="nama" placeholder="Masukkan nama kriteria" name="nama" required>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="submit" class="btn btn-primary" value="Tambahkan">
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class=" row justify-content-center">

                        <h5>Seluruh Jenis Kriteria</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Kriteria</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>
                                        {{$d->nama}}

                                    </td>
                                    <td>
                                        <form action="/kriteria/{{$d->id}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin mengahapus data ini?');">Hapus</button>
                                        </form>
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

    {{-- <div class="row justify-content-center mt-3">
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
                                        <p>{{\DB::table('kriteria')->select('nama')->where('id','=',$d->id_kriteria_1)->where('user_id','=', Auth::user()->id)->first()->nama}}
                                        </p>
                                    </td>
                                    <td>{{$d->nilai}}</td>
                                    <td>
                                        <p>{{\DB::table('kriteria')->select('nama')->where('id','=',$d->id_kriteria_2)->where('user_id','=', Auth::user()->id)->first()->nama}}
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

</div>
@endsection