<!DOCTYPE HTML>
<html lang="es">
<head>
	<title>
		@section('titulo')
			Página principal
		@show 
		<?php // | {{Site::find(1)->name}} ?>
	</title>
	<meta charset="utf-8" />

	<!-- CSS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--link rel="stylesheet" href="{{ URL::asset('css/lebasi.css') }}" /-->
	<link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css') }}" />
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
    <style>
		.disableClick{
		    pointer-events: none;
		    color:#555 !important;
		}		
    </style>
</head>
<body>
	<!--h4>Sistema de inventarios</h4-->
	<div class="container-full">

		<!--div class="row"-->
			<!--div class="col-lg-7 col-lg-offset-3" style="margin-bottom:50px;"-->
{{-- 				<header>
					<h5>Panel de Administración</h5>
					<h6 align="right">Usuario: {{Session::get('loginLebasi')}}</6>
				</header> --}}
			<!--/div-->
		<!--/div-->
		<ul id="dropdown1" class="dropdown-content">
			<li><a class="red-text" href="{{URL::to('/admin/tipoArticulo')}}">Tipo artículos</a></li>
			<li><a class="red-text" href="{{URL::to('/admin/estatus')}}">Estatus</a></li>
			<li><a class="red-text" href="{{URL::to('/admin/pais')}}">Paises</a></li>
			<li><a class="red-text" href="{{URL::to('/admin/ciudad')}}">Ciudades</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/sucursal')}}">Sucursales</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/almacen')}}">Almacenes</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/departamento')}}">Departamentos</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/empleado')}}">Empleados</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/articulo')}}">Art&iacute;culos</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/usuario')}}">Usuarios</a></li>
			<li><a class="red-text disableClick" href="{{URL::to('/admin/getEmpleadoResguardo')}}">Resguardos</a></li>
		</ul>

		<nav class="red darken-4">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo right" title="usuario">{{Session::get('loginLebasi')}}
					<i class="material-icons right">person_pin</i>
				</a>
				<ul id="nav-mobile" class="left hide-on-med-and-down">
					<li><a href="{{URL::to('/admin')}}" title="Inicio">
							<i class="material-icons right">home</i>
						</a></li>
					<li><a href="{{URL::to('/logout')}}" title="Salir">
							<i class="material-icons right">exit_to_app</i>
						</a>
					</li>
					<li><a class="disableClick" href="{{URL::to('/admin/cambiaPassword/'.Session::get('usuarioLebasi'))}}" title="Cambiar contrase&ntilde;a">
							<i class="material-icons right">fingerprint</i>
						</a></li>					
      				<li>
      					<a class="dropdown-button" href="#!" data-activates="dropdown1">Catálogos<i class="material-icons right">more_vert</i>
      					</a>
      				</li>
				</ul>
			</div>
		</nav>

		<div class="row">
			<div class="col s10 push-s1">
				@yield('content')
			</div>
		</div>

		<!--div class="row"-->
			<!--div class="col-lg-7 col-lg-offset-3"-->
		<footer class"page-footer">
			<div class="container-fluid red darken-4">
				<div class="row">
					<div class="col s12">
						<h6 class="white-text center-align">App por @Alí Escamilla Navarro</h6>
					</div>
				</div>
			</div>
		</footer>
			<!--/div-->
		<!--/div-->

	</div>

	<!-- JS -->
	<script src="{{ URL::asset('js/materialize.min.js') }}"></script>
	<script src="{{ URL::asset('js/funciones.js') }}"></script>
</body>
</html>