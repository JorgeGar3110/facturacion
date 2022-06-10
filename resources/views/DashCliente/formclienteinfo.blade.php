@extends('DashCliente.dashboardcliente')
@section('content')
	<link href="Compo/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<div class="row">
		<div class="col-xl-12">
			@include('DashCliente.fragment.warning')
			@include('DashCliente.fragment.info')
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
									Información del usuario
								</h3>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<!--begin::Form-->
                        <form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{ route('Cliente/MisDatos', $datos->id) }}">
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
										<input type="text" class="form-control m-input m-input--solid" id="Nombre" name="Nombre" placeholder="Nombre" <?php if($datos->Nombre != Null): ?> value=" {{$datos->Nombre}}" <?php else:?> value="{{old('Nombre')}}" <?php endif ?>  autofocus aria-describedby="user" >
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
										<input type="text" class="form-control m-input m-input--solid" id="Paterno" name="Paterno" aria-describedby="PaternoHelp" placeholder="Apellido Paterno" <?php if($datos->Paterno != Null): ?> value="{{$datos->Paterno}}" <?php else:?> value="{{old('Paterno')}}" <?php endif ?> autofocus aria-describedby="arroba">
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
										<input type="text" class="form-control m-input m-input--solid" id="Materno" name="Materno" aria-describedby="MaternoHelp" placeholder="Apellido Materno" <?php if($datos->Materno != Null): ?> value="{{$datos->Materno}}" <?php else:?> value="{{old('Materno')}}" <?php endif ?> autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('Materno', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group {{$errors->has('RFC') ? 'has-error' : ''}}">
									<label for="RFC">
										RFC*
									</label>
									<div class="input-group m-input-group">
										<span id="arroba" class="input-group-addon">
											<i class="flaticon-statistics "></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="RFC" name="RFC" aria-describedby="nameHelp" placeholder="RFC" <?php if($datos->RFC != Null): ?> value="{{$datos->RFC}}" <?php else:?> value="{{old('RFC')}}" <?php endif ?> autofocus aria-describedby="arroba">
									</div>
									{!! $errors->first('RFC', '<span class="m--font-danger">:message</span>')!!}
								</div>
								<div class="form-group m-form__group">
									<label for="IdTipoUsuario">
										Tipo usuario*
									</label>
									<select class="form-control m-input m-input--solid" id="IdTipoUsuario" name="IdTipoUsuario">
										@foreach($tuser as $tusers)
											<option value="{{$tusers->id}}">{{$tusers->Nombre}}</option>
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
												<input type="text" class="form-control m-input m-input--solid" id="Calle" name="Calle" placeholder="Calle" <?php if($datos->Calle != Null): ?> value="{{$datos->Calle}}" <?php else:?> value="{{old('Calle')}}" <?php endif ?> autofocus aria-describedby="user" >
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
												<input type="text" class="form-control m-input m-input--solid" id="Numero" name="Numero" placeholder="Numero" <?php if($datos->Numero != Null): ?> value="{{$datos->Numero}}" <?php else:?> value="{{old('Numero')}}" <?php endif ?> autofocus aria-describedby="user" >
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
												<input type="text" class="form-control m-input m-input--solid" id="Colonia" name="Colonia" placeholder="Colonia" <?php if($datos->Colonia != Null): ?> value="{{$datos->Colonia}}" <?php else:?> value="{{old('Colonia')}}" <?php endif ?> autofocus aria-describedby="user" >
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
												<input type="text" class="form-control m-input m-input--solid" id="CP" name="CP" placeholder="CP" <?php if($datos->CP != Null): ?> value="{{$datos->CP}}" <?php else:?> value="{{old('CP')}}" <?php endif ?> autofocus aria-describedby="user" >
											</div>
											{!! $errors->first('CP', '<span class="m--font-danger">:message</span>')!!}
										</div>
									</div>
								</div>
								<div class="form-group m-form__group {{$errors->has('Referencias') ? 'has-error' : ''}}">
									<label for="Referencias">
										Referencias de ubicación de la vivienda
									</label>
									<div class="input-group m-input-group">
										<span id="user" class="input-group-addon">
											<i class="flaticon-notes "></i>
										</span>
										<textarea class="form-control m-input" id="Referencias" name="Referencias" rows="3"><?php if($datos->Referencias != Null): ?>{{$datos->Referencias}} <?php else:?>{{old('Referencias')}} <?php endif ?></textarea>
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
										<input type="text" class="form-control m-input m-input--solid" id="Telefono" name="Telefono" placeholder="Telefono" <?php if($datos->Telefono != Null): ?> value="{{$datos->Telefono}}" <?php else:?> value="{{old('Telefono')}}" <?php endif ?> autofocus aria-describedby="user" >
									</div>
									{!! $errors->first('Telefono', '<span class="m--font-danger">:message</span>')!!}
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
			@include('DashCliente.fragment.usuarioinfo')
		</div>
	</div>
	   {{ Html::Script('js/jquery.min.js') }}

   <script>
   		$(document).ready(function() {
   			var id = 1;
			municipios(id);
   			municipios('{{$idest->IdEstado}}');
   			$("#Estado").val("{{$idest->IdEstado}}");
   			$("#IdEstatus").val("{{$datos->IdEstatus}}");
   			$("#IdTipoUsuario").val("{{$datos->IdTipoUsuario}}");
   			$("#Activo").val("{{$datos->Activo}}");
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
			});
		}
   </script>
@endsection