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
										Registro de clientes del sistema
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
									<a href="{{route('Admin/Negocio')}}" class="btn btn-accent btn-sm m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">Listado</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<!--begin::Form-->
						<form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{ route('Admin/Negocio/Registro') }}">
							
							{{csrf_field()}}
							<div class="m-portlet__body">
								<div class="form-group m-form__group">
									<h6><b>Los campos marcados con * son obligatorios</b></h6>
								</div>
								<div class="form-group m-form__group {{$errors->has('name') ? 'has-error' : ''}}">
									<label for="name">
										Nickname*
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="name" class="form-control m-input m-input--solid" id="name" name="name" placeholder="Nickname" value="{{ old('name') }}" autofocus aria-describedby="user">
									</div>
									{!! $errors->first('name', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('email') ? 'has-error' : ''}}">
									<label for="email">
										Correo*
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-paper-plane"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('email', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('password') ? 'has-error' : ''}}">
									<label for="password">
										Contraseña*
									</label>
									<div class="input-group m-input-group">
										<span id="candado" class="input-group-addon">
											<i class="flaticon-lock-1"></i>
										</span>
										<input type="password" class="form-control m-input m-input--solid" id="password" name="password" placeholder="Contraseña" aria-describedby="candado">
									</div>
									{!! $errors->first('password', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="password_confirmation">
										Confirmar contraseña*
									</label>
									<div class="input-group m-input-group">
										<span id="candadoc" class="input-group-addon">
											<i class="flaticon-lock-1"></i>
										</span>
										<input type="password" class="form-control m-input m-input--solid" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" aria-describedby="candadoc">
									</div>
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<button type="submit" class="btn btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase btn-block">
										Registrar
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
@endsection


