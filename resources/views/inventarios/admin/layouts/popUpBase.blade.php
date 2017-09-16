<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>
		@section('titulo')
			Página principal popUp
		@show 
	</title>
	<meta charset="utf-8" />
	<!-- CSS -->
	<!--link rel="stylesheet" href="{{ URL::asset('css/lebasi.css') }}" /-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--link rel="stylesheet" href="{{ URL::asset('css/lebasi.css') }}" /-->
	<link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css') }}" />
	<script src="{{ URL::asset('js/jquery.js') }}"></script>	
</head>
<body>
	<div class="container-full">
		<div class="row">
			<div class="col-lg-5">
				@yield('content')
			</div>
		</div>
		<footer class"page-footer">
			<div class="container-fluid red darken-4">
				<div class="row">
					<div class="col s12">
						<h6 class="white-text center-align">App por @Alí Escamilla Navarro</h6>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- JS -->
	<script src="{{ URL::asset('js/materialize.min.js') }}"></script>
	<script src="{{ URL::asset('js/funciones.js') }}"></script>
</body>
</html>