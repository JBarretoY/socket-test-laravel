<template>
<div class="fre-page-wrapper">
	<div class="fre-page-title">
		<div class="container">
			<h2>Publica tu proyecto</h2>
		</div>
	</div>
	<div class="fre-page-section">
		<div class="container">
			<div class="page-post-project-wrap" id="post-place">

				<div id="fre-post-project-2 step-post">
					<div class="fre-post-project-box">
						<div class="step-change-package show_select_package">
							<!-- {{ user }} -->
							<p class="package_title"><i class="fa fa-plus primary-color" aria-hidden="true"></i>&nbsp;Estas usando el siguiente paquete: {{ user.subscriptions.find(s => s.status === 1).package.name }}<strong></strong></p>
							<p class="package_description pdl-10"></p>
							<p class="pdl-10">La cantidad de publicaciones incluidas en este paquete se agregará a su publicación total después de que se publique este proyecto.</p>
							<br>
							<p><i class="fa fa-check primary-color" aria-hidden="true"></i>&nbsp;Límite de número de publicaciones y detalles de su paquete comprado.</p>
							<p>Puedes publicar <span class="post-number">{{ user.subscriptions.find(s => s.status === 1).num_projects_available }}</span> proyectos aun</p>
							<a class="fre-btn-o fre-post-project-previous-btn fre-btn-previous primary-color" href="#">Cambiar paquete</a>
						</div>
						<div class="step-change-package show_had_package" style="display:none;">
							<p><i class="fa fa-check primary-color" aria-hidden="true"></i>&nbsp;Límite de número de publicaciones y detalles de su paquete comprado.</p>
							<p>Puedes publicar <span class="post-number">0</span> proyectos</p>
							<p><em>You are choosing a package that still available to post or pending so can not buy again. If you want to get more posts, you can directly move on the posting project plan by clicking the next "Add more" button.</em></p>
							<a class="fre-btn-o fre-post-project-previous-btn fre-btn-previous" href="#">Add more</a>
						</div>
					</div>
					<div class="fre-post-project-box">
						<!-- <form class="post" role="form" novalidate="novalidate"> -->
							<div class="step-post-project" id="fre-post-project">
								<h2>Detalles de tu proyecto</h2>
								<div class="fre-input-field">
									<label class="fre-field-title" for="project_category">En que categoría se encuentra su proyecto?</label>
									<select-picker :source="mappedCategories" tags :max="5" v-model="form.categories" />
								</div>
									<div class="fre-input-field">
										<label class="fre-field-title" for="fre-project-title">Titulo de tu proyecto</label>
										<input class="input-item text-field" id="fre-project-title" type="text" name="post_title" v-model="form.name">
									</div>
									<div class="fre-input-field">
										<label class="fre-field-title" for="fre-project-describe">Describe que necesitas realizar</label>
										<wysiwyg placeholder="Descripcion" v-model="form.description"/>
									</div>
									<div class="fre-input-field" id="gallery_place">
										<label class="fre-field-title" for="">Archivos Adjuntos (Opcional)</label>
										<dropzone multiple style="height: 200px;" name="file" accept=".jpg,.jpeg,.png,.gif" v-model="form.file" :max="5">
											<h4 style="text-align: center;">Presione aquí o arrastre los archivos</h4>
										</dropzone>
								</div>
								<div class="fre-input-field">
									<label class="fre-field-title" for="project-budget">Presupuesto para tu proyecto en USD$</label>
									<div class="fre-project-budget">
										<input id="project-budget" step="5" placeholder="USD$" required="" type="number" class="input-item text-field is_number numberVal" name="et_budget" min="1" v-model="form.budget">
										<span></span>
									</div>
								</div>
								<div class="fre-input-field">
									<label class="fre-field-title" for="project-location">Localización (Opcional)</label>
									<select-picker :source="countries.map(el => ({ label: el.name, value: el.id }))" v-model="form.country_id" />
								</div>
								<ul class="fre-custom-field">		
									<li class="form-group custom-field">
										<div class="fre-input-field">
											<label class="fre-field-title" for="project-location">Hitos o Metas (Puedes crear hasta 5 metas para la realización de tu proyecto.)</label>
											<tag-input v-model="form.tasks" :max="5"/>
										</div>
									</li>
								</ul>
								<div class="fre-post-project-btn">
									<button class="fre-btn fre-post-project-next-btn primary-bg-color" @click="send">Enviar Proyecto</button>
								</div>
							</div>
						<!-- </form> -->
					</div>
				</div>


				<div id="fre-post-project-3 step-payment" class="fre-post-project-step step-wrapper step-payment ">
					<div class="fre-post-project-box">
						<div class="step-edit-project">
							<p>Su proyecto publicado se ha guardado y está en espera que el pago haya sido realizado.</p>
							<a class="fre-btn-o fre-post-project-previous-btn fre-btn-previous" href="">Editar</a>
						</div>
					</div>
					<div class="fre-post-project-box">
						<div class="step-choose-payment">
							<div class="show_select_package">
								<p class="package_title">Paquete: <strong></strong></p>
								<p class="package_description"></p>
							</div>
							<div class="show_had_package" style="display:none;">
								<p>Your post(s) left: 0</p>
								<p>Si desea obtener más publicaciones, puede pasar directamente a la página de compra haciendo clic en el botón Siguiente.</p>
							</div>
							<h2>Método de pago<br><span>Seleccione su método de pago más apropiado</span></h2>
							<form method="post" action="" id="checkout_form">
								<div class="payment_info"></div>
								<div style="position:absolute; left : -7777px; ">
									<input type="submit" id="payment_submit">
								</div>
							</form>
							<ul id="fre-payment-accordion" class="fre-payment-list panel-group">
								<li class="panel fre-credit-payment-onsite">
									<span class="title-plan fre-credit-payment" data-type="frecredit">Credito<span>Su saldo disponible: <strong>$0.00</strong></span>
										<span class="error" style="display:none;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Su saldo no es suficiente para proceder al pago.</span>
									</span>
									<a data-toggle="collapse" data-type="frecredit" data-parent="#fre-payment-accordion" href="#fre-payment-frecredit" class="btn collapsed other-payment">Seleccionar</a>
									<div id="fre-payment-frecredit" class="panel-collapse collapse fre-payment-proccess">
										<form class="modal-form" id="submit_fre_credit_form" novalidate="novalidate" autocomplete="on" data-ajax="false">
											<div class="fre-input-field">
												<label class="title-name">Your balance will be deducted:</label>
												<span class="package_price fee-package">--</span>
											</div>
											<div class="fre-input-field">
												<label class="title-name">Estimated balance after payment:</label>
												<span class="estimate_balance fee-package"></span>
											</div>
											<div class="fre-input-field">
												<label class="fre-field-title">Your secure code:</label>
												<input tabindex="20" id="fre_credit_secure_code" type="password" size="20" name="fre_credit_secure_code" required="">
											</div>
											<div class="fre-proccess-payment-btn">
												<button class="fre-btn btn-pay-balance" id="submit_fre_credit">PAY TO YOUR BALANCE</button>
											</div>
										</form>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
export default {
    props: {
		user: { required: true, type: Object },
		categories: { required: false, type: Array, default: () => [] },
		countries: { required: false, type: Array, default: () => [] }
	},
	data: () => ({
		form: {
			name: '',
			description: '',
			categories: [],
			budget: "",
			file: [],
			country_id: "",
			tasks: []
		}
	}),
	methods: {
		send() {
			let data = new FormData()

			Object.keys(this.form).forEach(el => {
				if (this.form[el] instanceof Array) {
					this.form[el].forEach(n => data.append(`${el}[]`, n))
				} else {
					data.append(el, this.form[el])
				}
			})

			axios.post(`/projects/store`, data)
				.then(res => {
					if (res.data.draft) {
						alert('No tienes suficiente presupuesto')
					} else {
						location.href = `/projects/${res.data.data.slug}`
					}
				})
				.catch(err => alert('bad'))
				.finally(() => alert('final'))

		}
	},
	computed: {
		mappedCategories() {
			return this.categories.map( el => ({
                label: el.name,
                value: el.id,
                childrens: el.sub_categories.map(s => ({
                    label: s.name,
                    value: s.id,
                }))
            }))
		}
	}
}
</script>