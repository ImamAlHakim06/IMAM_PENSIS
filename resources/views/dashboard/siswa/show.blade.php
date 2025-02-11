@extends('layouts.dashboard')

@section('content')
    <div class="mb-3">
        <a href ="{{route('dashboard.siswa')}}" class="btn btn-primary"><- kembali ke daftar siswa</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Detail Siswa</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 d-flex justify-content-center align-items-center flex-column">
                    <img src="{{ asset('storage/siswa/' . $siswa->pas_photo) }}" class="img-fluid" width="250px">
                </div>
                <div class="col-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Daftar</th>
                            <td>{{ $siswa->no_daftar }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $siswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $siswa->nik }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $siswa->gender }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{ $siswa->agama }}</td>
                        </tr>
                        <tr>
                            <th>No KK</th>
                            <td>{{ $siswa->no_kk }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>{{ $siswa->tempat_l }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $siswa->tanggal_l }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $siswa->alamat }}</td>
                        </tr>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('dashboard.siswa.edit', $siswa->id) }}" class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($siswa))
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Anda yakin ingin menghapus siswa <strong>{{ $siswa->nama }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('dashboard.siswa.delete', $siswa->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
