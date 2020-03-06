<template>
    <div class="card relative">
        <div class="loader-wrapper" v-if="loading">
            <div class="loader"></div>
        </div>
        <template v-if="!edit">
            <div class="card-body">
                <p><b>Cargo:</b> {{ experience.name }}</p>
                <p><b>Compañia:</b> {{ experience.company_name }}</p>
                <p><b>Durante:</b> {{ experience.date_from }} - {{ experience.date_to }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="cons-button profile-show-edit-tab-btn mr-1" @click="edit = true">Editar</button>
                <button class="cons-button profile-show-edit-tab-btn" @click="destroy(experience.id)">Eliminar</button>
            </div>
        </template>
        <template v-else>
            <div class="card-body">
                <div class="form-group">
                    <label>Cargo</label>
                    <input type="text" class="form-control" v-model="experience.name">
                    <span class="help text-danger" v-if="hasError('name')">{{ getError('name') }}</span>
                </div>
                <div class="form-group">
                    <label>Compañia</label>
                    <input type="text" class="form-control" v-model="experience.company_name">
                    <span class="help text-danger" v-if="hasError('company_name')">{{ getError('company_name') }}</span>
                </div>
                <div class="form-group">
                    <label>Desde</label>
                    <v-date-picker v-model="experience.date_from" :placeholder="experience.date_from" class="w-100p" />
                    <span class="help text-danger" v-if="hasError('date_from')">{{ getError('date_from') }}</span>
                </div>
                <div class="form-group">
                    <label>Hasta</label>
                    <v-date-picker v-model="experience.date_to" :placeholder="experience.date_to" class="w-100p" />
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
    export default {
        props: {
            experience: { required: true, type: Object }
        },
        data: () => ({
            edit: false,
            loading: false,
            errors: {}
        }),
        methods: {
            update() {
                this.loading = true
                axios.put(`/work-experience/update`, this.experience)
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
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar!',
                    cancelButtonText: 'Conservar!',
                    showCloseButton: true,
                    showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        axios.delete(`/work-experience/destroy/${id}`)
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