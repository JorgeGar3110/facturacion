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
										{{$negocio->Nombre}}
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
									<a href="{{route('Negocio/MisNegocios/Editar/', $negocio->id)}}" class="btn btn-accent btn-sm m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">Editar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												ID:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->id}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Razon social:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->RazonSocial}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Email:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->email}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Nickname:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->name}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												RFC:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->RFC}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Tipo negocio:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->Tn}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Lugar:
											</h3>
											<span class="m-widget1__desc"> 
												{{$lugar->Municipio}}, {{$lugar->Estado}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Dirección:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->Calle}} # {{$negocio->Numero}} Colonia {{$negocio->Colonia}} CP. {{$negocio->CP}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Referencias:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->Referencias}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="m-widget1">
								<div class="m-widget1__item">
									<div class="row m-row--no-padding align-items-center">
										<div class="col">
											<h3 class="m-widget1__title">
												Telefono:
											</h3>
											<span class="m-widget1__desc"> 
												{{$negocio->Telefono}}
											</span>
										</div>
										<div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												<i class="flaticon-list-1"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
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