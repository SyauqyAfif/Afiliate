<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Afiliasi</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/assets/img/itn.png" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        <div class="main-header" data-background-color="blue">
            <nav class="sb-topnav navbar navbar-expand">
                <a class="navbar-brand">Program Afiliasi <button class="btn btn-minimize btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> </a>
                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
                <!-- Navbar Logout-->
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>{{ auth()->user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="profile"> <i class="fa fa-pencil-alt"></i> Profile</a>
                            <a class="dropdown-item" href="ganti_password"> <i class="fa fa-user"></i> Ganti Password</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"> <i class="fa fa-lock"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Navbar -->

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="collapse show" href="{{route('home')}}"><i class="fas fa-home"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon"> <i class="fa fa-ellipsis-h"></i></span>
                            <h4 class="text-section">Menu Kelola</h4>
                        </li>

                        @if(auth()->user()->level=="admin" || auth()->user()->level == "staff")
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base"><i class="fas fa-user"></i>
                                <p>Kelola User</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('user')}}"><span class="sub-item">Data User</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base2"><i class="fas fa-briefcase"></i>
                                <p>Kelola Data</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base2">
                                <ul class="nav nav-collapse">
                                    @if(auth()->user()->level=="admin" || auth()->user()->level == "staff")
                                    <li>
                                        <a href="{{ route( 'data_afiliasi' ) }}"><span class="sub-item">Data Afiliasi</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route( 'jp' ) }}"><span class="sub-item">Jenis Program Afiliasi</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route( 'fee' ) }}"><span class="sub-item">Data Fee</span></a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route( 'data_program' ) }}"><span class="sub-item">Program Afiliasi</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @if(auth()->user()->level=="admin" || auth()->user()->level == "staff")
                        <li class="nav-section">
                            <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                            <h4 class="text-section">Menu Laporan</h4>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#laporan2"><i class="fas fa-file"></i>
                                <p>Laporan</p><span class="caret"></span>
                            </a>
                            <div class="collapse" id="laporan2">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route( 'cetak_laporan' ) }}"><span class="sub-item">Laporan Data Afiliasi</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Azzara JS -->
    <script src="/assets/js/ready.min.js"></script>
    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="/assets/js/setting-demo.js"></script>
    <!-- Sweet Alert -->
    <script src="/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    @if (session('success'))
    <script>
        var SweetAlert2Demo = function() {

            var initDemos = function() {
                swal({
                    title: "{{ session('success')}}",
                    text: "{{ session('success')}}",
                    icon: "success",
                    buttons: {
                        confirm: {
                            text: "Confirm Me",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            };
            return {
                init: function() {
                    initDemos();
                },
            };
        }();
        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>
    @endif
    @if (session('error'))
    <script>
        var SweetAlert2Demo = function() {

            var initDemos = function() {
                swal({
                    title: "{{ session('error')}}",
                    text: "{{ session('error')}}",
                    icon: "error",
                    buttons: {
                        confirm: {
                            text: "Confirm Me",
                            value: true,
                            visible: true,
                            className: "btn btn-success",
                            closeModal: true
                        }
                    }
                });
            };

            return {
                init: function() {
                    initDemos();
                },
            };
        }();

        jQuery(document).ready(function() {
            SweetAlert2Demo.init();
        });
    </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#add-row').DataTable({});
        });
    </script>
</body>

</html>