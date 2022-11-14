@section('title', 'Login')
@include('main')
<body class="cat__pages__login">
<!-- START: pages/login -->
<div class="cat__pages__login cat__pages__login--fullscreen" style="background-image: url('https://e-student.kpru.ac.th/web2016/img/blur-background05.jpg?fbclid=IwAR1vylZQ4i35LxZQd8zX9Vzd751VZjlB_pDRjhcFgG2ZZ25aIDSwr81lKFE')">
    <div class="cat__pages__login__block">
        <div class="row">
            <div class="col-xl-12">
                <div class="cat__pages__login__block__promo text-white text-center">
                    <h2 class="mb-3">
                        <strong></strong>
                    </h2>
                </div>
                <div class="cat__pages__login__block__inner">
                    <div class="cat__pages__login__block__form">
                        <h4 class="text-uppercase">
                            <strong>Please log in</strong>
                        </h4>
                        <br />
						@if(isset(Auth::user()->email))
							<script>window.location="/main/dashboard"</script>
						@endif
						@if($message = Session::get('error'))
							<div class="alert alert-danger alert-block">
								<button type="button" class="close" data-dismiss="alert">x</button>
								<strong>{{ $message }}</strong>
							</div>	
						@endif		
						@if (count($errors)>0)
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach	
								</ul>
							</div>
						@endif	
                        <form id="form-validation" name="form-validation" method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="Email or Username"
                                       name="email"
                                       type="text"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <a href="{{ url('/password/lost') }}" class="pull-right cat__core__link--blue cat__core__link--underlined">Forgot Password?</a>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  checked>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary mr-3" name="login" value="login">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cat__pages__login__footer text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
        </ul>
    </div>
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });
    
    });
</script>
<!-- END: page scripts -->
</body>
