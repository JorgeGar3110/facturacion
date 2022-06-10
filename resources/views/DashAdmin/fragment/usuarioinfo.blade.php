<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
	<div class="m-portlet__head m-portlet__head--fit">
		<div class="m-portlet__head-caption"></div>
	</div>
	<div class="m-portlet__body">
		<div class="m-widget19">
			<div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
				{{ Html::image('img/compu.jpg') }}
				<h3 class="m-widget19__title m--font-light">
					Facturación Electronica
				</h3>
				<div class="m-widget19__shadow"></div>
			</div>
			<div class="m-widget19__content">
				<div class="m-widget19__header">
					<div class="m-widget19__stats">
						<i class="flaticon-users"></i>
					</div>
				<div class="col-sm-12 col-md-12 col-lg-9">
					<div class="m-widget19__info">
						<span class="m-widget19__username">
							Administrador
						</span>
						<br>
						<span class="m-widget19__time">
							{{ Auth::user()->email }}
						</span>
					</div>
				</div>
			</div>
			<div class="m-widget19__body">
				{{$datos->Nombre}} {{$datos->Paterno}} {{$datos->Materno}}		
			</div>
		</div>
	</div>
</div>
</div>