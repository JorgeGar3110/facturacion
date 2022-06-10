@extends('DashAdmin.dashboardadmin')
@section('content')
	<link href="Compo/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<div class="row">
		<div class="col-xl-12">
			@include('DashAdmin.fragment.info')
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6">
			@include('DashAdmin.fragment.usuarioinfo')
		</div>
		<div class="col-xl-6">
		</div>
	</div>
@endsection


