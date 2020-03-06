<template>
    <div class="fre-profile-box">
        <div class="profile-freelance-experience">
            <div class="row" v-if="!edit">
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                    <h2 class="freelance-experience-title">Experiencia Laboral</h2>
                </div>
                <span class="d-block w-100p">
                    <p class="col-xs-12 fre-empty-optional-profile p-3">Agrega experiencias laborales a tu perfil. (opcional)</p>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 mt-1" v-for="(work, key) in user.work_experiences" :key="key">
                            <experience-card :experience="work" />
                        </div>
                    </div>
                    <div class="d-block text-right">
                        <button class="cons-button profile-show-edit-tab-btn" @click="edit = true">Agregar</button>
                    </div>
                </span>
            </div>
            <ul v-else class="freelance-experience-list" id="xpLaboralEdit">
                <li><h2 class="freelance-experience-title">Experiencia Laboral</h2></li>
                <li class="cnt-profile-hide" id="ctn-edit-experience">
                    <div class="freelance-experience-new">
                        <form class="fre-experience-form freelance-experience-form" @submit.prevent="send">
                            <div class="fre-input-field">
                                <input type="text" name="work_experience[title]" placeholder="Titulo" v-model="form.name">
                                <span class="help text-danger" v-if="hasError('name')">{{ getError('name') }}</span>
                            </div>
                            <div class="fre-input-field">
                                <input type="text" name="work_experience[subtitle]" placeholder="Compañia" v-model="form.company_name">
                                <span class="help text-danger" v-if="hasError('company_name')">{{ getError('company_name') }}</span>
                            </div>
                            <div class="fre-input-field no-margin-bottom">
                                <label class="fre-field-title">Periodo</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="fre-input-field">
                                            <v-date-picker class="w-100p" placeholder="Desde" v-model="form.date_from"/>
                                            <span class="help text-danger" v-if="hasError('date_from')">{{ getError('date_from') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="fre-input-field">
                                            <v-date-picker class="w-100p" placeholder="Hasta" v-model="form.date_to"/>
                                            <span class="help text-danger" v-if="hasError('date_to')">{{ getError('date_to') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fre-input-field">
                                <label class="fre-checkbox no-margin-bottom" for="currently-working">
                                    <input type="checkbox" id="currently-working" v-model="form.at_present" class="currently-working">
                                    <span></span>
                                    Trabajando aquí actualmente
                                </label>
                            </div>
                            <div class="fre-input-field no-margin-bottom">
                                <textarea name="work_experience" class="form-control" placeholder="Description (optional)" v-model="form.description"></textarea>
                                <span class="help text-danger" v-if="hasError('description')">{{ getError('description') }}</span>
                            </div>
                            <div class="fre-form-btn">
                                <button type="submit" class="fre-normal-btn btn-submit">Guardar</button>
                                <span class="fre-experience-close profile-show-edit-tab-btn" @click="edit = false">Cancelar</span>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import ExperienceCard from './work_experience_card';
export default {
    props: {
        months: { required: false, type: Array, default: () => [] },
        years: { required: false, type: Array, default: () => [] },
        user: { required: true, type: Object }
    },
    data: () => ({
        edit: false,
        form: {
            name: '',
            company_name: '',
            date_from: '',
            date_to: '',
            description: '',
            at_present: false,
            file: []
        },
        errors: {}
    }),
    methods: {
        send() {
            axios.post(`/work-experience/store`, this.form)
                .then(res => {
                    this.$swal('Datos actualizados');
                    location.reload()
                }).catch(err => this.addErrors(err.response.data.errors))
        },
        destroy(id) {
            axios.delete(`work-experience/destroy/${id}`)
                .then(() => location.reload())
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
    },
    components: {
        ExperienceCard
    }
}
</script>
