@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>pensis</h3>    
                </div> 
                <div class="col-4 text-right">
                        <button class="btn btn-sm text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                </div>
            </div>
        </div>

        <div class="card-body p-2">
          <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="post" action="{{ url('dashboard/user/update/'. $user->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                     <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old($user->email) ?? $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group mt-2">
                    <button type="button" onclick="Window.history.back()" class="btn btn-sm btn-secondary me-2">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>Delete</5>
                </div>
            </div>

            <div class="modal-body">
                <p>Anda yakin ingin menghapus user {{ $user->name }}</p>
            </div>

            <div class="modal-footer">
                <form action="{{ url('dashboard/user/delete/'.$user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </from>
            </div>
        </div>
    </div>
</div>
@endsection