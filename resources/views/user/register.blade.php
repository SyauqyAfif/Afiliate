<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Afiliasi</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['../assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/azzara.min.css">
</head>

<body class="login">
	<div class="wrapper wrapper-login">

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Sign Up</h3>

			@if (Session::has('success'))
			<p class="alert alert-success">Akun Berhasil Dibuat Silahkan Chat Admin Untuk Verifikasi</p>
			@endif

			<form action="{{ route('registerStore')}}" method="post">
				@csrf

				<div class="login-form">
					<div class="form-group form-floating-label">
						<input id="name" name="name" type="text" class="form-control input-border-bottom" required>
						<label for="name" class="placeholder">Fullname</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="email" name="email" type="email" class="form-control input-border-bottom" required>
						<label for="email" class="placeholder">Email</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="no_telp" name="no_telp" type="number" class="form-control input-border-bottom" required>
						<label for="no_telp" class="placeholder">Nomer Telepon</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="alamat" name="alamat" type="text" class="form-control input-border-bottom" required>
						<label for="alamat" class="placeholder">Alamat Lengkap</label>
					</div>

					<div class="form-action">
						<a href="/login" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign Up</button>
					</div>
				</div>
		</div>
	</div>
	<!-- <script src="/assets/js/core/jquery.3.2.1.min.js"></script> -->
	<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/assets/js/core/popper.min.js"></script>
	<script src="/assets/js/core/bootstrap.min.js"></script>
	<script src="/assets/js/ready.js"></script>
</body>

</html>