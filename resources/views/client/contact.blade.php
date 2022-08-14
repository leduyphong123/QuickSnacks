@extends('layouts.layout_client')
@section('body')
<main class="mainContent-theme">
    <section class="breadcrumb-theme   mb-0 ">
        <div class="container-fluid">
            <div class="breadcrumb-list">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <a href="/" target="_self" itemprop="item"><span itemprop="name">Home Page
                                    </span></a>
                            <meta itemprop="position" content="1" />
                        </li>

                        <li class="breadcrumb-item active" itemprop="itemListElement" itemscope
                            itemtype="http://schema.org/ListItem">
                            <span itemprop="item" content="lien-he.html"><strong itemprop="name">Contact</strong></span>
                            <meta itemprop="position" content="2" />
                        </li>

                    </ol>
                </nav>
            </div>


        </div>
    </section>
    <div class="layoutPage-contact">
        <div class="wrapper-content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12 wrapbox-contact-maps">

                        <div class="box-map"> <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.615593436863!2d106.65415201477133!3d10.76408024232994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eec7752c743%3A0xd832d71bd12b6a15!2zRmxlbWluZ3RvbiBUb3dlciwgMTgyIEzDqiDEkOG6oWkgSMOgbmgsIHBoxrDhu51uZyAxNSwgUXXhuq1uIDExLCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1521530731757"
                                width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                    </div>
                    <div class="col-lg-6 col-12 wrapbox-contact-body">
                        <div class="box-header-contact">
                            <h1>Contact</h1>
                        </div>
                        <div class="box-info-contact">
                            <ul class="list-info">
                                <li>
                                    <p>My address</p>
                                    <p><strong> 4th floor, Flemington office, number 182, street Le Dai Hanh, room 15, distris
                                        11, City. Ho Chi Minh.</strong></p>
                                </li>
                                <li>
                                    <p>My Email</p>
                                    <p><strong>nguyentrungviet13032003@gmail.com</strong></p>
                                </li>
                                <li>
                                    <p>Phone</p>
                                    <p><strong>1900.636.099</strong></p>
                                </li>

                            </ul>
                        </div>
                        <div class="box-send-contact">
                            <h2>Send us contact</h2>
                            <div class="box-send-form">
                                <form accept-charset='UTF-8' action="/send-message"
                                    class='contact-form' method='post'>
                                    <input name='form_type' type='hidden' value='contact'>
                                    <input name='utf8' type='hidden' value='✓'>


                                    <div class="contact-form">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <input required type="text" name="inputName"
                                                        class="form-control" placeholder="Your Name"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="input-group">
                                                    <input required type="text" name="inputEmail"
                                                        class="form-control" placeholder="Your Email"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="input-group">
                                                    <input pattern="[0-9]{10,12}" required type="text"
                                                        name="inputPhone" class="form-control"
                                                        placeholder="Your Phone"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="input-group">
                                                    <textarea required name="inputContent" placeholder="Content"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-contact">Send us</button>
                                            </div>
                                        </div>
                                    </div>


                                    @csrf
                                </form>
                                @if (Session::has('message_sent'))
                            <div class="alert alert-success" role="alert">
                               <h6 style="color:#07d344">{{ Session::get('message_sent') }}</h6> 
                            </div>
                        @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
@endsection
