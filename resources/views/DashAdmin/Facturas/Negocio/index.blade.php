@extends('DashAdmin.dashboardadmin')
@section('content')
	{{ Html::style('Compo/assets/vendors/base/vendors.bundle.css') }}
	<div class="row">
		<div class="col-xl-12">
			@include('DashAdmin.fragment.info')
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<div class="m-portlet m-portlet--mobile">
				<div class="row">
					<div class="col-sm-9 col-md-10 col-lg-10">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Facturas expedidas
									</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-md-2 col-lg-2">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<br>
									<a href="{{route('Admin/Negocios/Facturas')}}" class="btn btn-accent btn-sm m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">Regresar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<h6 class="m-portlet__head-text">
						Nombre: {{$negocio->Nombre}}
					</h6>
					<h6 class="m-portlet__head-text">
						Razon Social: {{$negocio->RazonSocial}}
					</h6>
					<h6 class="m-portlet__head-text">
						Dirección: {{$negocio->Calle}} #{{$negocio->Numero}} Col. {{$negocio->Colonia}}
					</h6>
					<h6 class="m-portlet__head-text">
						Telefono: {{$negocio->Telefono}}
					</h6>
					<!--begin: Search Form -->
					<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
						<div class="row align-items-center">
							<div class="col-xl-8 order-2 order-xl-1">
								<div class="form-group m-form__group row align-items-center">
									<div class="col-md-4">
										<div class="m-input-icon m-input-icon--left">
											<input type="text" class="form-control m-input m-input--solid" placeholder="Buscar..." id="generalSearch">
											<span class="m-input-icon__icon m-input-icon__icon--left">
												<span>
													<i class="la la-search"></i>
												</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end: Search Form -->
					<!--begin: Datatable -->
					<table class="m-datatable" id="html_table" width="100%">
						<thead>
							<tr>
								<th>Negocio</th>
								<th>Fecha de Solicitud</th>
								<th>Uso de CFDI</th>
								<th>Cuerpo</th>
								<th colspan="4"> &nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($factura as $facturas)
    							<tr>
    								<td>{{$facturas->Nombre}}</td>
                        			<td>{{$facturas->FechaSolicitud}}</td>
                        			<td>{{$facturas->Uso}}</td>
                        			<td>{{$facturas->Cuerpo}}</td>
                        		</tr>
                        	@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
			</div>
		</div>
	</div>
	<!--Tablas -->
	{{ Html::script('Compo/assets/vendors/base/vendors.bundle.js') }}
	<!--{{ Html::script('Compo/assets/demo/default/base/scripts.bundle.js') }}-->
	{{ Html::script('Compo/assets/demo/default/custom/components/datatables/base/html-table.js') }}
@endsection