@if(Session::has('warning'))
	<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-warning alert-dismissible fade show">
		<div class="m-alert__icon">
			<i class="la la-warning"></i>
		</div>
		<div class="m-alert__text">
			<strong><h5><b>{{Session::get('warning')}}</b></h5></strong>
		</div>
		<div class="m-alert__close">
			<button type="button" class="close" data-dismiss="alert" aria-label='Close'>
			</button>
		</div>
	</div>
@endif