@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="fre-page-wrapper">
        <div class="fre-page-section">
            <div class="container">
                <div class="fre-authen-wrapper">
                    <div class="fre-authen-login">
                        <h2>Iniciar sesión en tu cuenta</h2>
                        <form role="form" method="POST" id="signin_form" novalidate="novalidate">
                            <div class="fre-input-field">
                                <input type="text" required id="user" name="user_login" placeholder="Nombre de Usuario o Email">
                                <span class="help text-danger" id="email_validation"></span>
                            </div>
                            <div class="fre-input-field">
                                <input type="password" id="password" required name="user_pass" placeholder="Contraseña">
                                <span class="help text-danger" id="password_validation"></span>
                            </div>
                            <div class="fre-input-field">
                                <button type="submit" class="btn-submit fre-submit-btn primary-bg-color">Iniciar Sesión</button>
                            </div>
                            <div class="fre-input-field">
                                <label class="fre-checkbox login-remember" for="remember">
                                    <input id="remember" name="remember" type="checkbox">
                                    <span></span>
									Recuerdame
                                </label>
                            </div>
                        </form>
                        <div class="fre-login-social">
							<p>Accede a través de las siguientes redes</p>
		                    <ul class="login-social-list">
			                    <li id="facebook">
                                    <a href="#" class="fb facebook_auth_btn ">
                                        <i class="fa fa-facebook-square"></i>
                                        <span class="social-text">Facebook</span>
                                    </a>
                                </li>
						        <li id="google">
                                    <a href="#" class="gplus gplus_login_btn ">
                                        <i class="fa fa-google-plus-square"></i>
                                        <span class="social-text">Google</span>
                                    </a>
                                </li>
								<li id="linkedin">
                                    <a href="#" class="lkin ">
                                        <i class="fa fa-linkedin-square"></i>
                                        <span class="social-text">Linkedin</span>
                                    </a>
                                </li>
			                </ul>
		                </div>
                        <div class="fre-authen-footer">
							<div class="not-yet-register">
                                <a href="#" class="">¿No estás registrado?</a>
                            </div>
							<div class="forgot-password">
                                <a href="#" class="">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validation.js') }}"></script>
    <script src="{{ asset('assets/js/jvalidation_es.js') }}"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
@endsection
