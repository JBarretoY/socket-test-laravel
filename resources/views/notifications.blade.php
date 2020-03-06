@extends('layouts.app')
@section('title', 'NECESITO ASESORIA - Cliente')
@section('content')
	<div class="fre-page-wrapper">
		<div class="fre-page-title">
			<div class="container">
				<h2>Tus Notificaciones</h2>
			</div>
		</div>
		<div class="fre-page-section">
			<div class="container">
				<div class="page-notification-wrap" id="fre_notification_container">
					<ul class="list_notify fre-notification-list">
						<li class="no-result">
							<span>No se encontraron notificaciones.</span>
						</li>
					</ul>
<script type="data/json" class="postdata">[]</script>
					<div class="fre-paginations paginations-wrapper">
<script type="application/json" class="ae_query">{"post_type":"notify","post_status":"publish","orderby":"date","place_category":"","location":"","showposts":"","order":"DESC","author":40,"paged":1,"paginate":"page"}</script>
					</div>				
				</div>
			</div>
		</div>
	</div>
@endsection