<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--[if lt IE 9]><script src="//hsta tic.net/0/0/global/design/theme-default/html5shiv.js"></script><![endif]-->
    <link rel="shortcut icon" href="{{ asset('asset//theme.hstatic.net/200000291375/1000738823/14/favicon486a.png') }}"
        type="image/png" />
    <title>
        Quick Snacks
    </title>
    <link rel="preload"
        href="{{ asset('asset//theme.hstatic.net/200000291375/1000738823/14/main_style.scss486a.css') }}"
        as="style">

    <link rel="preconnect" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&amp;display=swap">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&amp;display=swap"
        as="style">

    <link rel="preconnect" href="http://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;display=swap">
    <link rel="preload" href="http://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;display=swap"
        as="style">

    <link rel="preconnect" href="{{ asset('asset//pro.fontawesome.com/releases/v5.10.0/css/all.css') }}">
    <link rel="preload" href="{{ asset('asset//pro.fontawesome.com/releases/v5.10.0/css/all.css') }}" as="style">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;display=swap' rel='stylesheet'
        type='text/css' media='all' />
    <link href="{{ asset('asset//pro.fontawesome.com/releases/v5.10.0/css/all.css') }}" rel="stylesheet">
    <link rel="preload"
        href="{{ asset('asset//theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_1_picture486a.jpg?v=327') }}"
        as="image" media="(min-width: 768px)">
    <link rel="preload"
        href="{{ asset('asset//theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_1_mobile486a.jpg?v=327') }}"
        as="image" media="(max-width: 767px)">
    <!-- css theme -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mysite.css') }}">
    <link href='{{ asset('asset//theme.hstatic.net/200000291375/1000738823/14/main_style.scss486a.css?v=327') }}'
        rel='stylesheet' type='text/css' media='all' />

</head>

