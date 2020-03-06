@extends('layouts.app')
@section('title', 'LISTADO DE PROYECTOS - Consultor')
@section('content')

<div class="fre-page-wrapper">
	<div class="fre-page-title">
		<div class="container">
			<h2>Proyectos disponibles</h2>
		</div>
	</div>
	<div class="fre-page-section">
		<div class="container">
			<div class="page-post-project-wrap">
                <div class="fre-project-filter-box">
                    <div class="fre-project-list-filter">
                        <form action="{{ url('/projects') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="fre-input-field">
                                        <label for="name" class="fre-field-title">Palabra clave</label>
                                        <input class="keyword search" id="name" type="text" name="name" placeholder="Buscar proyectos por frase clave">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field dropdown">
                                        <label for="skills" class="fre-field-title">Habilidades</label>
                                        <select name="category" id="category" class="fre-chosen-single" style="opacity: 1;">
                                            @foreach($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field">
                                        <label for="project_category" class="fre-field-title">Categoría</label>
                                        <select name="skill" id="skill" class="fre-chosen-single" style="opacity: 1;">
                                            @foreach($skills as $skill)
                                                <optgroup label="{{ $skill->name }}">
                                                    @foreach($skill->skills as $_skill)
                                                        <option value="{{ $_skill->id }}">{{ $_skill->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fre-input-field project-number-bids">
                                        <label for="bid" class="fre-field-title">Oferta</label>
                                        <select name="bid" id="bid" class="fre-chosen-single" style="opacity: 1;">
                                            <option value="">Cualquier oferta</option>
                                            <option value="0,10">0 - 10</option>
                                            <option value="11,20">11 - 20</option>
                                            <option value="21,30">21 - 30</option>
                                            <option value="31">Mayores a 30</option>
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
                                        <label for="budget" class="fre-field-title">Presupuestos ()</label>
                                        <input id="budget" class="filter-budget-min" type="number" name="budget_init" value="0" min="0">
                                        <span>-</span>
                                        <input class="filter-budget-max" type="number" name="budget_end" value="2000" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-between">
                                    <a class="project-filter-clear clear-filter secondary-color" href="{{ url('/projects') }}">Despejar filtros</a>
                                    <button class="btn btn-light" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="fre-work-project-box">
                    <ul class="fre-project-list project-list-container">
                        @foreach($projects as $project)
                        <li class="project-item">
                            <div class="project-list-wrap">
                                <h2 class="project-list-title">
                                    <a class="secondary-color" href="{{ url('/projects/'.$project->slug) }}" title="ssss">{{ $project->name }}</a>
                                </h2>
                                <div class="project-list-info">
                                    <span>Publicado el {{ Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</span>
                                    <span>{{ count($project->bids) }} Bids</span>
                                    <span>{{ $project->country->name }}</span>
                                    <span>${{ $project->budget }}</span>
                                </div>
                                <div class="project-list-desc">
                                    <p>{!! $project->description !!}</p>
                                </div>
                                <div class="project-list-skill">
                                    @foreach($project->skills as $skill)
                                        <span class="fre-label">
                                            <a href="http://betatest.consultaneo.com/projects/?skill_project=automa-control-indus">{{ $skill->name }}</a>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{ $projects->links() }}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection