@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 mt-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="text-center font-weight-light my-4">
                    <h1><i class="fa fa-user"></i> My Profile</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td>{{ $user->no_telp }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="text-center font-weight-light my-4">
                    <h1><i class="fa fa-pencil-alt"></i> Edit Profile</h1>
                </div>
                <form action="{{ url('/profile/aksi') }}" method="post">

                    @csrf
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus required>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                                    <div class="col-md-10">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" autofocus required>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="no_telp" class="col-md-2 col-form-label text-md-right">{{ __('Nomer Telepon') }}</label>
                                    <div class="col-md-10">
                                        <input type="text" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" autocomplete="no_telp" autofocus required>

                                        @error('no_telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat" class="col-md-2 col-form-label text-md-right">{{ __('Alamat') }}</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $user->alamat }}" autocomplete="alamat" autofocus required></textarea>

                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection