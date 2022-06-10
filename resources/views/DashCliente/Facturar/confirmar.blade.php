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
									Confirmar
									<small>
										 negocio seleccionado
									</small>
								</h3>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="m-portlet__body">
							<h6><b>Datos del negocio seleccionado</b></h6>
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-12 col-md-6 col-xl-6">
										<label for="Nombre">
											Nombre
										</label>
										<div class="input-group m-input-group">
											<span id="user" class="input-group-addon">
												<i class="flaticon-users"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Nombre}}">
										</div>
									</div>
									<div class="col-sm-12 col-md-6 col-xl-6">
										<label for="RazonSocial">
											Razon social
										</label>
										<div class="input-group m-input-group">
											<span id="user" class="input-group-addon">
												<i class="flaticon-truck"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->RazonSocial}}">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-12 col-md-8 col-xl-8">
										<label for="Calle">
											Calle
										</label>
										<div class="input-group m-input-group">
											<span id="calle" class="input-group-addon">
												<i class="flaticon-placeholder"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Calle}}">
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-xl-4">
										<label for="Num">
											Numero exterior
										</label>
										<div class="input-group m-input-group">
											<span id="Num" class="input-group-addon">
												<i class="flaticon-placeholder"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Numero}}">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-12 col-md-8 col-xl-8">
										<label for="Col">
											Colonia
										</label>
										<div class="input-group m-input-group">
											<span id="Col" class="input-group-addon">
												<i class="flaticon-placeholder"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Colonia}}">
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-xl-4">
										<label for="Cp">
											CP.
										</label>
										<div class="input-group m-input-group">
											<span id="Cp" class="input-group-addon">
												<i class="flaticon-placeholder"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->CP}}">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-12 col-md-4 col-xl-4">
										<label for="Ciudad">
											Ciudad
										</label>
										<div class="input-group m-input-group">
											<span id="Ciudad" class="input-group-addon">
												<i class="flaticon-placeholder"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Municipio}}">
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-xl-4">
										<label for="Estado">
											Estado
										</label>
										<div class="input-group m-input-group">
											<span id="Estado" class="input-group-addon">
												<i class="flaticon-placeholder"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Estado}}">
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-xl-4">
										<label for="Telefono">
											Telefono
										</label>
										<div class="input-group m-input-group">
											<span id="Telefono" class="input-group-addon">
												<i class="flaticon-notes"></i>
											</span>
											<input type="text" class="form-control m-input" readonly value="{{$negocio->Telefono}}">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Form-->
			</div>

			<div class="m-portlet m-portlet--tab">
				<div class="row">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Facturar
									<small>
										 compra
									</small>
								</h3>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<form class="m-form m-form--fit m-form--label-align-right" role="form" method="POST" action="{{route ('Cliente/Facturar', $IdNegocio)}}">
							{{csrf_field()}}
							<div class="m-portlet__body">
								<div class="form-group m-form__group">
									<h6><b>Datos de la compra a facturar</b></h6>
								</div>
								<div class="form-group m-form__group">
									<label for="Telefono">
										Folio de compra
										<small>(Ticket, Codigo de barras, Folio, No. de venta)</small>
									</label>
									<div class="input-group m-input-group">
										<span id="Telefono" class="input-group-addon">
											<i class="flaticon-notes"></i>
										</span>
										<input type="text" class="form-control m-input m-input--solid" id="Folio" name="Folio" placeholder="Folio compra" aria-describedby="user">
									</div>
								</div>
								<div class="form-group m-form__group">
									<label for="IdUso">
										Uso CFDI
									</label>
									<select class="form-control m-input m-input--solid" id="IdUso" name="IdUso">
										@foreach($uso as $usos)
											<option value="{{$usos->id}}">
												{{$usos->Nombre}}
											</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="m-portlet__foot m-portlet__foot--fit">
								<div class="m-form__actions">
									<button type="submit" class="btn btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase btn-block">
										Solicitar factura
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-4 col-lg-3">
			@include('DashCliente.fragment.usuarioinfo')
		</div>
	</div>
@endsection