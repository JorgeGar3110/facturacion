@extends('DashAdmin.dashboardadmin')
@section('content')
	{{ Html::style('Compo/assets/vendors/base/vendors.bundle.css') }}
	<div class="row">
		<div class="col-xl-12">
			@include('DashAdmin.fragment.info')
		</div> 
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-8 col-lg-9">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="row">
					<div class="col-sm-8 col-md-9 col-lg-9">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Editar administrador
									</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-3 col-lg-3">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<br>
									<a href="{{route('Admin/Administrador')}}" class="btn btn-accent btn-sm m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">Listado</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<!--begin::Form-->
						<form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{ route('Admin/Administrador/Editar/', $admin->id) }}">
							
							{{csrf_field()}}
							<div class="m-portlet__body">
								<div class="form-group m-form__group">
									<h6><b>Los campos marcados con * son obligatorios</b></h6>
								</div>
								<div class="form-group m-form__group {{$errors->has('Nombre') ? 'has-error' : ''}}">
									<label for="Nombre">
										Nombre*
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Nombre" name="Nombre" placeholder="Nombre" value="{{$admin->Nombre}}" autofocus aria-describedby="user" value="">
									</div>
									{!! $errors->first('Nombre', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('Paterno') ? 'has-error' : ''}}">
									<label for="Paterno">
										Apellido Paterno*
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Paterno" name="Paterno" aria-describedby="PaternoHelp" placeholder="Apellido Paterno" value="{{$admin->Paterno}}" autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('Paterno', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('Materno') ? 'has-error' : ''}}">
									<label for="Materno">
										Apellido Materno*
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Materno" name="Materno" aria-describedby="MaternoHelp" placeholder="Apellido Materno" value="{{$admin->Materno}}" autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('Materno', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="Activo">
										Estado*
									</label>
									<select class="form-control m-input m-input--solid" id="Activo" name="Activo">
										<option value="0">
											Inactivo
										</option>
										<option value="1">
											Activo
										</option>
									</select>
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<button type="submit" class="btn btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase btn-block">
										Guardar
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!--end::Form-->
			</div>
		</div>

		<div class="col-sm-12 col-md-4 col-lg-3">
			@include('DashAdmin.fragment.usuarioinfo')
		</div>
	</div>
 
	{{ Html::Script('js/jquery.min.js') }}

	<script>
   		$(document).ready(function() {
   			$("#Activo").val("{{$admin->Activo}}");
   		});
   	</script>
@endsection