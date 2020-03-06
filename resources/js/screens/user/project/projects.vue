<template>
<div class="fre-page-wrapper">
	<div class="fre-page-title">
		<div class="container">
			<h2>Proyectos vigentes</h2>
		</div>
	</div>
	<div class="fre-page-section">
		<div class="container">
			<div class="page-post-project-wrap">
                <div class="fre-work-project-box">
                    <div class="work-project-filter">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <div class="fre-input-field">
                                    <label class="fre-field-title">Palabra clave</label>
                                    <input type="text" class="search" name="s" placeholder="Buscar proyectos por frase clave" v-model="search.word" @keyup="doSearch">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="fre-input-field">
                                    <label class="fre-field-title">Estado</label>
                                    <select-picker :source="statuses" v-model="search.status" @input="fetch"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fre-work-project-box">
                    <div class="current-employer-project">
                        <a-table :columns="columns" :source="source">
                            <template #td:action>
                                <button class="btn btn-light">Area de trabajo</button>
                            </template>
                            <template #empty> No hay actividad aun. </template>
                            <template #td:offers="{ it }"> {{ it.bids.length }} </template>
                            <template #td:created_at="{ it }"> {{ it.created_at ? it.created_at : 'No data' }} </template>
                            <template #td:status="{ it }"> {{ statuses.find(el => el.value === it.status).label }} </template>
                        </a-table>
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
	},
	data: () => ({
        search: {
            word: '',
            status: ''
        },
        statuses: [
            { label: 'Todo', value: '' },
            { label: 'Disponible', value: 1 },
            { label: 'Working', value: 2 },
            { label: 'Vencido', value: 3 },
            { label: 'Culminado', value: 4 }
        ],
        source: [],
        columns: [
            { title: 'Título del Proyecto', key: 'name', slot: 'title' },
            { title: 'Número de Ofertas', key: 'bids', slot: 'offers' },
            { title: 'Presupuestos', key: 'budget', slot: 'budget' },
            { title: 'Fecha de inicio', key: 'created_at', slot: 'created_at' },
            { title: 'Estado', key: 'status', slot: 'status' },
            { title: 'Acción', key: 'id', slot: 'action' },
        ],
        timer: null
	}),
	methods: {
        doSearch() {
            if (this.timer) {
                clearTimeout(this.timer);
                this.timer = null;
            }

            this.timer = setTimeout(() => {
                this.fetch()
            }, 800);
        },
		fetch() {
            axios.get(`/projects/get/index-by-user?word=${this.search.word}&status=${this.search.status}`)
                .then(res => this.source = res.data.data)
                .catch(err => console.log(err))
        }
    },
    mounted() {
        this.fetch()
    }
}
</script>