@extends('layouts.app')
@section('title', 'LISTADO DE PROYECTOS - Consultor')
@section('content')

<div class="fre-page-wrapper">
	<div class="fre-page-title">
		<div class="container">
			<h2>Perfiles disponibles</h2>
		</div>
	</div>
	<div class="fre-page-section">
		<div class="container">
			<div class="page-post-project-wrap">
                <div class="fre-project-filter-box">
                    <div class="fre-project-list-filter">
                        <form action="{{ url('/consultants') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="fre-input-field">
                                        <label for="name" class="fre-field-title">Palabra clave</label>
                                        <input class="keyword search" id="name" type="text" name="name" placeholder="Buscar proyectos por frase clave">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field dropdown">
                                        <label for="category" class="fre-field-title">Habilidades</label>
                                        <select name="category" id="category" class="fre-chosen-single" style="opacity: 1;">
                                            @foreach($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field">
                                        <label for="pwin" class="fre-field-title">Ganancias</label>
                                        <select name="win" id="win" class="fre-chosen-single" style="opacity: 1;">
                                            <option value="">Cualquier monto</option>
                                            <option value="100">0 - 100</option>
                                            <option value="100-1000">100 - 1000</option>
                                            <option value="1000-10000">1000 - 10000</option>
                                            <option value="10000">Mayores a 10000 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field project-number-bids">
                                        <label for="cant_pro" class="fre-field-title">Proyectos trabajados</label>
                                        <select name="cant_pro" id="cant_pro" class="fre-chosen-single" style="opacity: 1;">
                                            <option value="">Cualquier proyecto trabajado</option>
                                            <option value="10">0 - 10</option>
                                            <option value="20">11 - 20</option>
                                            <option value="30">21 - 30</option>
                                            <option value="40">Mayores a 30</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field">
                                        <label for="country" class="fre-field-title">Localización</label>
                                        <select name="country" id="country" class="fre-chosen-single" style="opacity: 1;">
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field fre-budget-field">
                                        <label for="hour_init" class="fre-field-title">Tarifa por hora ()</label>
                                        <input id="hour_init" class="filter-hour_init-min" type="number" name="hour_init" value="0" min="0">
                                        <span>-</span>
                                        <input class="filter-budget-max" type="number" name="hour_end" value="2000" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-between">
                                    <a class="project-filter-clear clear-filter secondary-color" href="{{ url('/consultants') }}">Despejar filtros</a>
                                    <button class="btn btn-light" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="fre-work-project-box">
                    <ul class="fre-profile-list profile-list-container">
                        @foreach($consultants as $consultant)
                            <li class="profile-item">
                                <div class="profile-list-wrap">
                                    <a class="profile-list-avatar" href="{{ url('/consultants/'. $consultant->username) }}">
                                        <img alt="" src="{{ count($consultant->files) > 0 ? $consultant->files[0]->path : '' }}" class="avatar avatar-96 photo avatar-default lazyload-loaded" style="height: 100%; width: 100%;">
                                    </a>
                                    <h2 class="profile-list-title">
                                        <a href="{{ url('/consultants/'. $consultant->username) }}">{{ $consultant->username }}</a>
                                    </h2>
                                    <p class="profile-list-subtitle"></p>
                                    <div class="profile-list-info">
                                        <div class="profile-list-detail">
                                            <span class="rate-it" data-score="" title="Not rated yet!"><i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;<i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i><input name="score" type="hidden" readonly=""></span>
                                            <span>{{ $consultant->years_experience ?? 0 }} Años de Exp</span>
                                            <span>{{ $consultant->cant_projects }} Proyectos</span>
                                            <span style="font-weight: normal">{{ $consultant->balance ? '$' . $consultant->balance->win . ' ganado' : 'Sin ganancias' }}</span>
                                        </div>
                                        <div class="profile-list-desc"></div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{ $consultants->links() }}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection