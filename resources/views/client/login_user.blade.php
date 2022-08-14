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

                            <li class="breadcrumb-item"><span>Account</span></li>
                            <li class="breadcrumb-item active"><span>Login</span></li>

                        </ol>
                    </nav>
                </div>


            </div>
        </section>
        <div class="layout-account">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 wrapbox-heading-account">
                        <div class="header-page clearfix">
                            <h1>LOGIN</h1>

                        </div>
                    </div>
                    <div class="col-md-6 col-12 wrapbox-content-account">
                        <div class="userbox">
                            <div id="login-email" class="method-form" data-form="email">
                                <div id="login">
                                    <div class="accounttype">
                                        <h2 class="title"></h2>
                                    </div>
                                    <form accept-charset='UTF-8' action='/login' id='customer_login' method='post'>
                                        <input name='form_type' type='hidden' value='customer_login'>
                                        <input name='utf8' type='hidden' value='✓'>
                                        @if (Session::get('notifications'))
                                            <h3 class="text-success text-center mb-3">@php echo Session::get('notifications');
                                                Session::put('notifications', null);
                                            @endphp</h3>
                                        @endif

                                        @php
                                            if (Session::get('fail')) {
                                                echo Session::get('fail');
                                                Session::put('fail', null);
                                            }
                                        @endphp
                                        <div class="clearfix large_form">
                                            <label for="customer_email" class="icon-field"><i
                                                    class="icon-login icon-envelope "></i></label>
                                            <input required type="email" value="" name="email" id="customer_email"
                                                placeholder="Email" class="text" />
                                        </div>

                                        <div class="clearfix large_form  large_form-mr10">
                                            <label for="customer_password" class="icon-field"><i
                                                    class="icon-login icon-shield"></i></label>
                                            <input required type="password" value="" name="password"
                                                id="customer_password" placeholder="Password" class="text"
                                                size="16" />
                                        </div>

                                        <div class="clearfix action_account_custommer">
                                            <div class="action_bottom button dark">
                                                <input class="btn btn-signin" type="submit" value="Login" />
                                            </div>
                                            <div class="req_pass">
                                                <a href="" onclick="showRecoverPasswordForm();return false;">Forgot
                                                    password?</a><br>
                                                or <a href="/client/register" title="Register">Register</a>
                                            </div>
                                        </div>

                                        <input id='5dffb67f27b3439ead8749d496167bdb' name='g-recaptcha-response'
                                            type='hidden'>
                                        <script src='../../www.google.com/recaptcha/api4d7a.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                                        <script>
                                            grecaptcha.ready(function() {
                                                grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                                    action: 'submit'
                                                }).then(function(token) {
                                                    document.getElementById('5dffb67f27b3439ead8749d496167bdb').value = token;
                                                });
                                            });
                                        </script>
                                        @csrf
                                    </form>
                                </div>
                                <div id="recover-password" style="display:none;" class="userbox">
                                    <div class="accounttype">
                                        <h2>Password recovery</h2>
                                    </div>
                                    <form accept-charset='UTF-8' action='/sendemail' method='get'>
                                        <input name='form_type' type='hidden' value='recover_customer_password'>
                                        <input name='utf8' type='hidden' value='✓'>

                                        @php
                                            if (Session::get('f')) {
                                                echo Session::get('f');
                                                Session::put('f', null);
                                            }
                                        @endphp
                                        <div class="clearfix large_form large_form-mr10">
                                            <label for="email" class="icon-field"><i
                                                    class="icon-login icon-envelope "></i></label>
                                            <input type="email" value="" size="30" name="email"
                                                placeholder="Email" id="recover-email" class="text" />
                                        </div>

                                        <div class="clearfix action_account_custommer">
                                            <div class="action_bottom button dark">
                                                <input class="btn" type="submit" value="Send" />
                                            </div>
                                            <div class="req_pass">
                                                <a href="#"
                                                    onclick="hideRecoverPasswordForm();return false;">Cancel</a>
                                            </div>
                                        </div>

                                        <input id='513764b72f954590867c53ae735f3222' name='g-recaptcha-response'
                                            type='hidden'>
                                        <script src='../../www.google.com/recaptcha/api4d7a.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                                        {{-- <script>
                                            grecaptcha.ready(function() {
                                                grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                                    action: 'submit'
                                                }).then(function(token) {
                                                    document.getElementById('513764b72f954590867c53ae735f3222').value = token;
                                                });
                                            });
                                        </script> --}}
                                    </form>
                                </div>


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
        <script type="text/javascript">
            function showRecoverPasswordForm() {
                document.getElementById('recover-password').style.display = 'block';
                document.getElementById('login').style.display = 'none';
            }

            function hideRecoverPasswordForm() {
                document.getElementById('recover-password').style.display = 'none';
                document.getElementById('login').style.display = 'block';
            }
            if (window.location.hash == '#recover') {
                showRecoverPasswordForm()
            }
        </script>
    </main>
@endsection
