@extends('layouts.layout_client')
@section('body')
    <main class="mainContent-theme">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <picture>
                        <source media="(max-width: 767px)"
                            srcset="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_1_mobile486a.jpg') }}">
                        <source media="(min-width: 768px)"
                            srcset="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_1_picture486a.jpg') }}">
                        <img src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_1_picture486a.jpg') }}"
                            alt="">
                    </picture>
                </div>
                <div class="carousel-item">
                    <picture>
                        <source media="(max-width: 767px)"
                            srcset="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_2_picture486a.jpg') }}">
                        <source media="(min-width: 768px)"
                            srcset="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_2_picture486a.jpg') }}">
                        <img src="{{ asset('asset/theme.hstatic.net/200000291375/1000738823/14/home_bannerslider_2_picture486a.jpg') }}"
                            alt="">
                    </picture>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="section-index-listmenu" id="section-order-content">
            <div class="container-fluid">
                <div class="listmenu-heading">
                    <h2>Menu</h2>
                </div>
                <div class="listmenu-content ">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-3 col-xl-3 listmenu-site-nav">
                            <div class="orders-cate">
                                <ul>
                                    @foreach ($cates as $cate)

                                    <li class="">
                                        <a href="#orders-item{{$cate->ID_category}}" >
                                            {{$cate->NameCategory}}
                                        </a>
                                    </li>
                                    @endforeach
                                    {{-- <li><a href="#orders-item1">Healthy Snacks</a></li>
                                    <li><a href="#orders-item2">Snacks for kids</a></li>
                                    <li><a href="#orders-item3">Easy on stomach snacks</a></li>
                                    <li><a href="#orders-item4">Smoothies</a></li> --}}
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12  col-lg-6 col-xl-6  listmenu-site-prod">
                            <div class="orders-product">
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($cates as $cate)
                                <div class="orders-block" id="orders-item{{$cate->ID_category}}">
                                    <div class="orders-block__title">
                                        <h3>{{$cate->NameCategory}}</h3>
                                    </div>
                                    @foreach ($items[$i] as$item)
                                        <div class="card mb-3">
                                            <img class="card-img-top" alt="Card image cap"
                                                src="{{ asset('uploads/') }}/{{ $item->ImageProduct }}"
                                                style="max-height: 20rem">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->NameProduct }}</h5>
                                                <p class="card-text"> @php
                                                    echo html_entity_decode($item->Description);
                                                @endphp</p>
                                                <a class="btn btn-danger mr-0" href="/show/{{ $item->ID_product }}"
                                                    role="button">View</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @php $i++;
                                @endphp
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12 col-sm-12  col-lg-3 col-xl-3  listmenu-site-cart">
                            <div class="sticky-right addthis_mobile">
                                <div class="orders-cart d-flex flex-column">
                                    <div class="orders-cart__content orders-cart-ajax ajax-here">
                                        <div class="orders-cart--scroll">
                                            <div class="orders-cart-item">
                                                <img src="{{ asset('download.jpg') }}"
                                                alt="" >
                                                <p class="cart-empty text-center"></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        {{-- <div class="col-12 col-sm-12  col-lg-3 col-xl-3  listmenu-site-cart " >

                            </div> --}}

                        {{-- <div class="col-12 col-sm-12  col-lg-3 col-xl-3  listmenu-site-cart">
                            <div class="sticky-right addthis_mobile">
                                <div class="cart-mobile d-lg-none">
                                    <div class="flex-box d-flex">


                                        <span class="cartmb--1"><b>0</b> Món</span>
                                        <span class="cartmb--2">0₫</span>
                                        <span class="cartmb--3">Xem chi tiết</span>
                                    </div>
                                </div>
                                <div class="orders-cart d-flex flex-column">
                                    <div class="orders-cart__content orders-cart-ajax ajax-here">
                                        <div class="orders-cart--scroll">
                                            <div class="orders-cart-item">

                                                <p class="cart-empty text-center">Sản phẩm nổi bật</p>
                                            </div>
                                        </div>
                                        <div class="orders-cart-bottom">
                                            <p class="flex-total amount">Tổng cộng: <span class="orders-total">0₫</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="orders-cart__summary">

                                        <div class="orders-cart-time">
                                            <div class="action-acc" id="header-pick-time">
                                                <div class="d-flex flex-lg-wrap justify-content-between">
                                                    <div class="cart-time--action">
                                                        <p class="textbox">Thời gian giao hàng</p>
                                                        <p class="textday"><i class="far fa-clock"
                                                                aria-hidden="true"></i> Chọn thời gian </p>
                                                    </div>
                                                    <div class="cart-time--choise">
                                                        <div class="form-check choise-option sub-choise-now">
                                                            <input class="form-check-input" type="radio" name="timeRadios"
                                                                id="timeRadios-1" value="timeNow">
                                                            <label class="form-check-label" for="timeRadios-1">Giao
                                                                ngay</label>
                                                        </div>
                                                        <div class="form-check choise-option sub-choise-time">
                                                            <input class="form-check-input" type="radio" name="timeRadios"
                                                                id="timeRadios-2" value="timeDate">
                                                            <label class="form-check-label" for="timeRadios-2">Chọn thời
                                                                gian</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="cart-time--select">
                                                    <div class="sub-choise ">
                                                        <div class="form-row">
                                                            <div class="col sub-time-box">
                                                                <label>Ngày đặt</label>
                                                                <select class="choise-day">
                                                                    <option data-check="oke" value="2022-16-06">Hôm nay
                                                                    </option>
                                                                    <option data-check="" value="2022-17-06">Ngày 17-06
                                                                    </option>
                                                                    <option data-check="" value="2022-18-06">Ngày 18-06
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col sub-time-box">
                                                                <label>Khung giờ</label>
                                                                <select class="choise-time">
                                                                    <option data-hours="11" value="11:00"
                                                                        selected="selected">11:00 - 12:00</option>
                                                                    <option data-hours="12" value="12:00">12:00 - 13:00
                                                                    </option>
                                                                    <option data-hours="13" value="13:00">13:00 - 14:00
                                                                    </option>
                                                                    <option data-hours="14" value="14:00">14:00 - 15:00
                                                                    </option>
                                                                    <option data-hours="15" value="15:00">15:00 - 16:00
                                                                    </option>
                                                                    <option data-hours="16" value="16:00">16:00 - 17:00
                                                                    </option>
                                                                    <option data-hours="17" value="17:00">17:00 - 18:00
                                                                    </option>
                                                                    <option data-hours="18" value="18:00">18:00 - 19:00
                                                                    </option>
                                                                    <option data-hours="19" value="19:00">19:00 - 19:45
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col sub-time-box">
                                                                <a href="javascript:void(0)"
                                                                    class="btn-link btn-choise-submit">Xác nhận thời
                                                                    gian</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                        {{-- <div class="orders-cart-coupon ">
                                            <div class="coupon-inner d-flex  align-items-end   justify-content-between">
                                                <div class="coupon-left">
                                                    <p class="cpi-bold">Giảm ngay <b>15% </b>: <b>E27Z8NNG1RCF</b></p>
                                                    <p> Tối đa 100k cho tất cả đơn hàng</p>
                                                </div>
                                                <div class="coupon-right ">
                                                    <button class="cpi-button" data-coupon="E27Z8NNG1RCF">Sao chép
                                                        mã</button>
                                                </div>
                                            </div>
                                            <p class="coupon-note">Bạn vui lòng dán mã đã sao chép vào trang thanh toán!
                                            </p>
                                        </div>
                                        <div class="orders-cart-payment btn-check">
                                            <a class="btn-link disabled" href="/checkout">Thanh toán</a>
                                        </div> --}}
                    </div>
                </div>

            </div>
            </div>
            </div>
            </div>
            </div>
        </section>

    </main>
@endsection

@section('scripts')
@endsection
<script src="{{ asset('js/bootstrap.js') }}"></script>
