@extends('layouts.app')
@section('title', 'Restablecer contraseña - Cliente')
@section('content')
	<div class="fre-page-wrapper">
		<div class="fre-page-section">
			<div class="container">
				<div class="fre-authen-wrapper">
					<div class="fre-authen-lost-pass">
						<h2>Restablece tu Contraseña</h2>
						<p>Introduce su dirección de correo electrónico a continuación. Te enviaremos un correo electrónico para reestablecer la contraseña.</p>
						<form role="form" id="forgot_form" class="auth-form forgot_form" novalidate="novalidate">
							<!-- <ul class="fre-validate-error">
								<li>Email exists</li>
							</ul> -->
							<div class="fre-input-field">
								<input type="text" id="user_email" name="user_email" placeholder="Tu Dirección de correo electrónico">
								<!-- <div class="message">This field is required.</div> -->
							</div>
							<div class="fre-input-field">
								<button class="fre-submit-btn btn-submit  primary-bg-color">Reestablecer contraseña</button>
							</div>
						</form>
						<div class="fre-authen-footer">
							<p>¿Ya tienes una cuenta? <a href="#">Iniciar Sesión</a></p>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection