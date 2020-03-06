@extends('layouts.app')
@section('title', 'Profile - Consultaneo')
@section('content')
    <div class="fre-page-wrapper list-profile-wrapper">
        <div class="fre-page-title">
            <div class="container">
                <h2>Mi Perfil</h2>
            </div>
        </div>
        <div class="fre-page-section">
            <div class="container">
                <div class="profile-employer-wrap">
				    <div class="fre-profile-box">
                        <h3> Progreso de mi perfil <a class="mantenimiento">Módulo en mantenimiento</a></h3>
                        <ul>
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" class="styled" type="checkbox" checked="">
                                <label for="checkbox2">Agregar información básica</label>
                            </div>
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" class="styled" type="checkbox" checked="">
                                <label for="checkbox2">Agregar experiencia laboral y portafolio</label>
                            </div>
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" class="styled" type="checkbox" checked="">
                                <label for="checkbox2">Agregar certificaciones a tu perfil</label>
                            </div>
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" class="styled" type="checkbox" checked="">
                                <label for="checkbox2">Agregar experiencias académicas a tu perfil</label>
                            </div>
                        </ul>
                    </div>
                    <br>
                    <div class="fre-profile-box">
                        <div class="profile-employer-info-wrap active">
                            <div class="profile-freelance-info cnt-profile-hide" id="cnt-profile-default" style="display: block">
                                <div class="freelance-info-avatar">
                                    <span class="freelance-avatar">
                                        <!--Sospechoso-->
                                        <img alt="" src="http://0.gravatar.com/avatar/0097aa01b9a0d6c37fbfe201f774a915?s=125&amp;d=mm&amp;r=G" class="avatar avatar-125 photo avatar-default  lazyload-loaded" height="125" width="125"> 
                                    </span>
                                    <span class="freelance-name">cocacola1</span>
                                </div>
                                <div class="employer-info-content">
                                    <div class="freelance-rating">
                                        <span class="rate-it" data-score="0" title="Not rated yet!">
                                            <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                                            <input name="score" type="hidden" readonly="">
                                        </span>
									    <span class="">0 proyectos publicados</span>
                                        <span> Contrata 0 Consultores</span>
									    <span class="freelance-empty-info"><i>Sin información de país</i></span>
									</div>
								    <div class="employer-mem-since">
                                        <span>Miembro desde: 15 enero 2020</span>
                                    </div>
								</div>
                            <div class="employer-info-edit">
                                <a href="javascript:void(0)" class="cons-button employer-info-edit-btn profile-show-edit-tab-btn" data-ctn_edit="ctn-edit-profile">Editar</a>
                            </div>
                            <a href="#" class="fre-view-as-others">Ver perfil como visitante</a>
                        </div>
                        <div class="profile-employer-info-edit cnt-profile-hide" id="ctn-edit-profile" style="display: none">
                            <div class="employer-info-avatar avatar-profile-page">
                                <span class="employer-avatar img-avatar image">
                                    <!--Sospechoso-->
                                    <img alt="" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="avatar avatar-125 photo avatar-default  lazyload-observe" height="125" width="125" data-src="http://0.gravatar.com/avatar/0097aa01b9a0d6c37fbfe201f774a915?s=125&amp;d=mm&amp;r=G">                                
                                </span>
                                <a href="#" id="user_avatar_browse_button">Cambiar</a>
                            </div>
                            <div class="fre-employer-info-form" id="accordion" role="tablist" aria-multiselectable="true">
                                <form id="profile_form" class="form-detail-profile-page" action="" method="post" novalidate="">
                                    <div class="fre-input-field">
                                        <input type="text" value="cocacola1" name="display_name" id="display_name" placeholder="Tu nombre">
                                    </div>
                                    <div class="fre-input-field">
										<select data-chosen-width="100%" data-validate_filed="0" data-chosen-disable-search="" data-placeholder="Choose country" name="country" id="country" class="fre-chosen-single" style="display: none;">
                                            <option value="">Elegir país</option>
                                            <option class=" alemania cat-79 level-0" value="79">Alemania</option>
                                            <option class=" antigua cat-80 level-0" value="80">Antigua</option>
                                            <option class=" argentina cat-81 level-0" value="81">Argentina</option>
                                            <option class=" aruba cat-82 level-0" value="82">Aruba</option>
                                            <option class=" australia cat-83 level-0" value="83">Australia</option>
                                            <option class=" bahamas cat-84 level-0" value="84">Bahamas</option>
                                            <option class=" belgica cat-85 level-0" value="85">Bélgica</option>
                                            <option class=" belice cat-86 level-0" value="86">Belice</option>
                                            <option class=" bolivia cat-87 level-0" value="87">Bolivia</option>
                                            <option class=" brasil cat-88 level-0" value="88">Brasil</option>
                                            <option class=" bulgaria cat-89 level-0" value="89">Bulgaria</option>
                                            <option class=" canada cat-90 level-0" value="90">Canada</option>
                                            <option class=" chile cat-91 level-0" value="91">Chile</option>
                                            <option class=" chipre cat-92 level-0" value="92">Chipre</option>
                                            <option class=" colombia cat-93 level-0" value="93">Colombia</option>
                                            <option class=" costa-rica cat-94 level-0" value="94">Costa Rica</option>
                                            <option class=" croacia cat-95 level-0" value="95">Croacia</option>
                                            <option class=" cuba cat-96 level-0" value="96">Cuba</option>
                                            <option class=" curazao cat-97 level-0" value="97">Curazao</option>
                                            <option class=" dinamarca cat-98 level-0" value="98">Dinamarca</option>
                                            <option class=" ecuador cat-99 level-0" value="99">Ecuador</option>
                                            <option class=" el-salvador cat-100 level-0" value="100">El Salvador</option>
                                            <option class=" eslovaquia cat-101 level-0" value="101">Eslovaquia</option>
                                            <option class=" espana cat-102 level-0" value="102">España</option>
                                            <option class=" estados-unidos cat-103 level-0" value="103">Estados Unidos</option>
                                            <option class=" estonia cat-104 level-0" value="104">Estonia</option>
                                            <option class=" finlandia cat-105 level-0" value="105">Finlandia</option>
                                            <option class=" francia cat-106 level-0" value="106">Francia</option>
                                            <option class=" granada cat-107 level-0" value="107">Granada</option>
                                            <option class=" grecia cat-108 level-0" value="108">Grecia</option>
                                            <option class=" guatemala cat-109 level-0" value="109">Guatemala</option>
                                            <option class=" guayana cat-110 level-0" value="110">Guyana</option>
                                            <option class=" guyana-francesa cat-111 level-0" value="111">Guyana Francesa</option>
                                            <option class=" haiti cat-112 level-0" value="112">Haití</option>
                                            <option class=" honduras cat-113 level-0" value="113">Honduras</option>
                                            <option class=" hungria cat-114 level-0" value="114">Hungría</option>
                                            <option class=" irlanda cat-115 level-0" value="115">Irlanda</option>
                                            <option class=" islas-turcas-caico cat-116 level-0" value="116">Islas Turcas y Caico</option>
                                            <option class=" italia cat-117 level-0" value="117">Italia</option>
                                            <option class=" jamaica cat-118 level-0" value="118">Jamaica</option>
                                            <option class=" letonia cat-119 level-0" value="119">Letonia</option>
                                            <option class=" lituania cat-120 level-0" value="120">Lituania</option>
                                            <option class=" luxemburgo cat-121 level-0" value="121">Luxemburgo</option>
                                            <option class=" malta cat-122 level-0" value="122">Malta</option>
                                            <option class=" martinica cat-123 level-0" value="123">Martinica</option>
                                            <option class=" mexico cat-124 level-0" value="124">México</option>
                                            <option class=" nicaragua cat-125 level-0" value="125">Nicaragua</option>
                                            <option class=" paises-bajos cat-126 level-0" value="126">Países Bajos</option>
                                            <option class=" panama cat-127 level-0" value="127">Panamá</option>
                                            <option class=" paraguay cat-128 level-0" value="128">Paraguay</option>
                                            <option class=" peru cat-129 level-0" value="129">Perú</option>
                                            <option class=" polonia cat-130 level-0" value="130">Polonia</option>
                                            <option class=" portugal cat-131 level-0" value="131">Portugal</option>
                                            <option class=" puerto-rico cat-132 level-0" value="132">Puerto Rico</option>
                                            <option class=" republica-checa cat-133 level-0" value="133">República Checa</option>
                                            <option class=" republica-dominicana cat-134 level-0" value="134">República Dominicana</option>
                                            <option class=" rumania cat-135 level-0" value="135">Rumania</option>
                                            <option class=" san-cristobal-nieves cat-136 level-0" value="136">San Cristobal y Nieves</option>
                                            <option class=" san-vicente-granadinas cat-137 level-0" value="137">San Vicente y las Granadinas</option>
                                            <option class=" santa-lucia cat-138 level-0" value="138">Santa Lucía</option>
                                            <option class=" suecia cat-139 level-0" value="139">Suecia</option>
                                            <option class=" suriname cat-140 level-0" value="140">Suriname</option>
                                            <option class=" trinidad-tobago cat-141 level-0" value="141">Trinidad y Tobago</option>
                                            <option class=" uruguay cat-142 level-0" value="142">Uruguay</option>
                                            <option class=" venezuela cat-143 level-0" value="143">Venezuela</option>
                                        </select>
                                        <div class="chosen-container chosen-container-single fre-chosen-single" title="" id="country_chosen" style="width: 100%;">
                                            <a class="chosen-single">
                                                <input class="chosen-search-input" type="text" autocomplete="off">
                                                <span>Elegir país</span>
                                                <!--Sospechoso-->
                                                <div><b></b></div>
                                            </a>
                                            <div class="chosen-drop">
                                                <div class="chosen-search"></div>
                                                <ul class="chosen-results"></ul>
                                            </div>
                                        </div>
                                    </div>
<!-- SECCION FORMULARIO CONTENIDO CONSULTORES /CLIENTE -->
                                    <div class="fre-input-field">
                                        <h3>Información sobre ti o tu empresa</h3>
                                        <div id="wp-post_content-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
                                            <link rel="stylesheet" id="dashicons-css" href="http://betatest.consultaneo.com/51shf1/css/dashicons.min.css" type="text/css" media="all">
                                            <link rel="stylesheet" id="editor-buttons-css" href="http://betatest.consultaneo.com/51shf1/css/editor.min.css" type="text/css" media="all">
                                            <div id="wp-post_content-editor-container" class="wp-editor-container">
                                                <div id="mceu_7" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;">
                                                    <div id="mceu_7-body" class="mce-container-body mce-stack-layout">
                                                        <div id="mceu_8" class="mce-top-part mce-container mce-stack-layout-item mce-first">
                                                            <div id="mceu_8-body" class="mce-container-body">
                                                                <div id="mceu_9" class="mce-toolbar-grp mce-container mce-panel mce-first mce-last" hidefocus="1" tabindex="-1" role="group">
                                                                    <div id="mceu_9-body" class="mce-container-body mce-stack-layout">
                                                                        <div id="mceu_10" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar">
                                                                            <div id="mceu_10-body" class="mce-container-body mce-flow-layout">
                                                                                <div id="mceu_11" class="mce-container mce-flow-layout-item mce-first mce-last mce-btn-group" role="group">
                                                                                    <div id="mceu_11-body">
                                                                                        <div id="mceu_0" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Negrita (Ctrl+B)">
                                                                                            <button id="mceu_0-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button>
                                                                                        </div>
                                                                                        <div id="mceu_1" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Cursiva (Ctrl+I)">
                                                                                            <button id="mceu_1-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button>
                                                                                        </div>
                                                                                        <div id="mceu_2" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Subrayado (Ctrl+U)">
                                                                                            <button id="mceu_2-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-underline"></i></button>
                                                                                        </div>
                                                                                        <div id="mceu_3" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Lista con viñetas (Shift+Alt+U)">
                                                                                            <button id="mceu_3-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button>
                                                                                        </div>
                                                                                        <div id="mceu_4" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Lista numerada (Shift+Alt+O)">
                                                                                            <button id="mceu_4-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button>
                                                                                        </div>
                                                                                        <div id="mceu_5" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Insertar/editar un enlace (Ctrl+K)">
                                                                                            <button id="mceu_5-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button>
                                                                                        </div>
                                                                                        <div id="mceu_6" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Eliminar el enlace (Shift+Alt+S)">
                                                                                            <button id="mceu_6-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-unlink"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="mceu_12" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;">
                                                            <iframe id="post_content_ifr" frameborder="0" allowtransparency="true" title="Área de texto enriquecido. Pulsa Alt-Shift-H para obtener ayuda." style="width: 100%; height: 250px; display: block;"></iframe>
                                                        </div>
                                                        <div id="mceu_13" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;">
                                                            <div id="mceu_13-body" class="mce-container-body mce-flow-layout"><div id="mceu_14" class="mce-path mce-flow-layout-item mce-first">
                                                                <div class="mce-path-item">&nbsp;</div>
                                                            </div>
                                                            <div id="mceu_15" class="mce-flow-layout-item mce-last mce-resizehandle">
                                                                <i class="mce-ico mce-i-resize"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <textarea class="wp-editor-area" rows="20" autocomplete="off" cols="40" name="post_content" id="post_content" style="display: none;" aria-hidden="true"></textarea>
                                        </div>
                                    </div>
                                </div>
