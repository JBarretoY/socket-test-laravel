@extends('layouts.app')
@section('title', 'Buscar Perfil - Consultor')
@section('content')
    <div class="fre-page-wrapper section-archive-profile">
        <div class="fre-page-title">
            <div class="container">
                <h2>Perfiles disponibles</h2>
            </div>
        </div>
        <div class="fre-page-section">
            <div class="container">
                <div class="page-profile-list-wrap">
                    <div class="fre-profile-list-wrap">
						<div class="fre-profile-filter-box">
<!--Sospechoso-->
<script type="data/json" id="search_data"> [] </script>
                            <div class="profile-filter-header visible-sm visible-xs">
                                <a class="profile-filter-title" href="">Advance search</a>
                            </div>
                            <div class="fre-profile-list-filter">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="fre-input-field">
                                                <label for="keywords" class="fre-field-title">Palabra clave</label>
                                                <input class="keyword search" id="s" type="text" name="s" placeholder="Buscar consultores por frases clave">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fre-input-field dropdown">
                                                <label for="skills" class="fre-field-title">Habilidades</label>
                                                <input id="skills" class="dropdown-toggle fre-skill-field" type="text" placeholder="Buscar consultores por habilidades" data-toggle="dropdown" readonly="">
                                                <div class="dropdown-menu dropdown-menu-skill">
                                                    <div class="search-skill-dropdown">
                                                        <input class="fre-search-skill-dropdown" type="text">
                                                    </div>
                                                    <ul class="fre-skill-dropdown" data-name="skill">
                                                        <li>
                                                            <a class="fre-skill-item" name="admon-empresas" href="">Administración de empresas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="automa-robotica" href="">Automatización &amp; Robotica</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="automa-control-indus" href="">Automatización y control industrial</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="big-data" href="">Big Data</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="branding" href="">Branding</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="brecha-digital" href="">Brecha digital</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="cambio-organizacional" href="">Cambio organizacional</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="cambio-orga" href="">Cambio organizacional</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="ciber-sec-otros" href="">Ciber Seguridad y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="cloud-computing" href="">Cloud computing y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="contabilidad-finanzas" href="">Contabilidad &amp; Finanzas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="contabilidad-finanzas-contabilidad-finanzas" href="">Contabilidad y finanzas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="contrato" href="">Contrato</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="cultura-digital" href="">Cultura digital</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="derecho-informatico" href="">Derecho informático</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="diseno-web" href="">Diseño Web</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="e-commerce" href="">E-Commerce</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estrategia-gestion" href="">Estrategia &amp; Gestión</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estrategia-ventas" href="">Estrategia de ventas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estrategia-digital-otros" href="">Estrategia digital y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estrategia-inversion" href="">Estrategias de Inversión</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estrategia-marketing" href="">Estrategua de Marketing</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estruc-empresas" href="">Estructura de empresas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="estructura-organizacional" href="">Estructura organizacional</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="gestion-innovacion" href="">Gestión de la Innovación</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="impuestos-internos" href="">Impuestos internos</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="ing-procesos" href="">Ingeniería de procesos</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="investiga-mercado" href="">Investigación de mercado</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="machine-learning" href="">Machine Learning</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="marketing-ventas" href="">Marketing &amp; Ventas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="negocios-internacionales" href="">Negocios Internacionales</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="operaciones" href="">Operaciones</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="ope-otros" href="">Operaciones y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="plan-de-negocios" href="">Plan de negocios</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="plataformas-digitales" href="">Plataformas digitales</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="plataformas-digitales-web-data-science" href="">Plataformas digitales</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="procesos-otros" href="">Procesos y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="productividad" href="">Productividad</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="prop-intelec" href="">Propiedad Intelectual</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="reclu-otros" href="">Reclutamiento y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="recursos-humanos" href="">Recursos Humanos</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="reing-procesos" href="">Reingeniería de procesos</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="relaciones-publicas" href="">Relaciones Públicas</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="renta-otros" href="">Rentabilidad y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="seguridad-legal" href="">Seguridad &amp; Legal</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="trans-digi-innovacion" href="">Transformación Digital e Innovación</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="ux-otros" href="">UX y otros</a>
                                                        </li>
                                                        <li>
                                                            <a class="fre-skill-item" name="web-data-science" href="">Web &amp; Data Science</a>
                                                        </li>                              
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fre-input-field">
                                                <label for="total_earning" class="fre-field-title">Ganancias ()</label>
                                                    <select name="earning" id="total_earning" class="fre-chosen-single" style="display: none;">
                                                        <option value="">Cualquier monto</option>
                                                        <option value="100">0 - 100</option>
                                                        <option value="100-1000">100 - 1000</option>
                                                        <option value="1000-10000">1000 - 10000</option>
                                                        <option value="10000">Mayores a 10000 </option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single" title="" id="total_earning_chosen" style="width: 100%;">
                                                        <a class="chosen-single">
                                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                                            <span>Cualquier monto</span>
                                                            <!--Sospechoso-->
                                                            <div><b></b></div>
                                                        </a>
                                                        <div class="chosen-drop">
                                                            <div class="chosen-search"></div>
                                                            <ul class="chosen-results"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-md-4">
                                                <div class="fre-input-field project-number-worked">
                                                    <label for="project-number-worked" class="fre-field-title">Proyectos Trabajados</label>
                                                    <select name="total_projects_worked" id="project-number-worked" class="fre-chosen-single" style="display: none;">
                                                        <option value="">Cualquier proyecto trabajado</option>
                                                        <option value="10">0 - 10</option>
                                                        <option value="20">11 - 20</option>
                                                        <option value="30">21 - 30</option>
                                                        <option value="40">Mayores a 30</option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single" title="" id="project_number_worked_chosen" style="width: 100%;">
                                                        <a class="chosen-single">
                                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                                            <span>Cualquier proyecto trabajado</span>
                                                            <!--Sospechoso-->
                                                            <div><b></b></div>
                                                        </a>
                                                        <div class="chosen-drop">
                                                            <div class="chosen-search"></div>
                                                            <ul class="chosen-results"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fre-input-field">
                                                    <label for="location" class="fre-field-title">Localización</label>
                                                    <select data-chosen-width="100%" data-chosen-disable-search="" data-placeholder="Elegir país" name="country" id="country" class="fre-chosen-single" style="display: none;">
                                                        <option value="">Elegir país</option>
                                                        <option class=" alemania cat-79 level-0" value="alemania">Alemania</option>
                                                        <option class=" antigua cat-80 level-0" value="antigua">Antigua</option>
                                                        <option class=" argentina cat-81 level-0" value="argentina">Argentina</option>
                                                        <option class=" aruba cat-82 level-0" value="aruba">Aruba</option>
                                                        <option class=" australia cat-83 level-0" value="australia">Australia</option>
                                                        <option class=" bahamas cat-84 level-0" value="bahamas">Bahamas</option>
                                                        <option class=" belgica cat-85 level-0" value="belgica">Bélgica</option>
                                                        <option class=" belice cat-86 level-0" value="belice">Belice</option>
                                                        <option class=" bolivia cat-87 level-0" value="bolivia">Bolivia</option>
                                                        <option class=" brasil cat-88 level-0" value="brasil">Brasil</option>
                                                        <option class=" bulgaria cat-89 level-0" value="bulgaria">Bulgaria</option>
                                                        <option class=" canada cat-90 level-0" value="canada">Canada</option>
                                                        <option class=" chile cat-91 level-0" value="chile">Chile</option>
                                                        <option class=" chipre cat-92 level-0" value="chipre">Chipre</option>
                                                        <option class=" colombia cat-93 level-0" value="colombia">Colombia</option>
                                                        <option class=" costa-rica cat-94 level-0" value="costa-rica">Costa Rica</option>
                                                        <option class=" croacia cat-95 level-0" value="croacia">Croacia</option>
                                                        <option class=" cuba cat-96 level-0" value="cuba">Cuba</option>
                                                        <option class=" curazao cat-97 level-0" value="curazao">Curazao</option>
                                                        <option class=" dinamarca cat-98 level-0" value="dinamarca">Dinamarca</option>
                                                        <option class=" ecuador cat-99 level-0" value="ecuador">Ecuador</option>
                                                        <option class=" el-salvador cat-100 level-0" value="el-salvador">El Salvador</option>
                                                        <option class=" eslovaquia cat-101 level-0" value="eslovaquia">Eslovaquia</option>
                                                        <option class=" espana cat-102 level-0" value="espana">España</option>
                                                        <option class=" estados-unidos cat-103 level-0" value="estados-unidos">Estados Unidos</option>
                                                        <option class=" estonia cat-104 level-0" value="estonia">Estonia</option>
                                                        <option class=" finlandia cat-105 level-0" value="finlandia">Finlandia</option>
                                                        <option class=" francia cat-106 level-0" value="francia">Francia</option>
                                                        <option class=" granada cat-107 level-0" value="granada">Granada</option>
                                                        <option class=" grecia cat-108 level-0" value="grecia">Grecia</option>
                                                        <option class=" guatemala cat-109 level-0" value="guatemala">Guatemala</option>
                                                        <option class=" guayana cat-110 level-0" value="guayana">Guyana</option>
                                                        <option class=" guyana-francesa cat-111 level-0" value="guyana-francesa">Guyana Francesa</option>
                                                        <option class=" haiti cat-112 level-0" value="haiti">Haití</option>
                                                        <option class=" honduras cat-113 level-0" value="honduras">Honduras</option>
                                                        <option class=" hungria cat-114 level-0" value="hungria">Hungría</option>
                                                        <option class=" irlanda cat-115 level-0" value="irlanda">Irlanda</option>
                                                        <option class=" islas-turcas-caico cat-116 level-0" value="islas-turcas-caico">Islas Turcas y Caico</option>
                                                        <option class=" italia cat-117 level-0" value="italia">Italia</option>
                                                        <option class=" jamaica cat-118 level-0" value="jamaica">Jamaica</option>
                                                        <option class=" letonia cat-119 level-0" value="letonia">Letonia</option>
                                                        <option class=" lituania cat-120 level-0" value="lituania">Lituania</option>
                                                        <option class=" luxemburgo cat-121 level-0" value="luxemburgo">Luxemburgo</option>
                                                        <option class=" malta cat-122 level-0" value="malta">Malta</option>
                                                        <option class=" martinica cat-123 level-0" value="martinica">Martinica</option>
                                                        <option class=" mexico cat-124 level-0" value="mexico">México</option>
                                                        <option class=" nicaragua cat-125 level-0" value="nicaragua">Nicaragua</option>
                                                        <option class=" paises-bajos cat-126 level-0" value="paises-bajos">Países Bajos</option>
                                                        <option class=" panama cat-127 level-0" value="panama">Panamá</option>
                                                        <option class=" paraguay cat-128 level-0" value="paraguay">Paraguay</option>
                                                        <option class=" peru cat-129 level-0" value="peru">Perú</option>
                                                        <option class=" polonia cat-130 level-0" value="polonia">Polonia</option>
                                                        <option class=" portugal cat-131 level-0" value="portugal">Portugal</option>
                                                        <option class=" puerto-rico cat-132 level-0" value="puerto-rico">Puerto Rico</option>
                                                        <option class=" republica-checa cat-133 level-0" value="republica-checa">República Checa</option>
                                                        <option class=" republica-dominicana cat-134 level-0" value="republica-dominicana">República Dominicana</option>
                                                        <option class=" rumania cat-135 level-0" value="rumania">Rumania</option>
                                                        <option class=" san-cristobal-nieves cat-136 level-0" value="san-cristobal-nieves">San Cristobal y Nieves</option>
                                                        <option class=" san-vicente-granadinas cat-137 level-0" value="san-vicente-granadinas">San Vicente y las Granadinas</option>
                                                        <option class=" santa-lucia cat-138 level-0" value="santa-lucia">Santa Lucía</option>
                                                        <option class=" suecia cat-139 level-0" value="suecia">Suecia</option>
                                                        <option class=" suriname cat-140 level-0" value="suriname">Suriname</option>
                                                        <option class=" trinidad-tobago cat-141 level-0" value="trinidad-tobago">Trinidad y Tobago</option>
                                                        <option class=" uruguay cat-142 level-0" value="uruguay">Uruguay</option>
                                                        <option class=" venezuela cat-143 level-0" value="venezuela">Venezuela</option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single" title="" id="country_chosen" style="width: 100%;">
                                                        <a class="chosen-single chosen-default">
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
                                            </div>
                                            <div class="col-md-4">
                                                <div class="fre-input-field fre-budget-field">
                                                    <label for="budget" class="fre-field-title">Tarifa por hora ()</label>
                                                    <input id="budget" class="filter-budget-min" type="number" name="min_budget" value="0" min="0">
                                                    <span>-</span>
                                                    <input class="filter-budget-max" type="number" name="max_budget" value="2000" min="0">
                                                    <input id="hour_rate" type="hidden" name="hour_rate" value="0,2000">
                                                    <input type="hidden" name="user_available" id="user_available" value="yes">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="profile-filter-clear clear-filter secondary-color" href="">Despejar filtros</a>
                                    </form>
                                </div>
                            </div>                        
                            <div class="fre-profile-list-box">
                                <div class="fre-profile-list-wrap">
                                    <div class="fre-profile-result-sort">
                                        <div class="row">
										    <div class="col-md-4 col-md-push-8 col-sm-5 col-sm-push-7">
											    <div class="fre-profile-sort">
                                                    <select class="fre-chosen-single sort-order" name="orderby" style="display: none;">
                                                        <option value="date">Perfiles nuevos</option>
                                                        <option value="hour_rate">Tarifa por hora más alta</option>
                                                        <option value="rating">Rating más alto</option>
                                                        <option value="projects_worked">Proyectos más trabajados</option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single sort-order" title="" style="width: 100%;">
                                                        <a class="chosen-single">
                                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                                            <span>Perfiles nuevos</span>
                                                            <!--Sospechoso-->
                                                            <div><b></b></div>
                                                        </a>
                                                        <div class="chosen-drop">
                                                            <div class="chosen-search"></div>
                                                            <ul class="chosen-results"></ul>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-8 col-md-pull-4 col-sm-7 col-sm-pull-5">
                                                <div class="fre-profile-result">
                                                    <p>
                                                        <span class="plural "><span class="found_post">3</span> perfiles disponibles</span>
                                                        <span class="singular hide"><span class="found_post">3</span> perfil disponible</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								    <ul class="fre-profile-list profile-list-container">
	                                    <li class="profile-item">
                                            <div class="profile-list-wrap">
                                                <a class="profile-list-avatar" href="#">
                                                    <img alt="" src="http://betatest.consultaneo.com/file/2019/11/cropped-consultora-de-recursos-humanos-nuestro-compromiso-150x150.jpg" class="avatar avatar-96 photo avatar-default  lazyload-loaded" height="96" width="96">        
                                                </a>
                                                <h2 class="profile-list-title">
                                                    <a href="#">Alejandra</a>
                                                </h2>
                                                <p class="profile-list-subtitle">Marketing &amp; Redes</p>
                                                <div class="profile-list-info">
                                                    <div class="profile-list-detail">
                                                        <span class="rate-it" data-score="" title="Not rated yet!">
                                                            <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                            <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                            <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                            <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                                            <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                                                            <input name="score" type="hidden" readonly="">
                                                        </span>
                                                        <span>10 Años de Exp</span>
                                                        <span>0 Proyectos</span>
                                                        <span><b>$150.00</b>/hr</span>
                                                        <span style="font-weight: normal">$0 ganado</span>
                                                    </div>
                                                    <div class="profile-list-desc">
                                                        <p>asdpaspdapsd</p>            
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="profile-list-wrap">
                                                <a class="profile-list-avatar" href="#">
                                                    <img alt="" src="http://betatest.consultaneo.com/file/2019/11/cropped-fotolino-150x150.jpg" class="avatar avatar-96 photo avatar-default  lazyload-loaded" height="96" width="96">        
                                                </a>
                                                <h2 class="profile-list-title">
                                                    <a href="#">Lino</a>
                                                </h2>
                                                <p class="profile-list-subtitle">Programador Frontend</p>
                                                <div class="profile-list-info">
                                                    <div class="profile-list-detail">
                                                        <span class="rate-it" data-score="" title="Not rated yet!"><i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i><input name="score" type="hidden" readonly=""></span>
                                                        <span>10 Años de Exp</span>
                                                        <span>0 Proyectos</span>
                                                        <span><b>$300.00</b>/hr</span>
                                                        <span style="font-weight: normal">$0 ganado</span>
                                                    </div>
                                                    <div class="profile-list-desc">
                                                        <p>Programo full frontend</p>            
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="profile-item">
                                            <div class="profile-list-wrap">
                                                <a class="profile-list-avatar" href="#">
                                                    <img alt="" src="http://betatest.consultaneo.com/file/2019/11/cropped-images.jpeg" class="avatar avatar-96 photo avatar-default  lazyload-loaded" height="96" width="96">        
                                                </a>
                                                <h2 class="profile-list-title">
                                                    <a href="#">Jesus</a>
                                                </h2>
                                                <p class="profile-list-subtitle">Programador</p>
                                                <div class="profile-list-info">
                                                    <div class="profile-list-detail">
                                                        <span class="rate-it" data-score="" title="Not rated yet!"><i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i><input name="score" type="hidden" readonly=""></span>
                                                        <span>30 Años de Exp</span>
                                                        <span>1 Proyectos</span>
                                                        <span><b>$50.00</b>/hr</span>
                                                        <span style="font-weight: normal">$0 ganado</span>
                                                    </div>
                                                    <div class="profile-list-desc">
                                                        <p>asdasdsadasdasdsadasd</p>            
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="profile-no-result" style="display: none;">
                                        <div class="profile-content-none">
                                            <p>No hay resultados que coincidan con tu búsqueda!</p>
                                            <ul>
                                                <li>Intenta términos más generales</li>
                                                <li>Intenta otro método de búsqueda</li>
                                                <li>Intenta buscar mediante frases clave</li>
                                            </ul>
                                        </div>
                                    </div>
