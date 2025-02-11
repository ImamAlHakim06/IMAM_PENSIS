@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>pensis</h3>    
                </div> 
                <div class="col-4 text-right">
                        <button class="btn btn-sm text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal"></i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>

        <div class="card-body p-2">
          <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="post" action="{{ route($url, $siswa->id ?? '') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($siswa))
                            @method('post')
                        @endif
                        <div class="form-group">
                            <label for="no_daftar">no_daftar</label>
                            <input type="text" class="form-control" name="no_daftar" value="{{ $siswa->no_daftar ?? '' }}">
                            @error('no_daftar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $siswa->nama ?? '' }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="nisn">nisn</label>
                            <input type="text" class="form-control" name="nisn" value="{{ $siswa->nisn ?? '' }}">
                            @error('nisn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="nik">nik</label>
                            <input type="text" class="form-control" name="nik" value="{{ $siswa->nik ?? '' }}">
                            @error('nik')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="gender">gender</label>
                            <input type="text" class="form-control" name="gender" value="{{$siswa->gender ?? '' }}">
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                     <div class="form-group">
                            <label for="agama">agama</label>
                            <input type="text" class="form-control" name="agama" value="{{$siswa->agama ?? '' }}">
                            @error('agama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="no_kk">no_kk</label>
                            <input type="text" class="form-control" name="no_kk" value="{{$siswa->no_kk ?? '' }}">
                            @error('no_kk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="tempat_l">tempat_l</label>
                            <input type="text" class="form-control" name="tempat_l" value="{{$siswa->tempat_l ?? '' }}">
                            @error('tempat_l')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                     <div class="form-group">
                            <label for="tanggal_l">tanggal_l</label>
                            <input type="text" class="form-control" name="tanggal_l" value="{{$siswa->tanggal_l ?? '' }}">
                            @error('tanggal_l')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{$siswa->alamat ?? ''}}">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-3">
                        <div class="custom-file">
                            <input type="file" name= "pas_photo" class= "custom-file-input">
                            <label for="pas_photo" class="custom-file-label">pas_photo</label>
                            @error('pas_photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                            </div>
                            <div class="form-group mt-4">
                    <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary me-2">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">{{ $button }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @if(isset($siswa))
            <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-pas_photo">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</buitton>
                    </div>

                    <div clas="modal-body">
                        <p>Anda yakin ingin menghapus siswa {{$siswa->title}}</p>
                    </div>

                    <div class="modal-footer">
                        <form action="{{ route('dashboard.siswa.delete', $siswa->id) }}" method="post">
                        @csrf
                        @method('delete') 
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection