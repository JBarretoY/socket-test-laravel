@extends('layouts.app')
@section('title', 'Registro - Cliente')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="sm-12 col-md-6 col-lg-6 card mt-2">
        <div class="bs-stepper card-body">
            <h2 class="text-center">Crea tu cuenta de Cliente</h2>
            <form method="post" id="form-regis-client" action="{{ url('/user/store') }}">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" name="type" value="3" id="name_com">
                <div class="bs-stepper-header" role="tablist">
                    <div class="step" data-target="#logins-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Información básica</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#information-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Información de compañia</span>
                        </button>
                    </div>
                </div>

                <div class="bs-stepper-content">
                    <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                        <div>
                            <div id="form1" class="erf-page erf-page-0">
                                <div class="erf-text form-group erf-element-width-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nombre" id="name">
                                    @error('name')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="erf-text form-group erf-element-width-12">
                                    <input type="text" class="form-control" name="lastname" placeholder="Apellido" id="lastname">
                                    @error('lastname')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="erf-email form-group erf-element-width-12">
                                    <input type="email" required="1" class="form-control" name="email" placeholder="Correo Electronico" id="email">
                                    @error('email')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="erf-text form-group erf-element-width-12">
                                    <input type="text" class="form-control" name="profession" placeholder="Profesión" id="profession">
                                    @error('profession')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="erf-text form-group erf-element-width-12">
                                    <input type="text" required placeholder="user" class="form-control" name="username" id="user">
                                    @error('username')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="erf-password form-group erf-element-width-12">
                                    <input type="password" required placeholder="Contraseña" class="form-control" name="password" id="password">
                                    <div class="pass-wrapper">
                                        <div class="pass-graybar">
                                            <div class="pass-colorbar"></div>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="erf-tel form-group erf-element-width-12">
                                    <div class="intl-tel-input allow-dropdown separate-dial-code iti-sdc-3">
                                        <input type="tel" class="form-control" enable-intl="1" id="phone" name="phone" placeholder="Telefono" autocomplete="off">
                                        <input type="hidden" name="intl">
                                    </div>
                                    @error('phone')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <button id="first-part-next">next</button> --}}
                            <button type="button" class="fre-btn primary-bg-color" name="button-wbi1Ws" data-erf-btn-pos="right" id="first-part-next">Siguiente</button>
                        </div>
                    </div>
        
                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                        <div>
                            <div class="erf-header erf-element-width-12">
                                <h3 data-non-input="1" data-ref-label="ref-sZNupRD9" data-ref-id="ref-dP9D15WR" class="">Datos Corporativos</h3>
                            </div>
                            <div class="erf-text form-group erf-element-width-12">
                                <input type="text" class="form-control" name="name_com" placeholder="Nombre de empresa" id="name_com">
                                @error('name_com')
                                    <div class="help text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="erf-header erf-element-width-12">
                                <h4 data-non-input="1" data-ref-label="ref-lgDyr5Ck" data-ref-id="ref-SFBvpsUy" class="">¿Cuantos empleados tienes?</h4>
                            </div>
                            <div class="erf-radio-group form-group erf-element-width-12">
                                <div class="radio-group">
                                    <div class="radio ">
                                        <input id="cantidadInferior" name="cantidadEmpleados" class="form-control" type="radio" value="1" data-parsley-multiple="cantidadEmpleados">
                                        <label for="cantidadInferior">Menos de 10</label>
                                    </div>
                                    <div class="radio">
                                        <input id="cantidadMediai" name="cantidadEmpleados" class="form-control" type="radio" value="2" data-parsley-multiple="cantidadEmpleados">
                                        <label for="cantidadMediai">De 11 a 50</label>
                                    </div>
                                    <div class="radio">
                                        <input id="cantidadMedia" name="cantidadEmpleados" class="form-control" type="radio" value="3" data-parsley-multiple="cantidadEmpleados">
                                        <label for="cantidadMedia">De 51 a 200</label>
                                    </div>
                                    <div class="radio">
                                        <input id="cantidadMedias" name="cantidadEmpleados" class="form-control" type="radio" value="4" data-parsley-multiple="cantidadEmpleados">
                                        <label for="cantidadMedias">De 201 a 1000</label>
                                    </div>
                                    @error('cantidadEmpleados')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="erf-text form-group erf-element-width-12">
                                <label for="field-1lQbAOc5b59uYJE" class="erf-text-label">Industria o actividad de la empresa<span class="tooltip-element" tooltip="Nombre de empresa"><i class="fa fa-info" aria-hidden="true"></i></span> </label>
                                <input type="text" class="form-control" name="field-1lQbAOc5b59uYJE" placeholder="Industria o actividad de la empresa" id="act_com">
                                @error('act_com')
                                    <div class="help text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="erf-email form-group erf-element-width-12">
                                <input  type="email" class="form-control" name="email_com" placeholder="Email corporativo" id="email_com">
                                @error('email_com')
                                    <div class="help text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="erf-text form-group erf-element-width-12">
                                <input type="text" class="form-control" name="field-7SwKNUriD9DhsSx" placeholder="Nombre del representante de la empresa" id="nom_repre">
                                @error('nom_repre')
                                    <div class="help text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="erf-tel form-group erf-element-width-12">
                                <div class="intl-tel-input allow-dropdown separate-dial-code iti-sdc-3">
                                    <input type="tel" class="form-control" name="phone_com" placeholder="Telefono de la empresa" enable-intl="1" id="phone_com" autocomplete="off">
                                    @error('phone_com')
                                        <div class="help text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="erf-header erf-element-width-12">
                                <h4 data-non-input="1" data-ref-label="ref-ndSMzwyU" data-ref-id="ref-YS2HYAiE" class="">¿Cuantos especialistas necesitas?</h4>
                            </div>
                            <div class="erf-select form-group erf-element-width-12">
                                <select class="form-control" name="cant_con" id="cant_con">
                                    <option value="1">1 Solamente</option>
                                    <option value="2">Varios</option>
                                    <option value="3">Un equipo multifuncional (Diseñadores, Desarrolladores, Gerentes de proyectos)</option>
                                    <option value="4">Lo decidiré luego</option>
                                </select>
                                @error('cant_con')
                                    <div class="help text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="erf-header erf-element-width-12">
                                <h4 data-non-input="1" data-ref-label="ref-ZgNridiZ" data-ref-id="ref-nJvhA1qN" class="">¿Que tipo de especialista necesitas?</h4>
                            </div>
                            <div class="erf-select form-group erf-element-width-12">
                                <select class="form-control" name="type_es" id="type_es">
                                    <option value="1">Un consultor o un coach, que me oriente con los pasos a seguir</option>
                                    <option value="2">Un freelancer, que realice mi proyecto o colabore en el mismo</option>
                                    <option value="3">Un colaborador fijo que efectúe distintas distintas tareas según su especialidad</option>
                                    <option value="4">Lo decidiré luego</option>
                                </select>
                                @error('type_es')
                                    <div class="help text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="erf-button form-group field-button-wbi1Ws erf-element-width-12 erf-btn-right">
                                <button type="button" class="fre-btn primary-bg-color" name="button-wbi1Ws" data-erf-btn-pos="right" id="back-button">Regresar</button>
                                <button type="submit" class="fre-btn primary-bg-color" name="button-wbi1Ws" data-erf-btn-pos="right" id="button-wbi1Ws">Continuar y crear mi perfil </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="{{ asset('assets/js/register.js') }}"></script>
@endsection
