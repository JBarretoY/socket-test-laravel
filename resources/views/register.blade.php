@extends('layouts.app')
@section('title', 'registro')
@section('content')
	<div class="fre-page-wrapper">
		<div class="fre-page-section">
			<div class="container">
				<div class="fre-authen-wrapper">
					<div class="fre-register-default">
						<h2>¡Crea una cuenta ahora!</h2>
						<div class="fre-register-wrap">
							<div class="row">
								<div class="col-sm-6">
									<div class="register-employer">
										<h3>Cliente</h3>
										<p>Publique un proyecto, encuentra al consultor que mas se adapte a tus necesidades y empieza a trabajar.</p>
										<br>
										<a class="fre-btn primary-bg-color" href="{{url('/register/client')}}">Registrarse</a>	
									</div>
								</div>
								<div class="col-sm-6">
									<div class="register-freelancer">
										<h3>Consultor</h3>
										<p>Crea tu Perfil Profesional y encuentra proyectos para ofrecer tus servicios de consultoría.</p>
										<br>
										<a class="fre-btn primary-bg-color" href="{{url('/register/consultant')}}">Registrarse</a>
									</div>
								</div>
							</div>
						</div>
						<div class="fre-authen-footer">
							<p>Tambien puedes usar las siguientes redes sociales para acceder a Consultaneo.</p>
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
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection