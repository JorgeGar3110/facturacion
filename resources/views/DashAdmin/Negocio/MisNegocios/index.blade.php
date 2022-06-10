@extends('DashAdmin.dashboardadmin')
@section('content')
	{{ Html::style('Compo/assets/vendors/base/vendors.bundle.css') }}
	<div class="row">
		<div class="col-xl-12">
			@include('DashAdmin.fragment.info')
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
										Agregar negocios a cliente
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
									<a href="{{route('Admin/Negocio/MisNegocios/Agregar/',$user->id)}}" class="btn btn-accent btn-sm m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">Agregar negocio</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<h6 class="m-portlet__head-text">
						Nickname: {{$user->name}}
					</h6>
					<h6 class="m-portlet__head-text">
						Correo: {{$user->email}}
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
								<th>Nombre</th>
								<th>Razon social</th>
								<th>Estado</th>
								<th colspan="4"> &nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($negocio as $negocios)
    							<tr>
    								<td>{{$negocios->Nombre}}</td>
                        			<td>{{$negocios->RazonSocial}}</td>
                        			@if($negocios->Activo =='1')
                        				<td>Activo</td>
                        			@else
                        				<td>Inactivo</td>
                        			@endif
                        			<td>
                        				<a class="btn m-btn--pill    btn-outline-info btn-sm" href="{{route ('Admin/Negocio/MisNegocios/Ver/', array($user->id, $negocios->id))}}">
                        					Ver
                        				</a>
                        				<a class="btn m-btn--pill    btn-outline-brand btn-sm" href="{{route('Admin/Negocio/MisNegocios/Editar/', array($user->id, $negocios->id))}}">
                        					Editar
                        				</a>
                        				@if($negocios->Activo =='1')
	                        				<a class="btn m-btn--pill    btn-outline-danger btn-sm" href="{{route ('Admin/Negocio/MisNegocios/Borrar/', array($user->id, $negocios->id))}}">
	                        					Borrar
	                        				</a>
	                        			@else
                        					<a class="btn m-btn--pill    btn-outline-success btn-sm" href="{{route ('Admin/Negocio/MisNegocios/Activar/', array($user->id, $negocios->id))}}">
                        						Activar
                        					</a>
                        				@endif
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
			@include('DashAdmin.fragment.usuarioinfo')
		</div>
	</div>
	<!--Tablas -->
	{{ Html::script('Compo/assets/vendors/base/vendors.bundle.js') }}
	<!--{{ Html::script('Compo/assets/demo/default/base/scripts.bundle.js') }}-->
	{{ Html::script('Compo/assets/demo/default/custom/components/datatables/base/html-table.js') }}
@endsection