<script type="data/json" class="postdata">[{"post_parent":0,"post_title":"alejamorey","post_name":"alejamorey","post_content":"<p>asdpaspdapsd<\/p>\n","post_excerpt":"asdpaspdapsd","post_author":"21","post_status":"publish","ID":265,"post_type":"fre_profile","comment_count":"","guid":"http:\/\/betatest.consultaneo.com\/author\/alejamorey\/","status_text":"ACTIVO","post_date":"29 noviembre 2019","project_category":[],"tax_input":{"project_category":[],"skill":[],"country":[]},"country":[],"address":"","avatar":"","post_count":"","et_featured":"","et_expired_date":"","et_professional_title":"Marketing &amp; Redes","rating_score":null,"hour_rate":"150","et_experience":"10","et_receive_mail":"","currency":"","id":265,"permalink":"http:\/\/betatest.consultaneo.com\/author\/alejamorey\/","unfiltered_content":"<p>asdpaspdapsd<\/p>","the_post_thumnail":"","featured_image":"","the_post_thumbnail":"","et_avatar":"<img alt=\"\" src=\"data:image\/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" class=\"avatar avatar-70 photo avatar-default lazyload\" height=\"70\" width=\"70\" data-src=\"http:\/\/betatest.consultaneo.com\/file\/2019\/11\/cropped-consultora-de-recursos-humanos-nuestro-compromiso-150x150.jpg\">","author_link":"http:\/\/betatest.consultaneo.com\/author\/alejamorey\/","experience":"10 A\u00f1os de Exp","author_name":"Alejandra","hourly_rate_price":"<b>$150.00<\/b>\/hr","skill_list":"","user_available":"on","project_worked":"0 Proyectos","email_skill":0,"earned":"$0 ganado","excerpt":"<p>asdpaspdapsd<\/p>"},{"post_parent":0,"post_title":"Lino Hernandez","post_name":"linox","post_content":"<p>Programo full frontend<\/p>\n","post_excerpt":"Programo full frontend","post_author":"20","post_status":"publish","ID":262,"post_type":"fre_profile","comment_count":"","guid":"http:\/\/betatest.consultaneo.com\/author\/linox\/","status_text":"ACTIVO","post_date":"29 noviembre 2019","project_category":[],"tax_input":{"project_category":[],"skill":[],"country":[]},"country":[],"address":"","avatar":"","post_count":"","et_featured":"","et_expired_date":"","et_professional_title":"Programador Frontend","rating_score":null,"hour_rate":"300","et_experience":"10","et_receive_mail":"","currency":"","id":262,"permalink":"http:\/\/betatest.consultaneo.com\/author\/linox\/","unfiltered_content":"<p>Programo full frontend<\/p>","the_post_thumnail":"","featured_image":"","the_post_thumbnail":"","et_avatar":"<img alt=\"\" src=\"data:image\/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" class=\"avatar avatar-70 photo avatar-default lazyload\" height=\"70\" width=\"70\" data-src=\"http:\/\/betatest.consultaneo.com\/file\/2019\/11\/cropped-fotolino-150x150.jpg\">","author_link":"http:\/\/betatest.consultaneo.com\/author\/linox\/","experience":"10 A\u00f1os de Exp","author_name":"Lino","hourly_rate_price":"<b>$300.00<\/b>\/hr","skill_list":"","user_available":"on","project_worked":"0 Proyectos","email_skill":0,"earned":"$0 ganado","excerpt":"<p>Programo full frontend<\/p>"},{"post_parent":0,"post_title":"Jesus Castro","post_name":"dantroz","post_content":"<p>asdasdsadasdasdsadasd<\/p>\n","post_excerpt":"asdasdsadasdasdsadasd","post_author":"17","post_status":"publish","ID":227,"post_type":"fre_profile","comment_count":"","guid":"http:\/\/betatest.consultaneo.com\/author\/dantroz\/","status_text":"ACTIVO","post_date":"28 noviembre 2019","project_category":[],"tax_input":{"project_category":[],"skill":[],"country":[{"term_id":143,"name":"Venezuela","slug":"venezuela","term_group":0,"term_taxonomy_id":143,"taxonomy":"country","description":"","parent":0,"count":4,"filter":"raw"}]},"country":[143],"address":"","avatar":"","post_count":"","et_featured":"","et_expired_date":"","et_professional_title":"Programador","rating_score":null,"hour_rate":"50","et_experience":"30","et_receive_mail":"","currency":"","id":227,"permalink":"http:\/\/betatest.consultaneo.com\/author\/dantroz\/","unfiltered_content":"<p>asdasdsadasdasdsadasd<\/p>","the_post_thumnail":"","featured_image":"","the_post_thumbnail":"","et_avatar":"<img alt=\"\" src=\"data:image\/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" class=\"avatar avatar-70 photo avatar-default lazyload\" height=\"70\" width=\"70\" data-src=\"http:\/\/betatest.consultaneo.com\/file\/2019\/11\/cropped-images.jpeg\">","author_link":"http:\/\/betatest.consultaneo.com\/author\/dantroz\/","experience":"30 A\u00f1os de Exp","author_name":"Jesus","hourly_rate_price":"<b>$50.00<\/b>\/hr","skill_list":"","user_available":"on","project_worked":"1 Proyectos","email_skill":0,"earned":"$0 ganado","excerpt":"<p>asdasdsadasdasdsadasd<\/p>"}]</script>
                                </div>
                            </div>
                            <div class="fre-paginations paginations-wrapper">
<script type="application/json" class="ae_query">{"post_type":"fre_profile","post_status":"publish","orderby":"date","place_category":"","location":"","showposts":"","order":"DESC","paginate":"page"}</script>
                            </div>                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--Sospechoso-->
@endsection