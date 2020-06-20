<header class="page_header js_sticky_header">
    <div class="row align-items-center h-100 header_mobile_row">
        <div class="col flex-grow-1 col-lg-3 order-1">
            <a href="/" class="logo">
                <img class="img-fluid" src="{{asset('build/img/logo.svg')}}" alt="">
            </a>
        </div>
        <div class="col-6 d-none d-lg-block h-100 order-3 order-lg-2">
            <nav class="header_nav">
                <ul class="header_nav_menu h-100">
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('/') ? 'active' : ''}}" href="/">@lang('home.menu.main')</a>
                    </li>
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('market') ? 'active' : ''}}" href="/market">@lang('home.menu.market')</a>
                    </li>
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('contacts') ? 'active' : ''}}" href="/contacts">@lang('home.menu.contact')</a>
                    </li>
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('offers') ? 'active' : ''}}" href="/offers">@lang('home.menu.offers')</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col col-lg-3 flex-grow-0 d-flex align-items-center justify-content-end order-2 order-lg-3">
            <div class="languages">
                <div class="item {{app()->getLocale() === 'en' ? 'active' : ''}}">
                    <a href="{{route('localization.lang', 'en')}}">@lang('home.menu.eng')</a>
                </div>
                <div class="item {{app()->getLocale() === 'uk' ? 'active' : ''}}">
                    <a href="{{route('localization.lang', 'uk')}}">@lang('home.menu.ukr')</a>
                </div>
            </div>
            <div class="current_language d-block d-lg-none">
                <div class="item">
                    <div class="js_open_language">@lang('home.menu.eng')</div>
                </div>
            </div>
            <div class="d-block d-lg-none btn_menu js_open_menu">
                <img src="{{asset('build/img/menu.svg')}}" alt="">
            </div>
            <div class="d-lg-none btn_menu_close js_open_menu">
                <img src="{{asset('build/img/menu_close.svg')}}" alt="">
            </div>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#contact_us" class="btn btn-secondary btn-lg d-none d-lg-inline-block text-nowrap btn-contact">@lang('home.menu.contact.us')</a>
        </div>
    </div>
    <div class="row opened_header_mobile_row">
        <div class="col">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#contact_us" class="btn btn-primary w-100 js_open_menu">@lang('home.menu.contact.us')</a>
        </div>
    </div>
    <div class="row opened_header_mobile_row">
        <div class="col">
            <nav class="header_nav mobile">
                <ul class="header_nav_menu h-100">
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('/') ? 'active' : ''}}" href="/">@lang('home.menu.main')</a>
                    </li>
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('market') ? 'active' : ''}}" href="/market">@lang('home.menu.market')</a>
                    </li>
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('contacts') ? 'active' : ''}}" href="/contacts">@lang('home.menu.contact')</a>
                    </li>
                    <li class="header_nav_item text-center h-100">
                        <a class="header_nav_link text-decoration-none px-2 {{$request->is('offers') ? 'active' : ''}}" href="/offers">@lang('home.menu.offers')</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>