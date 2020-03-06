@extends('layouts.app')
@section('title', 'LISTADO DE PROYECTOS - Consultor')
@section('content')

<div class="fre-page-wrapper">
	<div class="fre-page-title">
		<div class="container">
            <h2>Perfil de {{ $consultant->name }}</h2>
		</div>
	</div>
	<div class="fre-page-section">
		<div class="container">
			<div class="author-freelance-wrap">
                <div class="fre-profile-box">
                    <div class="profile-freelance-info-wrap">
                        <div class="profile-freelance-info">
                            <div class="freelance-info-avatar">
                                <span class="freelance-avatar">
                                    <img alt="" src="{{ count($consultant->files) > 0 ? $consultant->files[0]->path : '' }}" class="avatar avatar-70 photo avatar-default lazyload-loaded" height="70" width="70">
                                </span>
                                <span class="freelance-name">
                                    <span class="d-flex justify-content-between">
                                        <h3>{{ $consultant->username }}</h3>
                                        @if(auth()->check() && auth()->user()->type === 3)
                                            <div class="freelance-info-edit">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="fre-normal-btn primary-bg-color invite-open">
                                                    Invitame
                                                </a>
                                            </div>
                                        @endif
                                    </span>
                                    <span>{{ $consultant->job_title ?? 'Sin titutlo profesional' }}</span>
                                </span>
                            </div>
                            <div class="freelance-info-content">
                                <div class="freelance-rating">
                                    <span class="rate-it" data-score="" title="Not rated yet!">
                                        <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                        <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                        <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                        <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                        <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                                        <input name="score" type="hidden" readonly="">
                                    </span>
                                    <span>{{ $consultant->years_experience ?? 0 }} Años de Exp</span>
                                    <span>{{ $consultant->cant_projects }} proyectos trabajados</span>
                                </div>
                                <div class="freelance-hourly">
                                    <span>{{ $consultant->hourly_rate ?? 0 }}/hr</span>
                                    <span>${{ $consultant->balance ? $consultant->balance->win : 0 }} ganado</span>
                                </div>
                                <div class="project-list-skill">
                                    @foreach($consultant->skills as $skill)
                                        <span class="fre-label">
                                            <a href="#">{{ $skill->name }}</a>
                                        </span>
                                    @endforeach
                                </div>                          
                                <div class="freelance-about">
                                    {!! $consultant->about !!}
                                </div>
                            </div>
                            <div class="freelance-info-edit"></div>
                        </div>
                    </div>
                </div>

                @if(count($consultant->portfolios) > 0)
                    <div class="fre-profile-box">
                        <div class="portfolio-container">
                            <div class="profile-freelance-portfolio">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="freelance-portfolio-title">Portafolio de Proyectos <a class="aler-rec" style="margin-left: unset;">Recomendado</a></h2>
                                    </div>
                                </div>
                                <ul class="freelance-portfolio-list row">
                                    @foreach($consultant->portfolios as $portfolio)
                                        <li class="col-md-4 col-sm-6 col-sx-12">
                                            <div class="nuevotitulo-portafolio">
                                                <a class="fre-view-portfolio-new" href="javascript:void(0)">{{ $portfolio->name }}</a>
                                            </div>
                                            <div class="freelance-portfolio-wrap" id="portfolio_item_598">
                                                <div class="freelance-portfolio">
                                                    <a href="javascript:void(0)" class="fre-view-portfolio-new">
                                                        <img src="{{ count($portfolio->files) ? $portfolio->files[0]->path : '' }}" alt="aaaa">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="fre-profile-box">
                    <div class="freelancer-project-history">
                        <div class="profile-freelance-work">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <h2 class="freelance-work-title">Historial de Trabajo (0)</h2>
                                </div>
                            </div>
                            <ul class="list-work-history-profile author-project-list">
                                <li class="bid-item">
                                    <span class="profile-no-results" style="padding: 0">Aún sin actividad.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center">
                    <h5 class="modal-title" id="exampleModalLabel">Invitar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: unset;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                @if(count(auth()->user()->projects) === 0)
                    <div class="invite-no-project">
                        <h2>No projects available to invite!</h2>
                        <p>There are currently no projects available to invite this user. Start posting projects to invite this freelancer.</p>
                    </div>
                @else
                    <ul class="list-group">
                        @foreach(auth()->user()->projects as $project)
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{ $project->id }}" id="check_item_{{ $project->id }}" name="check_item_{{ $project->id }}">
                                    <label class="form-check-label" for="check_item_{{ $project->id }}">
                                        <span class="mr-2">
                                            {{ $project->name }}
                                        </span>
                                        <b>${{ $project->budget }}</b>
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    @if(count(auth()->user()->projects) === 0)
                        <a class="btn btn-primary fre-normal-btn" href="{{ url('/create-project') }}" style="line-height: unset; height: unset;">CREAR PROYECTO</a>
                    @else
                        <button type="button" class="btn btn-primary fre-normal-btn" id="send_project_invitation" style="line-height: unset; height: unset;">Inivitar</button>
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection