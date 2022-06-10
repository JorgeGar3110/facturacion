<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Administrador | Dashboard
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>


        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

        {{ Html::style('Dashboard/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}
        {{ Html::style('Dashboard/assets/vendors/base/vendors.bundle.css') }}
        {{ Html::style('Dashboard/assets/demo/demo3/base/style.bundle.css') }}

    </head>
    <!-- end::Head -->
    <!-- Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

        <div class="m-grid m-grid--hor m-grid--root m-page">
            <!-- BEGIN: Header -->
            <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand  m-brand--skin-dark ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-stack__item--center m-brand__logo">
                                    <a href="/" class="m-brand__logo-wrapper">
                                        {{ Html::image('img/rush1.png') }}
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Responsive Header Menu Toggler -->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <!-- BEGIN: Horizontal Menu -->
                            <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                                <i class="la la-close"></i>
                            </button>
                            <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                                <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                        <a  href="#" class="m-menu__link m-menu__toggle">
                                            <span class="m-menu__link-text">
                                                Uso CFDI
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/UsoCFDI/Registro')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-file"></i>
                                                        <span class="m-menu__link-text">
                                                            Crear nuevo uso CFDI
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/UsoCFDI')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-file-1"></i>
                                                        <span class="m-menu__link-text">
                                                            Ver usos de CFDI
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                        <a  href="#" class="m-menu__link m-menu__toggle">
                                            <span class="m-menu__link-text">
                                                Tipos de usuarios
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route('Admin/TipoUsuarios/Registro')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-user-add"></i>
                                                        <span class="m-menu__link-text">
                                                            Crear nuevo tipo de usuario
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/TipoUsuarios')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-users"></i>
                                                        <span class="m-menu__link-text">
                                                            Ver tipos de usuarios
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                        <a  href="#" class="m-menu__link m-menu__toggle">
                                            <span class="m-menu__link-text">
                                                Tipos de negocios
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/TipoNegocio/Registro')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-cart"></i>
                                                        <span class="m-menu__link-text">
                                                            Crear nuevo tipo de negocio
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/TipoNegocio')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-truck"></i>
                                                        <span class="m-menu__link-text">
                                                            Ver tipos de negocios
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  data-menu-submenu-toggle="click" aria-haspopup="true">
                                        <a  href="#" class="m-menu__link m-menu__toggle">
                                            <span class="m-menu__link-text">
                                                Estatus
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                            <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/Estatus/Registro')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon flaticon-cogwheel-1 "></i>
                                                        <span class="m-menu__link-text">
                                                            Crear nuevo estatus
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item "  aria-haspopup="true">
                                                    <a  href="{{route ('Admin/Estatus')}}" class="m-menu__link ">
                                                        <i class="m-menu__link-icon
                                                        flaticon-list"></i>
                                                        <span class="m-menu__link-text">
                                                            Ver estatus
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- END: Horizontal Menu -->                               <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                
                                                <span class="m-nav__link-icon">
                                                        {{ Auth::user()->name }}
                                                </span>
                                                <span class="m-nav__link-icon">
                                                    <i class="flaticon-profile-1 m-card-user__name"></i>
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center" style="background-color:black; background-size: cover;">
                                                        <div class="m-card-user m-card-user--skin-dark">
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">
                                                                    {{ Auth::user()->name }}
                                                                </span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                    {{ Auth::user()->email }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__item">
                                                                    <a href="{{route ('Admin/MisDatos')}}" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                        <span class="m-nav__link-title">
                                                                            <span class="m-nav__link-wrap">
                                                                                <span class="m-nav__link-text">
                                                                                    Mis datos
                                                                                </span>
                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="{{route ('Admin/Contraseña/Editar/')}}" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-cogwheel-2"></i>
                                                                        <span class="m-nav__link-text">
                                                                            Cambio de contraseña
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__separator m-nav__separator--fit"></li>
                                                                <li class="m-nav__item">
                                                                    <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                        Cerrar sesión
                                                                    </a>
                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                        {{ csrf_field() }}
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->

            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
                    <!-- BEGIN: Aside Menu -->
                    <div 
                        id="m_ver_menu" 
                        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark m-aside-menu--dropdown " 
                        data-menu-vertical="true"
                         data-menu-dropdown="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500">
                            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                                <li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
                                    <a  href="{{route ('Admin')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                                        <span class="m-menu__link-text">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-file-1"></i>
                                        <span class="m-menu__link-text">
                                            Facturas
                                        </span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                                <a  href="#" class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
                                                        Layouts
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route ('Admin/Negocios/Facturas')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Ver facturas por negocio
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route ('Admin/Facturas/Todas')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Ver todas las facturas
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-truck "></i>
                                        <span class="m-menu__link-text">
                                            Cliente (Negocios)
                                        </span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                                <a  href="#" class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
                                                        Layouts
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route ('Admin/Negocio/Registro') }}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Crear nuevo cliente del sistema
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route ('Admin/Negocio')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Ver clientes del sistema
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-users"></i>
                                        <span class="m-menu__link-text">
                                            Usuario del sistema
                                        </span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                                <a  href="#" class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
                                                        Layouts
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route('Admin/Cliente/Registro')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Crear nuevo usuario
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route('Admin/Cliente')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Ver usuarios
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                                    <a  href="#" class="m-menu__link m-menu__toggle">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-profile "></i>
                                        <span class="m-menu__link-text">
                                            Administradores
                                        </span>
                                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                                    </a>
                                    <div class="m-menu__submenu">
                                        <span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                                <a  href="#" class="m-menu__link ">
                                                    <span class="m-menu__item-here"></span>
                                                    <span class="m-menu__link-text">
                                                        Layouts
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route ('Admin/Administrador/Registro')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Crear nuevo administrador
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-menu__item " aria-haspopup="true" >
                                                <a  href="{{route ('Admin/Administrador')}}" class="m-menu__link ">
                                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="m-menu__link-text">
                                                        Ver administradores
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>

                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title ">
                                    Bienvenido administrador
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- END: Subheader -->
                    <div class="m-content">
                        @yield('content')
                    </div>
                </div>
            </div>


        <!-- begin::Footer -->
        <footer class="m-grid__item     m-footer ">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
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
                                        Privacidad
                                    </span>
                                </a>
                            </li>
                            <li class="m-nav__item m-nav__item">
                                <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Contactanos" data-placement="left">
                                    <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
            <!-- end::Footer -->

        <!--begin::Base Scripts -->
        {{ Html::script('Dashboard/assets/vendors/base/vendors.bundle.js') }}

        {{ Html::script('Dashboard/assets/demo/demo3/base/scripts.bundle.js') }}

        {{ Html::script('Dashboard/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}

        {{ Html::script('Dashboard/assets/app/js/dashboard.js" type="text/javascript') }}       
    </body>
    <!-- end::Body -->
</html>
