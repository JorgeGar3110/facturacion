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
										Agregar negocio a cliente
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
									<a href="{{route ('Admin/Negocio/MisNegocios/', $user->id)}}" class="btn btn-accent btn-sm m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">Listado</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<!--begin::Form-->
						<form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{route('Admin/Negocio/MisNegocios/Agregar/', $user->id)}}">
							
							{{csrf_field()}}
							<div class="m-portlet__body">
								<div class="form-group m-form__group">
									<h6 class="m-portlet__head-text">
										Nickname: {{$user->name}}
									</h6>
									<h6 class="m-portlet__head-text">
										Correo: {{$user->email}}
									</h6>
								</div>
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
										<input type="text" class="form-control m-input m-input--solid" id="Nombre" name="Nombre" placeholder="Nombre" autofocus aria-describedby="user" value="{{old('Nombre')}}">
									</div>
									{!! $errors->first('Nombre', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('RazonSocial') ? 'has-error' : ''}}">
									<label for="RazonSocial">
										Razon Social*
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="RazonSocial" name="RazonSocial" aria-describedby="RazonSocialHelp" placeholder="Razon social" autofocus aria-describedby="arroba" value="{{old('RazonSocial')}}">
									</div>
									{!! $errors->first('RazonSocial', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('RFC') ? 'has-error' : ''}}">
									<label for="RFC">
										RFC*
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-statistics "></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="RFC" name="RFC" aria-describedby="nameHelp" placeholder="RFC" autofocus aria-describedby="arroba" value="{{old('RFC')}}">
									</div>
									{!! $errors->first('RFC', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="IdTipoNegocio">
										Tipo negocio*
									</label>
									<select class="form-control m-input m-input--solid" id="IdTipoNegocio" name="IdTipoNegocio">
										@foreach($tneg as $tnegs)
											<option value="{{$tnegs->id}}">{{$tnegs->Nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group m-form__group">
									<div class="row ">
										<div class="col-sm-12 col-md-6 col-lg-6">
											<label for="Estado">
												Estado*
											</label>
											<select class="form-control m-input m-input--solid" id="Estado" name="Estado" onchange="cargar()">
												@foreach($estados as $estm)
													<option value="{{$estm->id}}">
														{{$estm->Nombre}}
													</option>
												@endforeach
											</select>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6" id="DivMunicipio" name="DivMunicipio">
											<label for="IdMunicipio">
												Municipio*
											</label>
											<select class="form-control m-input m-input--solid" id="IdMunicipio" name="IdMunicipio">
											</select>
										</div>
									</div>
								</div>
								<div class="form-group m-form__group">
									<div class="row ">
										<div class="col-sm-12 col-md-8 col-lg-8">
											<label for="Calle">
												Calle*
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="Calle" name="Calle" placeholder="Calle" autofocus aria-describedby="user" value="{{old('Calle')}}">
											</div>
											{!! $errors->first('Calle', '<span class="m--font-danger">:message</span>')!!}
										</div>
										<div class="col-sm-12 col-md-4 col-lg-4">
											<label for="Numero">
												Numero*
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="Numero" name="Numero" placeholder="Numero" autofocus aria-describedby="user" value="{{old('Numero')}}">
											</div>
											{!! $errors->first('Numero', '<span class="m--font-danger">:message</span>')!!}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group">
									<div class="row ">
										<div class="col-sm-12 col-md-8 col-lg-8">
											<label for="Colonia">
												Colonia*
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="Colonia" name="Colonia" placeholder="Colonia" autofocus aria-describedby="user" value="{{old('Colonia')}}">
											</div>
											{!! $errors->first('Colonia', '<span class="m--font-danger">:message</span>')!!}
										</div>
										<div class="col-sm-12 col-md-4 col-lg-4">
											<label for="CP">
												CP*
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="CP" name="CP" placeholder="CP" autofocus aria-describedby="user" value="{{old('CP')}}">
											</div>
											{!! $errors->first('CP', '<span class="m--font-danger">:message</span>')!!}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group {{$errors->has('Referencias') ? 'has-error' : ''}}">
									<label for="Referencias">
										Referencias de ubicación del negocio
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-notes "></i>
										</span>
										<textarea class="form-control m-input" id="Referencias" name="Referencias" rows="3">{{old('Referencias')}}</textarea>
									</div>
									{!! $errors->first('Referencias', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('Telefono') ? 'has-error' : ''}}">
									<label for="Telefono">
										Telefono*
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-chat-1"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Telefono" name="Telefono" placeholder="Telefono" autofocus aria-describedby="user" value="{{old('Telefono')}}">
									</div>
									{!! $errors->first('Telefono', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="IdEstatus">
										Estatus*
									</label>
									<select class="form-control m-input m-input--solid" id="IdEstatus" name="IdEstatus">
										@foreach($estatus as $est)
											<option value="{{$est->id}}">{{$est->Nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group m-form__group">
									<label for="Activo">
										Estado*
									</label>
									<select class="form-control m-input m-input--solid" id="Activo" name="Activo">
										<option value="1">
											Activo
										</option>
										<option value="0">
											Inactivo
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
   			var id = 1;
			municipios(id);
		});

   		$( "#Estado" ).on('change', function(e){
   			console.log(e);
			var id = e.target.value;
			municipios(id);
		});


		function municipios(id)
		{
			$.get("{{route('/getmunicipios')}}?id=" + id, function(data){
				$('#IdMunicipio').empty();
				$.each(data, function(index, MunicipioObj){
					$('#IdMunicipio').append('<option value="'+ MunicipioObj.id +'">'+MunicipioObj.Nombre+'</option>');
				});
			});
		}
   </script>
@endsection