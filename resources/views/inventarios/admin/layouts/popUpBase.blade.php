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
	<link rel="stylesheet" href="{{ URL::asset('css/lebasi.css') }}" />
</head>
<body>
	<div class="container-full">
		<div class="row">
			<div class="col-lg-5">
				@yield('content')
			</div>
		</div>
		<footer style="text-align:center;">
			App por @Vanessa Martinez
		</footer>
	</div>

	<!-- JS -->
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
	<script src="{{ URL::asset('js/funciones.js') }}"></script>
</body>
</html>