<template>
    <div class="card relative">
        <div class="loader-wrapper" v-if="loading">
            <div class="loader"></div>
        </div>
        <template v-if="!edit">
            <div class="card-body">
                <p><b>Certificado:</b> {{ certificate.name }}</p>
                <p><b>Concedido por:</b> {{ certificate.granted_by }}</p>
                <p><b>Durante:</b> {{ certificate.date_from }} - {{ certificate.date_to }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="cons-button profile-show-edit-tab-btn mr-1" @click="edit = true">Editar</button>
                <button class="cons-button profile-show-edit-tab-btn" @click="destroy(certificate.id)">Eliminar</button>
            </div>
        </template>
        <template v-else>
            <div class="card-body">
                <div class="form-group">
                    <label>Certificado</label>
                    <input type="text" class="form-control" v-model="certificate.name">
                    <span class="help text-danger" v-if="hasError('name')">{{ getError('name') }}</span>
                </div>
                <div class="form-group">
                    <label>Concedido por</label>
                    <input type="text" class="form-control" v-model="certificate.granted_by">
                    <span class="help text-danger" v-if="hasError('granted_by')">{{ getError('granted_by') }}</span>
                </div>
                <div class="form-group">
                    <label>Desde</label>
                    <v-date-picker :placeholder="certificate.date_from" v-model="certificate.date_from" class="w-100p" />
                    <span class="help text-danger" v-if="hasError('date_from')">{{ getError('date_from') }}</span>
                </div>
                <div class="form-group">
                    <label>Hasta</label>
                    <v-date-picker :placeholder="certificate.date_to" v-model="certificate.date_to" class="w-100p" />
                    <span class="help text-danger" v-if="hasError('date_to')">{{ getError('date_to') }}</span>
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
            certificate: { required: true, type: Object }
        },
        data: () => ({
            edit: false,
            loading: false,
            errors: {}
        }),
        methods: {
            update() {
                this.loading = true
                axios.put(`/certificate/update`, this.certificate)
                    .then(() => {
                        location.reload()
                        this.edit = false
                    })
                    .catch(err => this.addErrors(err.response.data.errors))
                    .finally(() => this.loading = false)
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
                        axios.delete(`/certificate/destroy/${id}`)
                            .then(() => location.reload())
                    }
                })
            },
            addErrors(errors) {
                this.errors = errors
            },
            hasError(error) {
                return this.errors.hasOwnProperty(error)
            },
            getError(error) {
                return this.errors[error][0]
            },
        }
    }
</script>