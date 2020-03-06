@extends('layouts.app')
@section('title', 'Buscar Proyecto - Consultor')
@section('content')
    <div class="fre-page-wrapper">
        <div class="fre-page-title">
            <div class="container">
                <h2>Proyectos disponibles</h2>
            </div>
        </div>
        <div class="fre-page-section section-archive-project">
            <div class="container">
                <div class="page-project-list-wrap">
                    <div class="fre-project-list-wrap">			
                        <div class="fre-project-filter-box">
                        <!--Sospechoso-->
<script type="data/json" id="search_data"> []</script>
                            <div class="project-filter-header visible-sm visible-xs">
                                <a class="project-filter-title" href="">Advance search</a>
                            </div>
                            <div class="fre-project-list-filter">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="fre-input-field">
                                                <label for="s" class="fre-field-title">Palabra clave</label>
                                                <input class="keyword search" id="s" type="text" name="s" placeholder="Buscar proyectos por frase clave">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="fre-input-field dropdown">
                                                <label for="skills" class="fre-field-title">Habilidades</label>
                                                <input id="skills" class="dropdown-toggle fre-skill-field" readonly="" type="text" placeholder="Buscar proyectos por habilidad" data-toggle="dropdown">
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
                                                <label for="project_category" class="fre-field-title">Categoría</label>
						                        <select data-chosen-width="100%" data-chosen-disable-search="" data-placeholder="Seleccionar categorías" name="project_category" id="project_category" class="fre-chosen-single" style="display: none;">
                                                    <option value="">Seleccionar categoría</option>
                                                    <option class=" auto-robotica cat-239 level-0" value="auto-robotica">Automatización &amp; Robótica</option>
                                                    <option class=" autom-control-industrial cat-242 level-1" value="autom-control-industrial">Automatización y control industrial</option>
                                                    <option class=" ing-procesos cat-240 level-1" value="ing-procesos">Ingeniería de procesos</option>
                                                    <option class=" opera-otros cat-243 level-1" value="opera-otros">Operaciones y otros</option>
                                                    <option class=" reing-procesos cat-241 level-1" value="reing-procesos">Reingenieria de procesos</option>
                                                    <option class=" contabilidad-finanzas cat-244 level-0" value="contabilidad-finanzas">Contabilidad &amp; Finanzas</option>
                                                    <option class=" admon-empresas cat-245 level-1" value="admon-empresas">Administración de empresas</option>
                                                    <option class=" cambio-organizacional-contabilidad-finanzas cat-247 level-1" value="cambio-organizacional-contabilidad-finanzas">Cambio organizacional</option>
                                                    <option class=" estruc-empresas cat-246 level-1" value="estruc-empresas">Estructura de empresas</option>
                                                    <option class=" reclu-otros cat-248 level-1" value="reclu-otros">Reclutamiento y otros</option>
                                                    <option class=" estrategia-gestion cat-211 level-0" value="estrategia-gestion">Estrategia &amp; Gestión</option>
                                                    <option class=" estrateg-inversion cat-212 level-1" value="estrateg-inversion">Estrategia de Inversión</option>
                                                    <option class=" neg-internacionales cat-213 level-1" value="neg-internacionales">Negocios internacionales</option>
                                                    <option class=" operaciones cat-214 level-1" value="operaciones">Operaciones</option>
                                                    <option class=" plan-de-negocios cat-215 level-1" value="plan-de-negocios">Plan de negocios</option>
                                                    <option class=" procesos-otros cat-217 level-1" value="procesos-otros">Procesos &amp; Otros</option>
                                                    <option class=" productividad cat-216 level-1" value="productividad">Productividad</option>
                                                    <option class=" marketing-ventas cat-218 level-0" value="marketing-ventas">Marketing &amp; Ventas</option>
                                                    <option class=" branding cat-219 level-1" value="branding">Branding</option>
                                                    <option class=" estrateg-marketing cat-223 level-1" value="estrateg-marketing">Estrategia de marketing</option>
                                                    <option class=" estrateg-ventas cat-222 level-1" value="estrateg-ventas">Estrategia de ventas</option>
                                                    <option class=" invest-mercado cat-220 level-1" value="invest-mercado">Investigación de mercado</option>
                                                    <option class=" relaciones-publicas cat-221 level-1" value="relaciones-publicas">Relaciones Públicas</option>
                                                    <option class=" ux-otros cat-224 level-1" value="ux-otros">UX y otros</option>
                                                    <option class=" seguridad-legal cat-249 level-0" value="seguridad-legal">Seguridad &amp; Legal</option>
                                                    <option class=" ciber-seguridad-otros cat-253 level-1" value="ciber-seguridad-otros">Ciber seguridad y otros</option>
                                                    <option class=" contrato cat-250 level-1" value="contrato">Contrato</option>
                                                    <option class=" derecho-informatico cat-251 level-1" value="derecho-informatico">Derecho informático</option>
                                                    <option class=" propiedad-intelectual cat-252 level-1" value="propiedad-intelectual">Propiedad intelectual</option>
                                                    <option class=" trans-digi-inno cat-225 level-0" value="trans-digi-inno">Transformación Digital e Innovación</option>
                                                    <option class=" brecha-digital cat-228 level-1" value="brecha-digital">Brecha Digital</option>
                                                    <option class=" cambio-organizacional cat-227 level-1" value="cambio-organizacional">Cambio organizacional</option>
                                                    <option class=" cultura-digital cat-229 level-1" value="cultura-digital">Cultura Digital</option>
                                                    <option class=" estrateg-digi-otros cat-231 level-1" value="estrateg-digi-otros">Estrategia digital y otros</option>
                                                    <option class=" gestion-innovacion cat-230 level-1" value="gestion-innovacion">Gestión de la innovación</option>
                                                    <option class=" plataformas-digitales cat-226 level-1" value="plataformas-digitales">Plataformas Digitales</option>
                                                    <option class=" web-data-science cat-232 level-0" value="web-data-science">Web &amp; Data Science</option>
                                                    <option class=" big-data cat-233 level-1" value="big-data">Big Data</option>
                                                    <option class=" cloud-computing cat-238 level-1" value="cloud-computing">Cloud computing y otros</option>
                                                    <option class=" diseno-web cat-236 level-1" value="diseno-web">Diseño Web</option>
                                                    <option class=" e-commerce cat-235 level-1" value="e-commerce">E-Commerce</option>
                                                    <option class=" machine-learning cat-237 level-1" value="machine-learning">Machine Learning</option>
                                                    <option class=" plataformas-digitales-web-data-science-2 cat-234 level-1" value="plataformas-digitales-web-data-science-2">Plataformas Digitales</option>
                                                </select>
                                            <div class="chosen-container chosen-container-single fre-chosen-single" title="" id="project_category_chosen" style="width: 100%;">
                                                <a class="chosen-single">
                                                    <input class="chosen-search-input" type="text" autocomplete="off">
                                                    <span>Seleccionar categoría</span>
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
                                        <div class="fre-input-field project-number-bids">
                                            <label for="number_bids" class="fre-field-title">Oferta</label>
                                            <select name="number_bids" id="number-bids" class="fre-chosen-single" style="display: none;">
                                                <option value="">Cualquier oferta</option>
                                                <option value="0,10">0 - 10</option>
                                                <option value="11,20">11 - 20</option>
                                                <option value="21,30">21 - 30</option>
                                                <option value="31">Mayores a 30</option>
                                            </select>
                                            <div class="chosen-container chosen-container-single fre-chosen-single" title="" id="number_bids_chosen" style="width: 100%;">
                                                <a class="chosen-single">
                                                    <input class="chosen-search-input" type="text" autocomplete="off">
                                                    <span>Cualquier oferta</span>
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
                                            <label for="country" class="fre-field-title">Localización</label>
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
                                            <label for="budget" class="fre-field-title">Presupuestos()</label>
                                            <input id="budget" class="filter-budget-min" type="number" name="min_budget" value="0" min="0">
                                            <span>-</span>
                                            <input class="filter-budget-max" type="number" name="max_budget" value="2000" min="0">
                                            <input id="et_budget" type="hidden" name="et_budget" value="0,2000">
                                        </div>
                                    </div>
                                </div>
                                <a class="project-filter-clear clear-filter secondary-color" href="">Despejar filtros</a>
                            </form>
                        </div>
                    </div>                        
                    <div class="fre-project-list-box">
                        <div class="fre-project-list-wrap">
                            <div class="fre-project-result-sort">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-push-8">
                                        <div class="fre-project-sort">
                                            <select class="fre-chosen-single sort-order" id="project_orderby" name="orderby" style="display: none;">
                                                <option value="date">Últimos proyectos</option>
                                                <option value="et_budget">Presupuesto mas alto</option>
                                            </select>
                                            <div class="chosen-container chosen-container-single fre-chosen-single sort-order" title="" id="project_orderby_chosen" style="width: 100%;">
                                                <a class="chosen-single">
                                                    <input class="chosen-search-input" type="text" autocomplete="off">
                                                    <span>Últimos proyectos</span>
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
                                    <div class="col-sm-8 col-sm-pull-4">
                                        <div class="fre-project-result">
                                            <p>
                                                <span class="plural hide"><span class="found_post">1</span> proyectos encontrados</span>
                                                <span class="singular "><span class="found_post">1</span> Proyectos encontrados</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<ul class="fre-project-list project-list-container">	
                                <li class="project-item">
                                    <div class="project-list-wrap">
                                        <h2 class="project-list-title">
                                            <a class="secondary-color" href="#" title="NECESITO ASESORIA">NECESITO ASESORIA</a>
                                        </h2>
                                        <div class="project-list-info">
                                            <span>Publicado el 13 enero 2020</span>
                                            <span>0 Bids</span>
                                            <span>Venezuela</span>            
                                            <span>$10,000.00</span>
                                        </div>
                                        <div class="project-list-desc">
                                            <p>NECESITO ASESORIA</p>
                                        </div>
                                        <div class="project-list-skill">
                                            <span class="fre-label">
                                                <a href="#">Automatización y control industrial</a>
                                            </span>
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
<script type="data/json" class="postdata">[{"post_parent":0,"post_title":"NECESITO ASESORIA","post_name":"necesito-asesoria","post_content":"<p>NECESITO ASESORIA<\/p>\n","post_excerpt":"NECESITO ASESORIA","post_author":"35","post_status":"publish","ID":520,"post_type":"project","comment_count":"","guid":"http:\/\/betatest.consultaneo.com\/?post_type=project&#038;p=520","status_text":"ACTIVO","post_date":"13 enero 2020","tax_input":{"skill":[{"term_id":193,"name":"Automatizaci\u00f3n y control industrial","slug":"automa-control-indus","term_group":0,"term_taxonomy_id":193,"taxonomy":"skill","description":"","parent":190,"count":1,"filter":"raw"}],"project_category":[{"term_id":242,"name":"Automatizaci\u00f3n y control industrial","slug":"autom-control-industrial","term_group":0,"term_taxonomy_id":242,"taxonomy":"project_category","description":"","parent":239,"count":1,"filter":"raw"}],"project_type":[],"country":[{"term_id":143,"name":"Venezuela","slug":"venezuela","term_group":0,"term_taxonomy_id":143,"taxonomy":"country","description":"","parent":0,"count":4,"filter":"raw"}]},"project_category":[242],"project_type":[],"country":[143],"address":"","avatar":"","post_count":"","et_featured":"0","et_expired_date":"2020-01-28 21:51:41","et_budget":"10000","deadline":"","total_bids":"0","bid_average":0,"accepted":"","project_deadline":"","et_payment_package":"B1","post_views":"2","id":520,"permalink":"http:\/\/betatest.consultaneo.com\/project\/necesito-asesoria\/","unfiltered_content":"<p>NECESITO ASESORIA<\/p>","the_post_thumnail":"","featured_image":"","the_post_thumbnail":"","et_avatar":"<img alt=\"\" src=\"data:image\/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" class=\"avatar avatar-35 photo avatar-default lazyload\" height=\"35\" width=\"35\" data-src=\"http:\/\/0.gravatar.com\/avatar\/afe09ef42254fd13a2ea63664a0c0059?s=35&amp;d=mm&amp;r=G\">","author_url":"http:\/\/betatest.consultaneo.com\/author\/quazyxc\/","author_name":"quazyxc","budget":"$10,000.00","bid_budget_text":"$0.00","rating_score":0,"project_comment":"","project_comment_trim":"","post_content_trim":"NECESITO ASESORIA","count_word":0,"project_status_view":"Activo","text_status_js":"Job is activo","current_user_bid":false,"posted_by":"Publicado por quazyxc","skill":[{"name":"Automatizaci\u00f3n y control industrial"}],"list_skills":"<div class=\"project-list-skill\"><span class=\"fre-label\"><a href=\"http:\/\/betatest.consultaneo.com\/projects\/?skill_project=automa-control-indus\">Automatizaci\u00f3n y control industrial<\/a><\/span><\/div>","text_total_bid":"0 Bids","text_country":"Venezuela"}]</script>                            
                        </div>
                    </div>
					<div class="fre-paginations paginations-wrapper">
<script type="application/json" class="ae_query">{"post_type":"project","post_status":"publish","orderby":"date","place_category":"","location":"","showposts":"","order":"DESC","is_archive_project":true,"paginate":"page"}</script>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!--Sospechoso-->
</div>
@endsection