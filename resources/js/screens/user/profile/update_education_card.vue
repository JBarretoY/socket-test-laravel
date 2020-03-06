<template>
    <div class="card relative">
        <div class="loader-wrapper" v-if="loading">
            <div class="loader"></div>
        </div>
        <template v-if="!edit">
            <div class="card-body">
                <p><b>Título profesional:</b> {{ education.name }}</p>
                <p><b>institución:</b> {{ education.institution }}</p>
                <p><b>durante:</b> {{ education.date_from }} - {{ education.date_to }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="cons-button profile-show-edit-tab-btn mr-1" @click="edit = true">Editar</button>
                <button class="cons-button profile-show-edit-tab-btn" @click="destroy(education.id)">Eliminar</button>
            </div>
        </template>
        <template v-else>
            <div class="card-body">
                <div class="form-group">
                    <label>Título profesional</label>
                    <input type="text" class="form-control" v-model="education.name">
                </div>
                <div class="form-group">
                    <label>Institución</label>
                    <input type="text" class="form-control" v-model="education.institution">
                </div>
                <div class="form-group">
                    <label>Desde</label>
                    <v-date-picker :placeholder="education.date_from" v-model="education.date_from" class="w-100p" />
                </div>
                <div class="form-group">
                    <label>Hasta</label>
                    <v-date-picker :placeholder="education.date_to" v-model="education.date_to" class="w-100p" />
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="cons-button profile-show-edit-tab-btn mr-1" @click="edit = false">Cancelar</button>
                <button class="cons-button profile-show-edit-tab-btn" @click="update">Actualizar</button>
            </div>
        </template>
    </div>
</template>

<script>
// 7451C5 sexy purple
    export default {
        props: {
            education: { required: true, type: Object }
        },
        data: () => ({
            edit: false,
            loading: false
        }),
        methods: {
            update() {
                this.loading = true
                axios.put(`/education/update`, this.education)
                    .finally(() => {
                        location.reload()
                        this.edit = false
                    })
            },
            destroy(id) {
                this.$swal({
                    title: 'Seguro que desea realizar esta accion?',
                    text: 'Esto no se podra deshacer',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar!',
                    cancelButtonText: 'Conservar!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        axios.delete(`/education/destroy/${id}`)
                            .then(() => location.reload())
                    }
                })
            }
        }
    }
</script>