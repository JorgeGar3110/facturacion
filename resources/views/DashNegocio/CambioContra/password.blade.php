@extends('DashNegocio.dashboardnegocio')
@section('content')
	<link href="Compo/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<div class="row">
		<div class="col-xl-12">
			@include('DashNegocio.fragment.warning')
			@include('DashNegocio.fragment.info')
		</div> 
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-8 col-lg-9">
			<!--begin::Portlet-->
			<div class="m-portlet m-portlet--tab">
				<div class="row">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Cambio de contraseña
								</h3>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<!--begin::Form-->
						<form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{ route('Negocio/Contraseña/Editar/') }}">
							
							{{csrf_field()}}
							<div class="m-portlet__body">
								<div class="form-group m-form__group {{$errors->has('ContraActual') ? 'has-error' : ''}}">
									<label for="ContraActual">
										Contraseña actual
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="password" class="form-control m-input m-input--solid" id="ContraActual" name="ContraActual" placeholder="Contraseña actual" 
										autofocus aria-describedby="user" value="">
									</div>
									{!! $errors->first('ContraActual', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('password') ? 'has-error' : ''}}">
									<label for="password">
										Nueva contraseña
									</label>
									<div class="input-group m-input-group">
										<span id="candado" class="input-group-addon">
											<i class="flaticon-lock-1"></i>
										</span>
										<input type="password" class="form-control m-input m-input--solid" id="password" name="password" placeholder="Nueva contraseña" aria-describedby="candado">
									</div>
									{!! $errors->first('password', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="password_confirmation">
										Confirmar nueva contraseña
									</label>
									<div class="input-group m-input-group">
										<span id="candadoc" class="input-group-addon">
											<i class="flaticon-lock-1"></i>
										</span>
										<input type="password" class="form-control m-input m-input--solid" id="password_confirmation" name="password_confirmation" placeholder="Confirmar nueva contraseña" aria-describedby="candadoc">
									</div>
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
			@include('DashNegocio.fragment.usuarioinfo')
		</div>
	</div>
@endsection