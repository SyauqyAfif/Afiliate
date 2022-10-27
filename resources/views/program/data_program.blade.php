@extends('layout.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"> Data Program</h4>
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
                        <a href="#">Program</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"><i class="fa fa-user"></i> Data Program</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddProgram">
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
                                        <th>Jenis Program</th>
                                        <th>Nama Program</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($program as $row)

                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_program }} </td>
                                        <td>{{ App\Models\Jp::find($row->jp)->jp}}</td>
                                        <td>

                                            <a href="#modalEditProgram{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#modalHapusProgram{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>

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
<div class="modal fade" id="modalAddProgram" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/data_program/store">
                @csrf
                <div class="modal-body">
                <div class="form-group">
            <label for="jp">Jenis Program</label>
            {{--<input type="text" class="form-control" id="program_id" name='program_id'>--}}
            <select name="jp" class="form-control">
              @foreach($jp as $item)
                <option value="{{$item->id}}">{{$item->jp}}</option>
              @endforeach
            </select>
        </div>
                    <div class="form-group">
                        <label>Nama Program</label>
                        <input type="text" class="form-control" name="nama_program" placeholder="Nama Program ..." required>
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
@foreach ($program as $d )
<div class="modal fade" id="modalEditProgram{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data" action="/data_program/{{ $d->id }}/update">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{ $d->id }}" name="id" required>
                    
                    <div class="form-group">
            <label for="jp">Jenis Program</label>
            {{--<input type="text" class="form-control" id="program_id" name='program_id'>--}}
            <select name="jp" class="form-control">
              @foreach($jp as $item)
                <option value="{{$item->id}}">{{$item->jp}}</option>
              @endforeach
            </select>
        </div>

                    <div class="form-group">
                        <label>Nama Program</label>
                        <input type="text" value="{{ $d->nama_program }}" class="form-control" name="nama_program" placeholder="Nama Program ..." required>
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
@foreach ($program as $g )
<div class="modal fade" id="modalHapusProgram{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="get" enctype="multipart/form-data" action="/data_program/{{ $d->id }}/destroy">
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