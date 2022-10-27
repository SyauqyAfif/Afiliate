@extends('layout.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"> Data Afiliasi</h4>
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
                        <a href="#">Afiliasi</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><i class="fa fa-user"></i> Data Afiliasi</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddAfiliasi">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Afiliasi</th>
                                        <th>No Telpon</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($afiliasi as $row)

                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_afiliasi }} </td>
                                        <td>{{ $row->no_telp }} </td>
                                        <td>{{ $row->alamat }} </td>
                                        <td>{{ $row->email }} </td>
                                        <td>{{ $row->tanggal }} </td>
                                        <td>

                                            <a href="#modalEditAfiliasi{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#modalHapusAfiliasi{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>

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
<div class="modal fade" id="modalAddAfiliasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/data_afiliasi/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Afiliasi</label>
                        <input type="text" class="form-control" name="nama_afiliasi" placeholder="Nama Afiliasi ..." required>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="No Telpon ..." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat ..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Daftar</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Daftar ..." required>
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
@foreach ($afiliasi as $d )
<div class="modal fade" id="modalEditAfiliasi{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/data_afiliasi/{{ $d->id }}/update">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>

                    <div class="form-group">
                        <label>Nama Afiliasi</label>
                        <input type="text" value="{{ $d->nama_afiliasi }}" class="form-control" name="nama_afiliasi" placeholder="Nama Afiliasi ..." required>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" value="{{ $d->no_telp }}" class="form-control" name="no_telp" placeholder="No Telpon ..." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" value="{{ $d->alamat }}" class="form-control" name="alamat" placeholder="Alamat ..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email ..." required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Daftar</label>
                        <input type="date" value="{{ $d->tanggal }}" class="form-control" name="tanggal" placeholder="Tanggal Daftar ..." required>
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
@foreach ($afiliasi as $g )
<div class="modal fade" id="modalHapusAfiliasi{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="get" enctype="multipart/form-data" action="/data_afiliasi/{{ $d->id }}/destroy">
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