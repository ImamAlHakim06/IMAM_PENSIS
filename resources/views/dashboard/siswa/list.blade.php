@extends('layouts.dashboard')

@section('content')
    <div class="ab-2">
        <a href ="{{route('dashboard.siswa.create')}}" class="btn btn-primary">+ Siswa</a>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>pensis</h3>
                    </div> 
                    <div class="col-4 align-self-center">
                    <form method="get" action="{{ url('dashboard/siswas') }}">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? ''}}">
                            <div class="input-grup-append">
                                <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                                </div>
                            </div>
                        </from>
                    </div>    
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if($siswas->total())
                <table class="table table-bordered table-striped table-hover">
                    </thead>
                        <tr>
                        <th>Nomor Daftar</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Lihat Detail</th>
        </thead>
        <tbody>
        @foreach ($siswas as $siswa)
        </td>
            <td>
                {{$siswa->no_daftar}}</br>
            </td>
            <td>
                {{$siswa->nama}}</br>
            </td>
            <td>
                {{$siswa->gender}}</br>
            </td>
            <td><a href="{{ route('dashboard.siswa.show', $siswa->id) }}" class="btn btn-eye btn-sm"><i class="fas fa-eye"></i></a></td>
        </tr>
        @endforeach
                </tbody>
                </table>
                    {{ $siswas->links() }}
                @else
                    <h5 class="text-center p-3">Belum ada data Siswa</h5>
                @endif
                </div>
            </div>
@endsection