<body id="quick-food-theme" class="header_style2  index">
    <div class="main-body  layoutProduct_scroll ">
        <div class="mainHeader--height">
            <header class="mainHeader  mainHeader_temp02  ">
                
                <div class="topbar">
                    <div class="container-fluid">Quick Snacks discount</div>
                </div>
                <div class="mainHeader-middle">
                    <div class="container-fluid">
                        <div class="flex-container-header">
                            <div class="header-wrap-logo">
                                <div class="wrap-logo ">
                                    <h1><a href="/" itemprop="url">Quick Snacks</a></h1>
                                </div>
                            </div>
                            <div class="header-wrap-menu d-none d-xl-block">
                                <nav class="navbar-mainmenu">
                                    <ul class="menuList-primary">
                                        <li class="active">
                                            <a href="/" title="home">
                                                Home
                                            </a>
                                        </li>

                                        <li class="has-submenu ">
                                            <a href="/all-snacks" title="Snacks">
                                                Snacks
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                            </a>
                                            <ul class="menuList-submain">
                                                <li class="">
                                                    <a href="/all-snacks">
                                                        <b>All Snacks</b>
                                                    </a>
                                                </li>
                                                @foreach ($cates as $cate)
                                                    @php
                                                        $Name = str_replace(' ', '-', $cate->NameCategory);
                                                    @endphp
                                                    <li class="">
                                                        <a href="/category/{{ $Name }}">
                                                            {{ $cate->NameCategory }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>


                                        <li class="">
                                            <a href="/contact">
                                                Contact Us
                                            </a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                            <div class="header-wrap-action">
                                <div class="header-action">
                                    <div class="header-action-item header-action_search">
                                        <div class="header-action_text">
                                            <a class="header-action__link header-action_clicked" href="/search"
                                                id="site-search-handle" aria-label="Tìm kiếm" title="Tìm kiếm">
                                                <span class="box-icon">
                                                    <svg class="svg-ico-search" id="Capa_1" x="0px"
                                                        y="0px" viewBox="0 0 451 451"
                                                        style="enable-background:new 0 0 451 451;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path
                                                                d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <span class="box-triangle">
                                                <svg viewBox="0 0 20 9" role="presentation">
                                                    <path
                                                        d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                                        fill="#ffffff"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        {{-- <div class="header-action_dropdown">
                                            <div class="header-dropdown_content">
                                                <p class="ttbold">Tìm kiếm</p>
                                                <div class="site_search">
                                                    <div class="search-box wpo-wrapper-search">
                                                        <form action="/search"
                                                            class="searchform searchform-categoris ultimate-search" action="/search" method="get">
                                                            <div class="wpo-search-inner">
                                                                <input type="hidden" name="type" value="product" />
                                                                <input required id="inputSearchAuto" name="q"
                                                                    maxlength="40" autocomplete="off"
                                                                    class="searchinput input-search search-input"
                                                                    type="text" size="20"
                                                                    placeholder="Tìm kiếm sản phẩm..."
                                                                    aria-label="Search">

                                                            </div>
                                                            <button type="submit" class="btn-search btn"
                                                                id="search-header-btn" aria-label="Tìm kiếm">
                                                                <svg version="1.1" class="svg search"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                    y="0px" viewBox="0 0 24 27"
                                                                    style="enable-background:new 0 0 24 27;"
                                                                    xml:space="preserve">
                                                                    <path
                                                                        d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                                                    </path>
                                                                    <rect x="17" y="17"
                                                                        transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                                                        width="4" height="8"></rect>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <div id="ajaxSearchResults"
                                                            class="smart-search-wrapper ajaxSearchResults"
                                                            style="display: none">
                                                            <div class="resultsContent"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="header-action-item header-action_account"
                                        style="background-color:#e6e6e6;width: 35px;height: 35px;border-radius:50%">

                                        {{-- css cho user --}}

                                        {{-- asd --}}
                                        <div class="header-wrap-menu d-none d-xl-block">
                                            <nav class="navbar-mainmenu" style="margin: 5px!important;">
                                                <ul class="menuList-primary ">

                                                    <li class="has-submenu "style="text-align: center !important;">
                                                        <span class="box-icon">
                                                            <i class="fas fa-user "aria-hidden="true"></i>
                                                        </span>

                                                        <ul class="menuList-submain">
                                                            @php
                                                                if (Session::get('id_user')) {
                                                                    $show=' <li class="">
                                                                    <a href="/profile" >
                                                                    <b>Profile</b>
                                                                     </a>
                                                                    </li>' .
                                                                        '   <li class="">
                                                                <a href="/logout">
                                                                  Logout
                                                                </a>
                                                            </li>';
                                                                    echo $show;
                                                                } else {
                                                                    echo '<li class="" >
                                                                <a href="/client/login" >
                                                                  Login
                                                                </a>
                                                            </li>' .
                                                                        '<li class="" >
                                                                <a href="/client/register" >
                                                                  Register
                                                                </a>
                                                            </li>';
                                                                    echo Session::get('id_user');
                                                                }
                                                            @endphp

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>



                                    </div>

                                    {{-- <div class="header-action-item header-action_cart">
                                        <div class="header-action_text">
                                            <a class="header-action__link " href="javascript:void(0)"
                                                id="site-cart-handle" aria-label="Giỏ hàng" title="Giỏ hàng">
                                                <span class="box-icon">
                                                    <svg class="svg-ico-cart" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 -13 456.75885 456" width="456pt">
                                                        <path
                                                            d="m150.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0">
                                                        </path>
                                                        <path
                                                            d="m446.855469 94.035156h-353.101563l-7.199218-40.300781c-4.4375-24.808594-23.882813-44.214844-48.699219-48.601563l-26.101563-4.597656c-5.441406-.96875-10.632812 2.660156-11.601562 8.097656-.964844 5.441407 2.660156 10.632813 8.101562 11.601563l26.199219 4.597656c16.53125 2.929688 29.472656 15.871094 32.402344 32.402344l35.398437 199.699219c4.179688 23.894531 24.941406 41.324218 49.199219 41.300781h210c22.0625.066406 41.546875-14.375 47.902344-35.5l47-155.800781c.871093-3.039063.320312-6.3125-1.5-8.898438-1.902344-2.503906-4.859375-3.980468-8-4zm-56.601563 162.796875c-3.773437 12.6875-15.464844 21.367188-28.699218 21.300781h-210c-14.566407.039063-27.035157-10.441406-29.5-24.800781l-24.699219-139.398437h336.097656zm0 0">
                                                        </path>
                                                        <path
                                                            d="m360.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0">
                                                        </path>
                                                    </svg>
                                                    <span class="box-icon--close">
                                                        <svg viewBox="0 0 19 19" role="presentation">
                                                            <path
                                                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                                fill-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="count-holder">
                                                        <span class="count">0</span>
                                                    </span>
                                                </span>
                                            </a>
                                            <span class="box-triangle">
                                                <svg viewBox="0 0 20 9" role="presentation">
                                                    <path
                                                        d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                                        fill="#ffffff"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="header-action_dropdown">
                                            <div class="header-dropdown_content">
                                                <div class="site-cart">
                                                    <div class="cart-ttbold">
                                                        <p class="ttbold">Cart</p>
                                                    </div>
                                                    <div class="cart-view clearfix">
                                                        <div class="cart-view-scroll">
                                                            <table id="clone-item-cart" class="table-clone-cart">
                                                                <tr class="item_2 d-none">
                                                                    <td class="img"><a href="#"
                                                                            title=""><img src="#" alt="" /></a></td>
                                                                    <td>
                                                                        <p class="pro-title">
                                                                            <a class="pro-title-view" href="#"
                                                                                title=""></a>
                                                                            <span class="variant"></span>
                                                                        </p>
                                                                        <div class="mini-cart_quantity">
                                                                            <div class="pro-quantity-view"><span
                                                                                    class="qty-value"></span>
                                                                            </div>
                                                                            <div class="pro-price-view"></div>
                                                                        </div>
                                                                        <div class="remove_link remove-cart"></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table id="cart-view">
                                                                <tr class="item-cart_empty">
                                                                    <td>
                                                                        <div class="svgico-mini-cart">
                                                                            <svg width="81" height="70"
                                                                                viewBox="0 0 81 70">
                                                                                <g transform="translate(0 2)"
                                                                                    stroke-width="4" stroke="#1e2d7d"
                                                                                    fill="none" fill-rule="evenodd">
                                                                                    <circle stroke-linecap="square"
                                                                                        cx="34" cy="60" r="6"></circle>
                                                                                    <circle stroke-linecap="square"
                                                                                        cx="67" cy="60" r="6"></circle>
                                                                                    <path
                                                                                        d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                                                    </path>
                                                                                </g>
                                                                            </svg>
                                                                        </div>
                                                                        No product
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="cart-view-total">
                                                            <table class="table-total">
                                                                <tr>
                                                                    <td class="text-left">Total</td>
                                                                    <td class="text-right" id="total-view-cart">0₫
                                                                    </td>
                                                                </tr>
                                                                <tr colspan="2">
                                                                    <td colspan="2"><a href="cart.html"
                                                                            class="linktocheckout btn">Pay</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="header-action-item header-action_order">
                                        <a class="btn-order" href="#section-order-content">
                                            <span>BUY</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="512"
                                                height="512">
                                                <path
                                                    d="M128,488H416a8,8,0,0,0,8-8V288a40.132,40.132,0,0,0-4.706-18.823L360,158V48A40.045,40.045,0,0,0,320,8H128A40.045,40.045,0,0,0,88,48V448A40.045,40.045,0,0,0,128,488ZM352,360a8,8,0,0,0,8-8V192l45.177,84.706A24.1,24.1,0,0,1,408,288V472H360a72.085,72.085,0,0,1-71.984-70.485,8,8,0,0,0-1.227-5.994l-51.894-76.8a24,24,0,1,1,39.771-26.874c.047.07.1.138.145.207l46.705,64.636A8,8,0,0,0,328,360ZM232.668,344H192a16,16,0,0,1,0-32h23.363a39.744,39.744,0,0,0,6.274,15.674ZM304,183.99V184c0,8.822-7.69,16-17.143,16a17.442,17.442,0,0,1-14.387-7.307,8,8,0,0,0-13.131,0,17.818,17.818,0,0,1-28.774,0,8,8,0,0,0-13.13,0,17.818,17.818,0,0,1-28.774,0,8,8,0,0,0-13.131,0A17.442,17.442,0,0,1,161.143,200C151.69,200,144,192.822,144,184ZM160.805,168A40.069,40.069,0,0,1,200,136h48A40.069,40.069,0,0,1,287.2,168Zm-2.259,48v-.108c.858.065,1.722.108,2.6.108a33.833,33.833,0,0,0,20.953-7.2,34.074,34.074,0,0,0,41.9,0,34.074,34.074,0,0,0,41.9,0,33.833,33.833,0,0,0,20.953,7.2c.875,0,1.739-.043,2.6-.108V216c3.609,0,6.546,3.589,6.546,8s-2.937,8-6.546,8H158.546c-3.609,0-6.546-3.589-6.546-8S154.937,216,158.546,216ZM160,248H288v8a8.009,8.009,0,0,1-8,8H168a8.009,8.009,0,0,1-8-8ZM104,48a24.028,24.028,0,0,1,24-24H320a24.028,24.028,0,0,1,24,24V72H104Zm0,40H344V344H332.089l-44.24-61.226a40.423,40.423,0,0,0-2.565-3.367A24.038,24.038,0,0,0,304,256V242.316A24.6,24.6,0,0,0,312,224a24.868,24.868,0,0,0-4.794-14.769A31.581,31.581,0,0,0,320,184a16.019,16.019,0,0,0-16-16h-.581A56.078,56.078,0,0,0,248,120H200a56.078,56.078,0,0,0-55.419,48H144a16.019,16.019,0,0,0-16,16,31.581,31.581,0,0,0,12.794,25.231A24.868,24.868,0,0,0,136,224a24.6,24.6,0,0,0,8,18.316V256a24.028,24.028,0,0,0,24,24h55.786a40,40,0,0,0-7.89,16H192a32,32,0,0,0,0,64h51.478L265.1,392H104Zm0,320H272.383a88,88,0,0,0,37.111,64H128a24.028,24.028,0,0,1-24-24Z" />
                                                <circle cx="176" cy="48" r="8" />
                                                <path d="M272,40H216a8,8,0,0,0,0,16h56a8,8,0,0,0,0-16Z" />
                                                <path
                                                    d="M224,464a24,24,0,1,0-24-24A24.028,24.028,0,0,0,224,464Zm0-32a8,8,0,1,1-8,8A8.009,8.009,0,0,1,224,432Z" />
                                            </svg>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-search-mobile ">
                    <div class=" search-box wpo-wrapper-search">
                        <form action="https://quick-food.myharavan.com/search"
                            class="searchform-mobile searchform-categoris ultimate-search">
                            <div class="wpo-search-inner">
                                <input type="hidden" name="type" value="product" />
                                <input required id="inputSearchAuto-mb" class="input-search" name="q"
                                    maxlength="40" autocomplete="off" type="text" size="20"
                                    placeholder="Search...">
                            </div>
                            <button type="submit" class="btn-search btn" id="search-header-btn-mb">
                                <span class="search-icon"><svg version="1.1" class="svg search"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 24 27"
                                        style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                        <path
                                            d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                        </path>
                                        <rect x="17" y="17"
                                            transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                            width="4" height="8"></rect>
                                    </svg></span>
                                <span class="search-close"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                    </svg></span>
                            </button>
                        </form>
                        <div id="ajaxSearchResults-mb" class="smart-search-wrapper ajaxSearchResults"
                            style="display: none">
                            <div class="resultsContent"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        {{--  --}}
        @yield('body')
        {{--  --}}
        <section class="section-index-counters mt-5">
            <div class="container">
                <div class="list-counters">
                    <div class="counters-item">
                        <div class="counters-item__inner d-flex flex-nowrap justify-content-lg-center">
                            <div class="counters-img ratiobox">
                                <img class="lazyload" data-sizes="auto"
                                    data-src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_1_fa486a.png?v=327') }}"
                                    data-lowsrc="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_1_fa486a.png?v=327') }}"
                                    src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_1_fa486a.png?v=327') }}"
                                    alt="" />
                            </div>
                            <div class="counters-info">
                                <p class="value">+ 120</p>
                                <p>Diverse menu</p>
                            </div>
                        </div>
                    </div>



                    <div class="counters-item">
                        <div class="counters-item__inner d-flex flex-nowrap justify-content-lg-center">
                            <div class="counters-img ratiobox">
                                <img class="lazyload" data-sizes="auto"
                                    data-src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_2_fa486a.png?v=327') }}"
                                    data-lowsrc="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_2_fa486a.png?v=327') }}"
                                    src={{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_2_fa486a.png?v=327') }}"
                                    alt="" />
                            </div>
                            <div class="counters-info">
                                <p class="value">+ 350</p>
                                <p>Customers every day</p>
                            </div>
                        </div>
                    </div>


                    <div class="counters-item">
                        <div class="counters-item__inner d-flex flex-nowrap justify-content-lg-center">
                            <div class="counters-img ratiobox">
                                <img class="lazyload" data-sizes="auto"
                                    data-src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_3_fa486a.png?v=327') }}"
                                    data-lowsrc="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_3_fa486a.png?v=327') }}"
                                    src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_counters_3_fa486a.png?v=327') }}"
                                    alt="" />
                            </div>
                            <div class="counters-info">
                                <p class="value">+ 10 </p>
                                <p>years of experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer id="section-main-footer" class="mainfooter-toolbar ">
            <div class="footer-container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 col-12 item-col-footer large-col">
                            <div class="footer-top-logo d-flex align-items-center">
                                <div class="footer-logo">
                                    <a href="/">Quick Snacks</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-12 col-12 item-col-footer">
                            <div class="footer-accordion-item">
                                <div class="footer-title">
                                    <h3>
                                        Menu
                                    </h3>
                                </div>
                                <div class="footer-content">
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/all-snacks">Snacks</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="copyright">
                        <p>Copyright © 2022 <a href="/homepage"> Quick Snacks</a>.</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <div id="site-overlay" class="site-overlay"></div>
    <div class="overlay-order"></div>
    <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-hidden="false"></div>
    <div class="quickviewOverlay"></div>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person"
        viewBox="0 0 16 16">
        <path
            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
    </svg>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
</body>

</html>
