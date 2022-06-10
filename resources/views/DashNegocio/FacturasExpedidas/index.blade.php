@extends('DashNegocio.dashboardnegocio')
@section('content')
	{{ Html::style('Compo/assets/vendors/base/vendors.bundle.css') }}
	<div class="row">
		<div class="col-xl-12">
			@include('DashNegocio.fragment.warning')
			@include('DashNegocio.fragment.info')
		</div> 
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-9">
			<div class="m-portlet m-portlet--mobile">
				<div class="row">
					<div class="col-sm-8 col-md-9 col-lg-9">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Facturas por negocio
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
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
								<th>Nombre</th>
								<th>Razon social</th>
								<th>Calle</th>
								<th>Colonia</th>
								<th colspan="4"> &nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($negocio as $negocios)
    							<tr>
    								<td>{{$negocios->Nombre}}</td>
                        			<td>{{$negocios->RazonSocial}}</td>
                        			<td>{{$negocios->Calle}}</td>
                        			<td>{{$negocios->Colonia}}</td>
           
                        			<td>
                        				<a class="btn m-btn--pill    btn-outline-info btn-sm" href="{{route ('Negocio/Facturas/', $negocios->id)}}">
                        					Ver facturas
                        				</a>
                        			</td>
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

		<div class="col-sm-12 col-md-12 col-lg-3">
			@include('DashNegocio.fragment.usuarioinfo')
		</div>
	</div>
	<!--Tablas -->
	{{ Html::script('Compo/assets/vendors/base/vendors.bundle.js') }}
	<!--{{ Html::script('Compo/assets/demo/default/base/scripts.bundle.js') }}-->
	{{ Html::script('Compo/assets/demo/default/custom/components/datatables/base/html-table.js') }}
@endsection