<!-- SECCION FORMULARIO CONTENIDO CONSULTORES /CLIENTE -->
                                <div class="employer-info-save btn-update-profile btn-update-profile-top">
                                    <span class="employer-info-cancel-btn profile-show-edit-tab-btn" data-ctn_edit="cnt-profile-default">Cancelar &nbsp; </span>
                                    <input type="submit" class="cons-button btn-submit" value="Guardar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
            <div class="fre-profile-box">
                <div class="profile-employer-secure-wrap active">
                    <h2 class="freelance-account-title">Mi cuenta</h2>
                        <div class="profile-employer-secure cnt-profile-hide" id="cnt-account-default" style="display: block">
                            <p><span>Dirección Email:</span>cpruebaasdas@gmail.com</p>							
                            <div class="employer-secure-edit">
                                <a href="javascript:void(0)" class="cons-button profile-show-edit-tab-btn" data-ctn_edit="ctn-edit-account">Editar</a>
                            </div>
                        </div>
                        <div class="profile-employer-secure-edit cnt-profile-hide" id="ctn-edit-account" style="display: none">
                            <form id="account_form" novalidate="">
                                <div class="fre-input-field">
                                    <label>Dirección Email:</label>
                                    <input type="email" class="" id="user_email" name="user_email" value="cpruebaasdas@gmail.com" placeholder="Ingrese email">
                                </div>
                                <div class="employer-info-save btn-update-profile">
                                    <input type="submit" class="fre-normal-btn fre-btn" name="" style="width: 100%" value="Guardar">
                                    <span class="employer-info-cancel-btn profile-show-edit-tab-btn" data-ctn_edit="cnt-account-default">Cancelar</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="profile-secure-code-wrap">
                        <p>
                            <span>Contraseña</span>
                            <a href="#" class="change-password">Cambiar Contraseña</a>
                        </p>
					</div>
                </div>
            </div>
        </div>
    </div>
<!--Sospechoso-->
</div>
@endsection