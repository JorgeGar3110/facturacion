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
									Informacion del usuario
								</h3>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{ route('Negocio/MisDatos') }}">
							{{csrf_field()}}
							<div class="m-portlet__body">
								<div class="form-group m-form__group {{$errors->has('Nombre') ? 'has-error' : ''}}">
									<label for="Nombre">
										Nombre
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Nombre" name="Nombre" placeholder="Nombre" value="{{$datos->Nombre}}" autofocus aria-describedby="user" value="">
									</div>
									{!! $errors->first('Nombre', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('RazonSocial') ? 'has-error' : ''}}">
									<label for="RazonSocial">
										Razon Social
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-users"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="RazonSocial" name="RazonSocial" aria-describedby="RazonSocialHelp" placeholder="Razon social" value="{{$datos->RazonSocial}}" autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('RazonSocial', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('RFC') ? 'has-error' : ''}}">
									<label for="RFC">
										RFC
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-statistics "></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="RFC" name="RFC" aria-describedby="nameHelp" placeholder="RFC" value="{{$datos->RFC}}" autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('RFC', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="IdTipoNegocio">
										Tipo negocio
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
												Estado
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
												Municipio
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
												Calle
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="Calle" name="Calle" placeholder="Calle" value="{{$datos->Calle}}" autofocus aria-describedby="user" value="">
											</div>
											{!! $errors->first('Calle', '<span class="m--font-danger">:message</span>')!!}
										</div>
										<div class="col-sm-12 col-md-4 col-lg-4">
											<label for="Numero">
												Numero
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="Numero" name="Numero" placeholder="Numero" value="{{$datos->Numero}}" autofocus aria-describedby="user" value="">
											</div>
											{!! $errors->first('Numero', '<span class="m--font-danger">:message</span>')!!}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group">
									<div class="row ">
										<div class="col-sm-12 col-md-8 col-lg-8">
											<label for="Colonia">
												Colonia
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="Colonia" name="Colonia" placeholder="Colonia" value="{{$datos->Colonia}}" autofocus aria-describedby="user" value="">
											</div>
											{!! $errors->first('Colonia', '<span class="m--font-danger">:message</span>')!!}
										</div>
										<div class="col-sm-12 col-md-4 col-lg-4">
											<label for="CP">
												CP
											</label>
											<div class="input-group m-input-group">
												<span id="user" class="input-group-addon">
													<i class="flaticon-notes"></i>
												</span>
												<input type="text" class="form-control m-input m-input--solid" id="CP" name="CP" placeholder="CP" value="{{$datos->CP}}" autofocus aria-describedby="user" value="">
											</div>
											{!! $errors->first('CP', '<span class="m--font-danger">:message</span>')!!}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group {{$errors->has('Referencias') ? 'has-error' : ''}}">
									<label for="Referencias">
										Referencias
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-notes "></i>
										</span>
										<textarea class="form-control m-input" id="Referencias" name="Referencias" rows="3">{{$datos->Referencias}}</textarea>
									</div>
									{!! $errors->first('Referencias', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('Telefono') ? 'has-error' : ''}}">
									<label for="Telefono">
										Telefono
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-chat-1"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Telefono" name="Telefono" placeholder="Telefono" value="{{$datos->Telefono}}" autofocus aria-describedby="user" value="">
									</div>
									{!! $errors->first('Telefono', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="IdEstatus">
										Estatus
									</label>
									<select class="form-control m-input m-input--solid" id="IdEstatus" name="IdEstatus">
										@foreach($estatus as $est)
											<option value="{{$est->id}}">{{$est->Nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group m-form__group">
									<label for="Activo">
										Estado
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
			@include('DashNegocio.fragment.usuarioinfo')
		</div>
	</div>

	{{ Html::Script('js/jquery.min.js') }}

   <script>
   		$(document).ready(function() {
   			municipios('{{$idest->IdEstado}}');
   			$("#Estado").val("{{$idest->IdEstado}}");
   			$("#IdEstatus").val("{{$datos->IdEstatus}}");
   			$("#IdTipoNegocio").val("{{$datos->IdTipoNegocio}}");
   			$("#Activo").val("{{$datos->Activo}}");
   			$("#IdMunicipio").val("{{$datos->IdMunicipio}}");
   			municipios(1);
   			$("#IdMunicipio").val(1);
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
				$("#IdMunicipio").val("{{$datos->IdMunicipio}}");
				$("#IdMunicipio").val(1);
			});
		}
   </script>
@endsection