@extends('layout.master')

@section('content')

    <div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"> Laporan Data Afiliasi</h4>
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
                        <a href="#">Laporan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Afiliasi</a>
                    </li>
                </ul>
            </div>
         <div class="section-body">

    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
             
                <div class=" col-lg-4 col-md-12 col-12 col-sm-12 ">
                    <h5>Laporan</h5>
                    <div class="form-group">
                        <label for="label">Dari Tanggal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label for="label">Sampai Tanggal</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" >
                    </div>
                    <div class="input-group mb-3">
                        <a href="" onclick="this.href='/laporan/'+document.getElementById('tgl_awal').value +
                        '/' +document.getElementById('tgl_akhir').value" class="btn btn-info col-md-12"><i class='fas fa-file-alt' style='font-size:15px'></i> Laporan</a>
                        
                        </div>
            </div>
                
                 
                     
                       
                       
                
                         {{-- <div class="card-body">
                            <h5>Laporan</h5>
                            
                            
                            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                                    <div class="input-group mb-3">
                                       <a href="" onclick="this.href='/ada_laporan/'+document.getElementById('tgl_awal').value +
                                       '/' +document.getElementById('tgl_akhir').value" class="btn btn-primary col-md-12"> Ada Laporan<i class='fas fa-print'></i></a>
                                    </div>

                                </div>
                              <br>
                        </div> --}}
                    </div>     
                </div> 
            </div>
        </div>
    </div> 





            </div>
        </div>
    </div>
</div>
@endsection