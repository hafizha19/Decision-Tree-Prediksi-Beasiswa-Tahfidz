@extends('layouts.app')

@section('title')
alternatif
@endsection

@section('content')
<div class="container-fluid">

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row  justify-content-center">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">ALTERNATIF</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form method="POST" action="{{route('alternatif.store')}}">
                @csrf
                {{-- <div class="form-group mb-2"> --}}
                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                {{-- </div> --}}
                <div class="form-group mx-sm-3 mb-2">
                    <label for="nama" class="sr-only">Nama alternatif</label>
                    <input class="form-control" id="nama" placeholder="Masukkan nama alternatif" name="nama" required>
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
        
                        <h5>Seluruh Jenis alternatif</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>
                                        {{$d->nama}}
        
                                    </td>
                                    <td>
                                        <a href="/alternatif/{{$d->id}}/edit" class="btn btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/alternatif/{{$d->id}}" method="POST">
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

    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class=" row justify-content-center">
        
                        <h5>Penilaian alternatif</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>
                                        {{$d->nama}}
        
                                    </td>
                                    <td>
                                        <form action="/alternatif/{{$d->id}}" method="POST">
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

</div>
@endsection