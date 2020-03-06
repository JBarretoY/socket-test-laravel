@extends('layouts.app')
@section('title', 'Perfil Personalizado - Cliente')
@section('content')
    <div class="fre-page-wrapper list-profile-wrapper">
        <div class="fre-page-title">
            <div class="container">
                <h2>Perfil de Alejandra</h2>
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
										<img alt="" src="http://betatest.consultaneo.com/file/2019/11/cropped-consultora-de-recursos-humanos-nuestro-compromiso-150x150.jpg" class="avatar avatar-70 photo avatar-default  lazyload-loaded" height="70" width="70">									
                                    </span>
                                    <span class="freelance-name">Alejandra
                                        <span>Marketing &amp; Redes</span>
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
                                        <span>10 Años de Exp</span>
                                        <span>0 proyectos trabajados </span>
									</div>
									<div class="freelance-hourly">
                                        <!--Sospechoso -->
                                        <span><b? $150.00="" <="" b=""> /hr</b?></span>
                                        <!--Fin-->
                                        <span>$0 ganado</span>
                                    </div>
                                    <div class="freelance-skill"></div>
									<div class="freelance-about">
									    <p>asdpaspdapsd</p>
                                    </div>
	                            </div>
								<div class="freelance-info-edit"></div>
							</div>
                        </div>
                    </div>					
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
    </div>
@endsection