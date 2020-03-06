@extends('layouts.app')
@section('title', 'LISTADO DE PROYECTOS - Consultor')
@section('content')
<div class="container">
<div class="fre-project-detail-wrap">
    <div class="project-detail-box">
        <div class="project-detail-info">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <h1 class="project-detail-title">{{ $project->name }}</h1>
                    <ul class="project-bid-info-list">
                        <li>
                            <span>Ofertas</span><span class="secondary-color">{{ count($project->bids) }}</span>
                        </li>
                        <li>
                            <span>Presupuestos</span>
                            <span class="secondary-color">${{ $project->budget }}</span>
                        </li>
                        <li>
                            <span>Oferta Promedio</span>
                            <span class="secondary-color">
                                $0.00
                            </span>
                        </li>
                        <li>
                            <span>Localización</span>
                            <span class="secondary-color">{{ $project->country->name }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-5">
                <p class="project-detail-posted">Publicado el {{ Carbon\Carbon::parse($project->created_at)->format('d M Y') }}</p>
                    @if(!is_null($project->countdown))
                        <span class="project-detail-status secondary-color">
                            Activo<span> - {{ Carbon\Carbon::createFromTimeStamp(strtotime($project->countdown))->diffInDays() }} dias restantes</span>
                        </span>
                    @endif
                    @if((auth()->check() && auth()->user()->id === $project->user->id) || ($project->consulter_id === auth()->check() && auth()->user()->id))
                        <div class="project-detail-action">
                            <a href="#" class="fre-normal-btn primary-bg-color" data-toggle="modal" data-target="#exampleModal">Oferta</a>
                        </div>
                    @elseif(auth()->check() && auth()->user()->type === 4)
                        <div class="project-detail-action">
                            <a href="{{ url('/projects/'.$project->slug.'/workspace') }}" class="fre-normal-btn primary-bg-color">Espacio de trabajo</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="project-detail-box no-padding">
        <div class="project-detail-desc">
            <h4>Descripción del Proyecto </h4>
            {{ $project->description }}
        </div>
        <div class="project-detail-extend">
            <div class="project-detail-skill">
                <h4>Habilidades Requeridas</h4>
                @foreach($project->skills as $skill)
                    <a class="fre-label secondary-color" href="{{ url('/projects/?skill_project='.$skill->name) }}">
                        {{ $skill->name }}
                    </a>
                @endforeach
            </div>
            <div class="project-detail-category">
                <h4>Categoría</h4>
                <a class=" secondary-color " href="http://betatest.consultaneo.com/projects/?category_project=opera-otros">Operaciones y otros</a>
            </div>

            <div class="project-detail-milestone">
                <h4>Hitos o Metas</h4>
                    <ul class="cat-list-milestone" style="padding-left: 0; list-style: none;">
                        @foreach($project->tasks as $task)
                            <li data-rel="item-list-milestone" style="display: flex;">
                                <span class="icon-status-milestone">
                                    <i class="fa fa-circle-o"></i>
                                </span>
                                <div class="content-steps-milestone" style="margin-left: 10px;">
                                    <span>{{ $task->name }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="project-detail-about">
                    <h4>Información del Empleador</h4>
                    <div class="project-employer-rating">
                        <span class="rate-it" data-score="0" title="Not rated yet!">
                            <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                            <input name="score" type="hidden" readonly=""></span>
                        <span class="">{{ $project->user->cant_projects }} Proyecto(s) publicados</span>
                        <span>Ha contratado {{ $project->user->count_contracts ?? 0 }} consultores</span>
                    </div>
                    <div class="project-employer-since">
                        <span>
                            Miembro desde: {{ Carbon\Carbon::parse($project->user->created_at)->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->check())
        <div id="project-detail-bidding" class="project-detail-box no-padding">
            <div class="freelancer-bidding">
                <table class="fre-table">
                    <thead>
                        <tr class="fre-table-head">
                            <th class="fre-table-col">OFERTA PROFESIONAL ({{ count($project->bids) }})</th>
                            <th class="fre-table-col">REPUTACIÓN</th>
                            <th class="fre-table-col">OFERTA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->bids as $bid)
                            <tr>
                                <td style="padding: 0px 40px; display: flex;">
                                    <span class="mr-4 my-4">
                                        <img src="{{ count($bid->from->files) > 0 ? $bid->from->files[0]->path : '' }}" alt="" style="background: #ddd; width: 64px; height: 64px; border-radius: 32px; display: inline-block;">
                                    </span>
                                    <span class="my-4 col-free-bidding" style="padding: unset;">
                                        <h2>{{ $bid->from->name }}</h2>
                                        <p>{{ $bid->from->job_title ?? 'Sin titulo' }}</p>
                                        <p>{{ $bid->from->about ?? 'Sin descripcion profesional' }}</p>
                                        @if(auth()->check() && auth()->user()->type === 3 && auth()->user()->id === $project->user->id)
                                            @if(!$project->consulter_id)
                                                <a class="fre-normal-btn btn-accept-bid btn-accept-bid-no-escrow" id="accept_bid_{{ $bid->id }}">Aceptar Oferta</a>
                                            @endif
                                            <a class="fre-normal-btn-o btn-send-msg btn-open-msg-modal" href="{{ url('/messages') }}">Contactar</a>
                                        @endif
                                    </span>
                                    <span style="flex-grow: 1;"></span>
                                </td>
                                <td style="padding: 10px 40px;" class="mt-2 col-free-reputation">
                                    <p>
                                        <div class="rate-it" data-score="0" title="Not rated yet!">
                                            <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                                            <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>
                                            <input name="score" type="hidden" readonly="">
                                        </div>
                                    </p>
                                    <p>{{ $bid->from->years_experience ? $bid->from->years_experience . ' años de experience' : 'Sin años de experiencia' }}</p>
                                    <p>{{ $bid->from->cant_projects }} Proyectos realizados</p>
                                </td>
                                <td style="padding: 10px 40px;" class="mt-2 col-free-bid">
                                    <p>
                                        <b>${{ $bid->price }}</b>
                                    </p>
                                    <p>En {{ $bid->time }} {{ $bid->days ? 'dias' : 'semanas' }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
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
                    @if(collect($project->bids)->firstWhere('from.id', auth()->user()->id) === null)
                        <form action="{{ url('/bid/store') }}" method="POST" role="form" id="bid_form" class="bid-form fre-modal-form">
                            {{ csrf_field() }}
                            <div class="fre-input-field">
                                <label class="fre-field-title" for="bid_budget">Tu Oferta</label>
                                <div class="fre-project-budget" style="padding-left: unset;">
                                    <input type="number" placeholder="$USD" name="price" id="price" class="form-control number numberVal" min="0">
                                </div>
                            </div>
                            <div class="fre-input-field">
                                <label class="fre-field-title" for="bid_time">Tiempo de entrega</label>
                                <div class="row">
                                    <div class="col-md-9 col-sm-8 col-xs-6">
                                        <input type="number" name="time" id="time" class="form-control number numberVal" min="1">
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 no-padding-left">
                                        <select class="fre-chosen-single" name="days" id="days" style="opacity: 1">
                                            <option value="1">dias</option>
                                            <option value="0">semana</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="fre-input-field no-margin-bottom">
                                <label class="fre-field-title" for="post_content">Agregar notas ( Dile al cliente por que eres la mejor opción)</label>
                                <textarea id="notes" name="notes" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 144px;"></textarea>
                            </div>
                            <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}">
                            <input type="hidden" id="user_id_to" name="user_id_to" value="{{ $project->user->id }}">
                            <input type="hidden" id="user_id_from" name="user_id_from" value="{{ auth()->user()->id }}">
                            <input type="hidden" id="type" name="type" value="1">
                            <div class="fre-form-btn">
                                <button type="submit" class="fre-normal-btn btn-submit">
                                    Enviar
                                </button>
                                <span class="fre-form-close" data-dismiss="modal">Cancelar</span>
                            </div>
                        </form>
                    @else
                        <p><i class="fa fa-warning"></i> ya hiciste una oferta</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection