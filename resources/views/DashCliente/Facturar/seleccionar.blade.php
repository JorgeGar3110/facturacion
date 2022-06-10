@extends('DashCliente.dashboardcliente')
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
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Facturar
								<small>
									Porfavor seleccione el negocio que desea solicitar la factura
								</small>
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<!--begin: Search Form -->
					<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
						<h6><b>Filtrar</b></h6>
						<div class="row align-items-center">
							<div class="col-xl-12 order-2 order-xl-1">
								<div class="form-group m-form__group row align-items-center">
									<div class="col-md-3">
										<div class="m-form__group m-form__group--inline">
											<div class="m-form__label">
												<label>
													Estado:
												</label>
											</div>
											<div class="m-form__control">
												<select class="form-control m-input m-input--solid" id="Estado" name="Estado">
													<option value="">
														Todos
													</option>
													@foreach($estados as $est)
														<option value="{{$est->Nombre}}">
															{{$est->Nombre}}
														</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="d-md-none m--margin-bottom-10"></div>
									</div>
									<div class="col-md-3">
										<div class="m-form__group m-form__group--inline">
											<div class="m-form__label">
												<label>
													Municipio:
												</label>
											</div>
											<div class="m-form__control">
												<select class="form-control m-input m-input--solid" id="Municipio" name="Municipio">
													<option value="">
														Todos
													</option>
												</select>
											</div>
										</div>
										<div class="d-md-none m--margin-bottom-10"></div>
									</div>
									<div class="col-md-3">
										<div class="m-form__group m-form__group--inline">
											<div class="m-form__label">
												<label>
													Tipo de negocio:
												</label>
											</div>
											<div class="m-form__control">
												<select class="form-control m-input m-input--solid" id="TipNeg" name="TipNeg">
													<option value="">
														Todos
													</option>
													@foreach($tneg as $tnego)
														<option value="{{$tnego->Nombre}}">
															{{$tnego->Nombre}}
														</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="d-md-none m--margin-bottom-10"></div>
									</div>
									<div class="col-md-3">
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
					<div class="m_datatable" id="local_data">
							
					</div>
					<!--end: Datatable -->
				</div>
			</div>
		</div>
	</div>
	<!--Tablas -->
	{{ Html::script('Compo/assets/vendors/base/vendors.bundle.js') }}
	{{ Html::Script('js/jquery.min.js') }}


	<script>
		var DatatableDataLocalDemo = function () {
	//== Private functions

	// demo initializer
	var demo = function () {

		const dataJSONArray = @json($negocios);
		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
				type: 'local',
				source: dataJSONArray,
				pageSize: 10
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				// height: 450, // datatable's body's fixed height
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: false,

			search: {
				input: $('#generalSearch')
			},

			// inline and bactch editing(cooming soon)
			// editable: false,

			// columns definition
			columns: [{
				field: "Nombre",
				title: "Negocio"
			}, {
				field: "TipNegNom",
				title: "Giro",
			}, {
				field: "Calle",
				title: "Calle"
			}, {
				field: "Numero",
				title: "#",
				width: 50
			}, {
				field: "Colonia",
				title: "Colonia"
			}, {
				field: "MunNom",
				title: "Municipio"
			}, {
				field: "EstNom",
				title: "Estado"
			}, {
				field: "Actions",
				width: 110,
				title: "Acciones",
				sortable: false,
				overflow: 'visible',
				template: function (row) {
					var dropup = (row.getDatatable().getPageSize() - row.getIndex()) <= 4 ? 'dropup' : '';

					return '\
						<a class="btn m-btn--pill btn-outline-info btn-sm" href="{{route ('Cliente/Facturar/Confirmar')}}?id='+row.id+'">Seleccionar</a>\
					';
				}
			}]
		});

		var query = datatable.getDataSourceQuery();

		$('#Estado').on('change', function (e) {
			if($(this).val()=='')
			{
				if($('#Municipio option:selected').val!=''){
					datatable.search('', 'MunNom');
					$('#Municipio').val('');
					setTimeout(function(){
						datatable.search('', 'EstNom');
						//datatable.search($(this).val(), 'EstNom');
						var id = e.target.value;
						municipios(id);
					},400);
					
				}
			}
			else{
				datatable.search($(this).val(), 'EstNom');
				console.log(e);
				var id = e.target.value;
				municipios(id);
			}
			/*datatable.search($(this).val(), 'EstNom');
			console.log(e);
			var id = e.target.value;
			municipios(id);*/
		}).val(typeof query.Status !== 'undefined' ? query.Status : '');

		$('#Municipio').on('change', function () {
			datatable.search($(this).val(), 'MunNom');
		}).val(typeof query.Type !== 'undefined' ? query.Type : '');

		$('#TipNeg').on('change', function () {
			datatable.search($(this).val(), 'TipNegNom');
		}).val(typeof query.Type !== 'undefined' ? query.Type : '');

	};

	return {
		//== Public functions
		init: function () {
			// init dmeo
			demo();
			}
		};
	}();

	jQuery(document).ready(function () {
		DatatableDataLocalDemo.init();
	});

	function municipios(id)
	{
		$.get("{{route('/getmunicipios2')}}?id=" + id, function(data){
			$('#Municipio').empty();
			$('#Municipio').append('<option value="">Todos</option>');
			$.each(data, function(index, MunicipioObj){
				$('#Municipio').append('<option value="'+ MunicipioObj.Nombre +'">'+MunicipioObj.Nombre+'</option>');
			});
		});
	}
	</script>


@endsection