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
                                <a href="/" target="_self" itemprop="item"><span itemprop="name">Homepage
                                        </span></a>
                                <meta itemprop="position" content="1" />
                            </li>

                            <li class="breadcrumb-item"><span>Account</span></li>
                            <li class="breadcrumb-item active"><span>Register</span></li>

                        </ol>
                    </nav>
                </div>


            </div>
        </section>
        <div class="layout-account">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 wrapbox-heading-account">
                        <div class="header-page clearfix">
                            <h1>REGISTER</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 wrapbox-content-account ">
                        <div class="userbox">
                            <div id="login-email" class="method-form" data-form="email">

								@if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


								<form accept-charset='UTF-8' action='/register' id='create_customer' method='get'>

                                    <input name='form_type' type='hidden' value='create_customer'>
                                    <input name='utf8' type='hidden' value='✓'>
                                    @csrf


                                    <div id="form-first_name" class="clearfix large_form">
                                        <label for="first_name" class="label icon-field"><i
                                                class="icon-login icon-user "></i></label>
                                        <input required type="text" value="" name="name" placeholder="Name"
                                            id="first_name" class="text" size="30" />
                                    </div>

									<div id="address" class="clearfix large_form">
                                        <label for="address" class="label icon-field"><i
                                                class="icon-login icon-user "></i></label>
                                        <input required type="text" value="" name="address" placeholder="Address"
                                            id="first_name" class="text" size="100" />
                                    </div>

                                    <div id="form-email" class="clearfix large_form">
                                        <label for="email" class="label icon-field"><i
                                                class="icon-login icon-envelope "></i></label>
                                        <input required type="email" value="" placeholder="Email" name="email"
                                            id="email" class="text" size="30" />
                                            @php
                                                if(Session::get('erros')){
                                                    echo Session::get('erros');
                                                    Session::put('erros',null);
                                                }else
                                            @endphp
                                    </div>
                                    <div id="form-password" class="clearfix large_form large_form-mr10">
                                        <label for="password" class="label icon-field"><i
                                                class="icon-login icon-shield "></i></label>
                                        <input required type="password" value="" placeholder="Password"
                                            name="password" id="password" class="password text" size="30" />
                                    </div>

									<div id="phone" class="clearfix large_form large_form-mr10">
                                        <label for="phone" class="label icon-field"><i
                                                class="icon-login icon-shield "></i></label>
                                        <input required type="tel" value="" placeholder="Phone"
                                            name="phone" id="phone" class="phone" size="16" />
                                    </div>

                                    <div class="clearfix action_account_custommer">
                                        <div class="action_bottom button dark">
                                            <input class="btn" type="submit" value="Register" />
                                        </div>
                                        <div class="req_pass">
                                            <a href="/client/login" title="Login">Login</a>
                                        </div>
                                    </div>
                                    <div class="clearfix req_pass">
                                        <a class="come-back" href="/"><i class="fa fa-long-arrow-left"></i>
                                           Back to Homepage</a>
                                    </div>

                                    <input id='55cc567ce3f34dc7bd46a1f5c8763ec9' name='g-recaptcha-response' type='hidden'>
                                    <script src='../../www.google.com/recaptcha/api4d7a.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                                    <script>
                                        grecaptcha.ready(function() {
                                            grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                                action: 'submit'
                                            }).then(function(token) {
                                                document.getElementById('55cc567ce3f34dc7bd46a1f5c8763ec9').value = token;
                                            });
                                        });
                                    </script>

                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
	function On_PhoneAuthRecaptchaCallback(token){
		if(!token) return;
		var phone = $('#phone_auth_recaptcha').find('#phone_number').val(),
				allowSubmit = true;
		var validPhone = AG.Register.checkPhone(phone);
		if(validPhone == 1) {
			$('.validate-phone').html('Vui lòng nhập số điện thoại!');
			$('.validate-phone').removeClass('d-none');
		}
		if(validPhone == 2) {
			$('.validate-phone').html('Số điện thoại sai định dạng, vui lòng kiểm tra lại!');
			$('.validate-phone').removeClass('d-none');
		}
		if(validPhone == 3) {
			$('.validate-phone').html('Số điện thoại tối thiếu 10 số, tối đa 12 số!');
			$('.validate-phone').removeClass('d-none');
		}
		if(validPhone != 0) {
			allowSubmit = false;
		}
		if(allowSubmit){
			$('.validate-phone').addClass('d-none');
			$.ajax({
				type: "POST",
				url: '/phone_auth/send_verify_code',
				data: $('#phone_auth_recaptcha').serialize(),
				dataType : "json",
				success: function(data, textStatus, jqXHR){
					if(data && data.token){
						if($('#form_otp #session_info').length > 0){
							$('#form_otp #session_info').val(data.token);
							$('#form_otp').removeClass('d-none');
							$('#phone_auth_recaptcha').addClass('d-none');
						}
					}
				},
				error: function(jqXHR, textStatus, errorThrown){}
			});
		}
	}
</script> --}}
    </main>
@endsection
