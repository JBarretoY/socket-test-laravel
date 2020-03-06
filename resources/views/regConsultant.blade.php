@extends('layouts.app')
@section('title', 'Registro - Consultor')
@section('content')
    <div class="fre-page-wrapper">
        <div class="fre-page-section">
            <div class="container">
                <div class="fre-authen-wrapper">
                    <div class="fre-authen-register">
                        <h2>Crea tu cuenta de Consultor</h2>
                        <div id="erf_form_container_222" class="erf-container erf-label-no-label erf-layout-one-column erf-style-rounded-corner">
                            <div class="erf-reg-form-container" style="">
                                <div class="erf-content-above"></div>
                                <form method="post" enctype="multipart/form-data" action="{{ url('/user/store') }}" class="erf-form erf-front-form" data-parsley-validate="" novalidate="" autocomplete="off" data-erf-submission-id="0" data-erf-form-id="222" id="form_cons">
                                    {{ csrf_field() }}
                                    <input type="hidden" class="form-control" name="type" value="4" id="name_com">
                                    <div class="erf-form-html" id="erf_form_222">
                                        <div class="rendered-form">
                                            <div custom-type="page-break" class="page-break" style="display: none;">Page Break</div>
                                            <div class="erf-text form-group field-text-n2V76X erf-element-width-12">
                                                <label for="text-n2V76X" class="erf-text-label">Nombre</label>
                                                <input type="text" class="form-control" name="name" placeholder="Nombre" id="name">
                                                @error('name')
                                                    <div class="help text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="erf-text form-group field-text-nOfQAR erf-element-width-12">
                                                <label for="text-nOfQAR" class="erf-text-label">Apellido</label>
                                                <input type="text" class="form-control" name="lastname" placeholder="Apellido" id="lastname">
                                                @error('lastname')
                                                    <div class="help text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="erf-email form-group field-text-9d1NMB erf-element-width-12">
                                                <label for="text-9d1NMB" class="erf-email-label">Correo<span class="erf-required">*</span></label>
                                                <input type="email" required="1" class="form-control" name="email" placeholder="Correo Electronico" id="email">
                                                @error('email')
                                                    <div class="help text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="erf-text form-group field-field-PeEChUmdKxhrlob erf-element-width-12">
                                                <label for="field-PeEChUmdKxhrlob" class="erf-text-label">Usuario<span class="erf-required">*</span></label>
                                                <input type="text" required="1" placeholder="Nombre de usuario" class="form-control" name="username" id="user">
                                                @error('username')
                                                    <div class="help text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="erf-password form-group field-text-O1mfvr erf-element-width-12">
                                                <label for="text-O1mfvr" class="erf-password-label">Contraseña<span class="erf-required">*</span></label>
                                                <input type="password" required="1" placeholder="Contraseña" class="form-control" name="password" id="password">
                                                <div class="pass-wrapper" style="display: none;">
                                                    <div class="pass-graybar">
                                                        <div class="pass-colorbar"></div>
                                                    </div>
                                                    <span class="pass-text">Escribe tu password.</span>
                                                </div>
                                                @error('password')
                                                    <div class="help text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="erf-tel form-group field-field-6f6KAv3NTtYGfYK erf-element-width-12">
                                                <label for="field-6f6KAv3NTtYGfYK" class="erf-tel-label">Telefono</label>
                                                <div class="intl-tel-input allow-dropdown separate-dial-code iti-sdc-3">
                                                    <input type="tel" class="form-control" name="phone" placeholder="Telefono" enable-intl="1" id="phone" autocomplete="off">
                                                    <input type="hidden" name="field-6f6KAv3NTtYGfYK-intl" value="">
                                                </div>
                                                @error('phone')
                                                    <div class="help text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="erf-external-form-elements">
                                        <div class="erf-errors" style="display:none">
                                            <span class="erf-errors-head erf-error-row">Error occured. Please confirm your data and submit again:</span>
                                            <div class="erf-errors-body"></div>
                                        </div>
                                    </div>
                                    <!-- Contains multipage Next,Previous buttons -->
                                    <div class="erf-form-nav clearfix" current-page-index="0"></div>
                                    <!-- Single page form button -->
                                    <div class="erf-submit-button clearfix">
                                        <div class="erf-button form-group field-button-wbi1Ws erf-element-width-12 erf-btn-right">
                                            <button type="submit" class="fre-btn primary-bg-color" name="button-wbi1Ws" data-erf-btn-pos="right" id="button-wbi1Ws">Continuar y crear mi perfil </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="erform_id" value="222">
                                    <input type="hidden" name="erform_submission_nonce" value="8a5da140af">
                                    <input type="hidden" name="action" value="erf_submit_form">
                                    <input type="hidden" name="redirect_to" id="erform_redirect_to" value="http://betatest.consultaneo.com/register/?role=freelancer">
                                </form>
                            </div>
                        </div>
                        <p>Al crear una cuenta e iniciar sesión acepto los <a href="#" class="secondary-color" rel="noopener noreferrer" target="_Blank">Términos de Uso y Política de Privacidad</a> </p>
                        <div class="fre-authen-footer">
                            <p>¿Ya tienes una cuenta? <a href="#" class="secondary-color">Iniciar Sesión</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/password.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validation.js') }}"></script>
    <script src="{{ asset('assets/js/jvalidation_es.js') }}"></script>
    <script src="{{ asset('assets/js/registerConsul.js') }}"></script>
@endsection
