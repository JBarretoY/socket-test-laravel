@extends('layouts.app')
@section('title', 'NECESITO ASESORIA - Cliente')
@section('content')
    <div class="fre-page-wrapper">
        <div class="fre-page-title">
            <div class="container">
                <h2>Proyectos Vigentes</h2>
            </div>
        </div>
        <div class="fre-page-section">
            <div class="container">
                <div class="my-work-employer-wrap">
					<ul class="fre-tabs nav-tabs-my-work">
                        <li class="active">
                            <a data-toggle="tab" href="#current-project-tab" aria-expanded="true">
                                <span>Proyectos Actuales</span>
                            </a>
                        </li>
                        <li class="next">
                            <a data-toggle="tab" href="#previous-project-tab" aria-expanded="false">
                                <span>Proyectos Anteriores</span>
                            </a>
                        </li>
                    </ul>
                    <div class="fre-tab-content">
						<div id="current-project-tab" class="freelancer-current-project-tab fre-panel-tab active">
                            <div class="fre-work-project-box">
                                <div class="work-project-filter">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-6 col-xs-12">
                                                <div class="fre-input-field">
                                                    <label class="fre-field-title">Palabra clave</label>
                                                    <input type="text" class="search" name="s" placeholder="Buscar proyectos por frase clave">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="fre-input-field">
                                                    <label class="fre-field-title">Filtro</label>
                                                    <select class="fre-chosen-single" name="bid_current_status" style="display: none;">
                                                        <option value="">Todos los proyectos</option>
                                                        <option value="accept">Procesando</option>
                                                        <option value="unaccept">No aceptados</option>
                                                        <option value="disputing">Disputados</option>
                                                        <option value="publish">Activos</option>
                                                        <option value="archive">Archivados</option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single" title="" style="width: 100%;">
                                                        <a class="chosen-single">
                                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                                            <span>Todos los proyectos</span>
                                                            <!--Esas etiquetas b y div estan sospechosas tambien-->
                                                            <div><b></b></div>
                                                            <!--Fin-->
                                                        </a>
                                                        <div class="chosen-drop">
                                                            <div class="chosen-search"></div>
                                                            <ul class="chosen-results"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="clear-filter work-project-filter-clear secondary-color" href="">Despejar filtros</a>
                                    </form>
                                </div>
                            </div>
                            <div class="fre-work-project-box">
								<div class="current-freelance-project">
                                    <div class="fre-table">
                                        <div class="fre-table-head">
                                            <div class="fre-table-col project-title-col">Título del Proyecto</div>
                                            <div class="fre-table-col project-bids-col">Número de Ofertas</div>
                                            <div class="fre-table-col project-bid-col">Oferta</div>
                                            <div class="fre-table-col project-average-col">Oferta Promedio</div>
                                            <div class="fre-table-col project-status-col">Estado</div>
                                            <div class="fre-table-col project-action-col">Acción</div>
                                        </div>
                                        <div class="fre-current-table-rows" style="display: table-row-group;"></div>
                                    </div>
                                    <span class="project-no-results">There are no projects found.</span>
								</div>
                            </div>
                            <div class="fre-paginations paginations-wrapper" style="display: none;"></div>
						</div>
                        <div id="previous-project-tab" class="freelancer-previous-project-tab fre-panel-tab">
							<div class="fre-work-project-box">
                                <div class="work-project-filter">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-6 col-xs-12">
                                                <div class="fre-input-field">
                                                    <label class="fre-field-title">Palabra clave</label>
                                                    <input type="text" class="search" name="s" placeholder="Buscar proyectos por frase clave">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="fre-input-field">
                                                    <label class="fre-field-title">Estado</label>
                                                    <select class="fre-chosen-single" name="bid_previous_status" style="display: none;">
                                                        <option value="">Todo</option>
                                                        <option value="complete">Completado</option>
                                                        <option value="disputed">Resuelto</option>
                                                    </select>
                                                    <div class="chosen-container chosen-container-single fre-chosen-single" title="" style="width: 100%;">
                                                        <a class="chosen-single">
                                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                                            <span>Todo</span>
                                                            <!--Sospechoso otras mas-->
                                                            <div><b></b></div>
                                                            <!--Fin-->
                                                        </a>
                                                    <div class="chosen-drop">
                                                        <div class="chosen-search"></div>
                                                        <ul class="chosen-results"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="clear-filter work-project-filter-clear secondary-color" href="">Despejar filtros</a>
                                </form>
                            </div>
                        </div>
                        <div class="fre-work-project-box">
                            <div class="previous-freelance-project">
                                <div class="fre-table">
                                    <div class="fre-table-head">
                                        <div class="fre-table-col project-title-col">Título del Proyecto</div>
                                        <div class="fre-table-col project-start-col">Fecha de Inicio</div>
                                        <div class="fre-table-col project-status-col">Estado</div>
                                        <div class="fre-table-col project-review-col">Revisión</div>
                                    </div>
                                    <div class="fre-previous-table-rows" style="display: table-row-group;"></div>
                                </div>
								<span class="project-no-results">No hay actividad aun.</span>                                    </div>
                            </div>
                            <div class="fre-paginations paginations-wrapper">
                                <div class="paginations">
<script type="application/json" class="ae_query">{"post_type":"bid","post_status":["complete","disputed"],"orderby":"date","place_category":"","location":"","showposts":"","order":"DESC","author":40,"accepted":1,"is_author":false,"suppress_filters":true,"paginate":"page"}</script>                                    
                                </div>
                            </div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
 @endsection