@extends('layout.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"> Data User</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><i class="fa fa-user"></i> Data User</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">
                                    <i class="fa fa-plus"></i>
                                    Tambah User
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($user as $row)

                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->no_telp }}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>{{ $row->level }}</td>
                                        <td>

                                            <a href="#modalEditUser{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#modalHapusUser{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>

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
</div>



<!-- Modal Tambah User -->
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap ..." required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                    </div>

                    <div class="form-group">
                        <label>Nomer Telepon</label>
                        <input type="number" class="form-control" name="no_telp" placeholder="Nomer Telepon ..." required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap ..." required>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" id="" class="form-control" required>
                            <option value="" hidden="">-- Pilih Level --</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="afiliasi">Afiliasi</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
@foreach ($user as $d )
<div class="modal fade" id="modalEditUser{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/user/{{ $d->id }}/update">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Nama Lengkap ..." required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email ..." readonly>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                    </div>

                    <div class="form-group">
                        <label>Nomer Telepon</label>
                        <input type="number" value="{{ $d->no_telp }}" class="form-control" name="no_telp" placeholder="Nomer Telepon ..." readonly>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" value="{{ $d->alamat }}" class="form-control" name="alamat" placeholder="Alamat ..." readonly>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" id="" class="form-control" required>
                            <option value="" hidden="">-- Pilih Level --</option>
                            <option <?php if ($d['level'] == "admin") echo "selected"; ?> value="admin">Admin</option>
                            <option <?php if ($d['level'] == "staff") echo "selected"; ?> value="staff">Staff</option>
                            <option <?php if ($d['level'] == "afiliasi") echo "selected"; ?> value="afiliasi">Afiliasi</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Hapus User -->
@foreach ($user as $g )
<div class="modal fade" id="modalHapusUser{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="get" enctype="multipart/form-data" action="/user/{{ $d->id }}/destroy">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>

                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach
@endsection