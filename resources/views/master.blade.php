<!DOCTYPE html>
<html>
<head>
	<title>Sistema de facturación</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
	</script>

    {{ Html::style('Princpal/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}

    {{ Html::style('Principal/assets/vendors/base/vendors.bundle.css') }}
	
	{{ Html::style('Principal/assets/demo/demo2/base/style.bundle.css') }}

	<link rel="shortcut icon" href="assets/demo/demo2/media/img/logo/favicon.ico" />
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
</head>
<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">
	<h1>Hola</h1>

	<!--MENU-->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<header class="m-grid__item		m-header "  data-minimize="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
			<div class="m-header__top">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- begin::Brand -->
						<div class="m-stack__item m-brand">
							<div class="m-stack m-stack--ver m-stack--general m-stack--inline">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="index.html" class="m-brand__logo-wrapper">
										{{ Html::image('img/rush2.png') }}
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- begin::Responsive Header Menu Toggler-->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- end::Responsive Header Menu Toggler-->
									<!-- begin::Topbar Toggler-->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
										<!--end::Topbar Toggler-->
								</div>
						</div>
					</div>
					<!-- end::Brand -->		
					<!-- begin::Topbar -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light">
										@auth
											<a href="{{ url ('/home') }}" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__username">
													Dashboard: {{ Auth::user()->name }}
													<i class="flaticon-users"></i>
												</span>
											</a>
										@else
											<a href="{{ route('login') }}" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__username">
														Iniciar Sesión
												</span>
											</a>
                    					@endauth
									</li>
									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light">
										@auth
										@else
											<a href="{{route ('registro') }}" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__username">
													Registrarse
												</span>
											</a>
										@endauth
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- end::Topbar -->
				</div>
			</div>
			<div class="m-header__bottom">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- begin::Horizontal Menu -->
						<div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
									<li class="m-menu__item  m-menu__item--active"  aria-haspopup="true">
										<a  href="#" class="m-menu__link ">
											<span class="m-menu__item-here"></span>
											<span class="m-menu__link-text">
												Inicio
											</span>
										</a>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
										<a  href="#" class="m-menu__link m-menu__toggle">
											<span class="m-menu__item-here"></span>
											<span class="m-menu__link-text">
												Información
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item "  aria-haspopup="true">
													<a  href="inner.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-diagram"></i>
														<span class="m-menu__link-title">
															<span class="m-menu__link-wrap">
																<span class="m-menu__link-text">
																	Nosotros Hola hhhh
																</span>
															</span>
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
													<a  href="#" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-business"></i>
														<span class="m-menu__link-text">
															Preguntas frecuentes
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="inner.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Latest Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="inner.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Pending Orders
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
										<a  href="#" class="m-menu__link m-menu__toggle">
											<span class="m-menu__item-here"></span>
											<span class="m-menu__link-text">
												Nosotros
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:600px">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<div class="m-menu__subnav">
												<ul class="m-menu__content">
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Finance Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="inner.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-map"></i>
																	<span class="m-menu__link-text">
																		Annual Reports
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Project Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="inner.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Coca Cola CRM
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel m-menu__item--more m-menu__item--icon-only"  data-menu-submenu-toggle="click" data-redirect="true" aria-haspopup="true">
										<a  href="#" class="m-menu__link m-menu__toggle">
											<span class="m-menu__item-here"></span>
											<i class="m-menu__link-icon flaticon-more-v3"></i>
											<span class="m-menu__link-text"></span>
										</a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--pull">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
													<a  href="inner.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-business"></i>
														<span class="m-menu__link-text">
															eCommerce
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  data-menu-submenu-toggle="hover" data-redirect="true" aria-haspopup="true">
													<a  href="crud/datatable_v1.html" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-computer"></i>
														<span class="m-menu__link-text">
															Audience
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  data-redirect="true" aria-haspopup="true">
																<a  href="inner.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-users"></i>
																	<span class="m-menu__link-text">
																		Active Users
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- end::Horizontal Menu -->
					</div>
				</div>
			</div>
		</header>
	<!--END::MENU-->

	<!--CUERPO DE PAGINA-->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
		@yield('content')
	</div>
	<!--END::CUERPO DE PAGINA-->


	<!--PIE DE PAGINA-->
	<footer class="m-grid__item m-footer ">
		<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
			<div class="m-footer__wrapper">
				<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
					<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
						<span class="m-footer__copyright">
							
								2018 &copy;
								<a href="https://www.rushtecnologias.com/" class="m-link">
									Rush Tecnologías
								</a>
							
						</span>
					</div>
					<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
						<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
							<li class="m-nav__item">
								<a href="#" class="m-nav__link">
									<span class="m-nav__link-text">
										Acerca de
									</span>
								</a>
							</li>
							<li class="m-nav__item">
								<a href="#"  class="m-nav__link">
									<span class="m-nav__link-text">
										Aviso de privacidad
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--END:PIE DE PAGINA-->	

    
    {{ Html::script('Principal/assets/vendors/base/vendors.bundle.js') }}
	
	{{ Html::script('Principal/assets/demo/demo2/base/scripts.bundle.js') }}

    {{ Html::script('Principal/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}

    {{ Html::script('Principal/assets/app/js/dashboard.js') }}
	
</body>
</html>