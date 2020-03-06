<template>
    <div class="fre-profile-box">
        <div class="profile-freelance-info-wrap active">
            <div class="profile-freelance-info" id="cnt-profile-default" v-if="!edit">
                <div class="freelance-info-avatar">
                    <span class="freelance-avatar">
                        <img alt="" :src="user.files.length ? `${user.files[0].path}` : 'http://0.gravatar.com/avatar/68667eb897f78a64d3fb5e0a093ef09e?s=125&amp;d=mm&amp;r=G'" class="avatar avatar-125 photo avatar-default  lazyload-loaded" height="125" width="125">
                    </span>
                    <span class="freelance-name">{{ user.name }}
                        <span class="freelance-empty-info" v-if="user.type === 4"><i>{{ user.job_title || `Sin título profesional` }}</i></span>
                    </span>
                </div>
                <div class="freelance-info-content">
                    <div class="freelance-rating">
                        <span class="rate-it" data-score="" title="Not rated yet!">
                            <i data-alt="1" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="2" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="3" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="4" class="fa fa-star-o off star-off-png" title="Not rated yet!"></i>&nbsp;
                            <i data-alt="5" class="fa fa-star-o off star-off-png" title="Not rated yet!">
                            </i><input name="score" type="hidden" readonly="">
                        </span>
                        <span class="freelance-empty-info" v-if="user.type === 4"><i>{{ `${user.years_experience} Años trabajados` || `Sin información de experiencia anual` }}</i></span>
                        <span v-if="user.type === 4">{{ doneProjects }} Proyectos trabajados </span>
                        <span v-else>{{ user.cant_projects }} Consultores contratados</span>
                        <span class="freelance-empty-info"><i>{{ user.country ? user.country.name : `Sin información de país` }}</i></span>
                    </div>
                    <div class="freelance-hourly" v-if="user.type === 4">
                        <span></span>
                        <span>$0 ganado</span>
                    </div>
                    <div class="my-3" v-if="user.type === 4">
                        <h5>Lenguajes</h5>
                         <span class="badge badge-warning mr-2 mt-1 p-2" style="background: #f7c750;" v-for="lang in user.languages" :key="lang.id">
                            {{ `${decodeURI(lang.name)} (${levels.find(n => lang.pivot.level === n.value).label})` }}
                        </span>
                    </div>
                    <template v-if="user.type === 4">
                        <template v-if="user.sub_categories.length > 0">
                            <h5>Habilidades</h5>
                            <span class="badge badge-warning mr-2 mt-1 p-2" style="background: #f7c750;" v-for="category in user.sub_categories" :key="category.id">
                                {{ category.name }}
                            </span>
                        </template>
                        <template v-else>
                            Sin información de habilidades
                        </template>
                    </template>
                    <br>
                    <br>
                    <template>
                        <h5>{{ user.type === 4 ? `Reseña profesional` : 'Información sobre ti o tu empresa' }}</h5>
                        <div v-html="user.about"></div>
                    </template>
                </div>
                <div class="employer-info-edit text-right">
                    <a href="javascript:void(0)" class="cons-button employer-info-edit-btn profile-show-edit-tab-btn" @click="toggleEdit()">Editar</a>
                </div>
                <a href="#" class="fre-view-as-others">Ver perfil como visitante</a>
            </div>

            <div v-else class="profile-employer-info-edit cnt-profile-hide" id="ctn-edit-profile">
                <div class="">
                    <span class="employer-avatar img-avatar image">
                        <label for="picture_profile" class="picture_wrapper">
                            <i class="fa fa-camera"></i>
                            <img id="user_image" :src="user.files.length ? `${user.files[0].path}` : 'http://0.gravatar.com/avatar/68667eb897f78a64d3fb5e0a093ef09e?s=125&amp;d=mm&amp;r=G'" class="avatar avatar-125 photo avatar-default lazyload-observe" height="125" width="125">
                            <input type="file" style="display: none;" id="picture_profile" @change="updatePicture">
                        </label>
                    </span>
                </div>
                <div class="fre-employer-info-form" id="accordion" role="tablist" aria-multiselectable="true">
                    <form id="profile_form" class="form-detail-profile-page" action="" method="post" novalidate="" @submit.prevent="update">
                        <div class="fre-input-field">
                            <input type="text" name="display_name" id="display_name" placeholder="Tu nombre" v-model="form.name">
                        </div>
                        <div class="fre-input-field" v-if="user.type === 4">
                            <input type="text" name="et_professional_title" placeholder="Titulo Profesional" v-model="form.job_title">
                        </div>
                        <div class="fre-input-field">
                            <select-picker filterable :default-value="user.country_id || 0" :source="countries.map(el => ({label: el.name, value: el.id}))" v-model="form.country_id" />
                        </div>

                        <div class="row" style="margin-right: 0; margin-left: 0;">
                            <ul class="col-sm-12 col-md-4 col-lg-4 list-group mt-2" v-for="(lang, key) in form.langs" :key="key">
                                <li v-for="level in levels" class="list-group-item" :key="level.value">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" :id="`langLevel_${level.label}_${lang}_${key}`" class="custom-control-input" :value="level.value" v-model="langs[key]">
                                        <label class="custom-control-label" :for="`langLevel_${level.label}_${lang}_${key}`">
                                            {{ languages.find(el => el.id === lang) ? decodeURI(languages.find(el => el.id === lang).name) : '' }} {{ level.label }}
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group" v-if="user.type === 4">
                            <select-picker :default-value="user.languages.map(el => el.id)" :source="languages.map(el => ({ label: el.name, value: el.id }))" @input="el" tags :max="5" v-model="form.langs" />
                        </div>
                        

                        <!-- <div class="fre-input-field fre-experience-field mt-4" v-if="user.type === 4">
                            <input type="number" value="" name="et_experience" id="et_experience" min="0" placeholder="Total" v-model="form.years_experience">
                            <span>Años de experiencia</span>
                        </div>
                        <div class="fre-input-field fre-hourly-field" v-if="user.type === 4">
                            <input type="number" name="hour_rate" id="hour_rate" step="5" min="0" placeholder="Tarifa por hora" v-model="form.hourly_rate">
                            <span>$ Tarifa por hr en USD</span>
                        </div>
                        <div class="fre-input-field" v-if="user.type === 4">
                            <br>
                            <h4> Ingresa tus especialidades aquí </h4>
                            <br>
                            <select-picker :default-value="user.sub_categories.map(el => el.id)" :source="mappedCategories" tags :max="5" v-model="form.skills" />
                        </div>
                        <div class="fre-input-field" v-if="user.type === 4">
                            <label class="fre-checkbox no-margin-bottom" for="email-skill">
                                <input id="email-skill" type="checkbox" name="email_skill" v-model="form.email_receive">
                                <span></span>
                                Enviarme emails relacionados con mis habilidades
                            </label>
                        </div>
                        <br>
                        <div class="fre-input-field">
                            <h4>{{ user.type === 4 ? `Reseña profesional` : 'Información sobre ti o tu empresa' }}</h4>
                            <span> Escribe algunas palabras que le digan al cliente el porqué debe contratarte.</span>
                            <br>
                            <br>
                            <wysiwyg v-model="form.about" placeholder="Describete como profesional" />
                        </div> -->

                        <div class="employer-info-save btn-update-profile btn-update-profile-top text-right">
                            <span class="employer-info-cancel-btn profile-show-edit-tab-btn" @click="toggleEdit()">Cancelar &nbsp; </span>
                            <button class="cons-button btn-submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="profile-freelance-available" v-if="user.type === 4">
            <h2>Disponible para contratar</h2>
            <div class="fre-input-field">
                <label for="fre-switch-user-available" class="fre-switch">
                    <input id="fre-switch-user-available" type="checkbox" @change="toggleStatus" :checked="user.work_available">
                    <div id="switch" class="fre-switch-slider"></div>
                </label>
            </div>
            <p class="freelance-available-desc">Activar para mostrar el botón "Invítame" en tu perfil, permitiendo que los empleadores puedan sugerirte sus proyectos.</p>
        </div>

        <div id="myModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <vue-croppie 
                        ref="croppieRef" 
                        :enableOrientation="true"
                        :boundary="{ width: 300, height: 300}">
                    </vue-croppie>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="saveCrop">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import skills from '../../../data/skills.json';
export default {
    data: () => ({
        skills,
        edit: false,
        form: {
            langs: []
        },
        ela: {},
        langs: [],
        levels: [
            { label: 'Básico', value: 1 },
            { label: 'Medio', value: 2 },
            { label: 'Alto', value: 3 },
        ],
        result: ''
    }),
    props: {
        user: { required: true, type: Object, default: () => ({}) },
        doneProjects: { required: false, type: [Number, String], default: 0 },
        categories: { required: false, type: Array, default: () => [] },
        countries: { required: false, type: Array, default: () => [] },
        languages: { required: false, type: Array, default: () => [] },
    },
    methods: {
        el() {
            this.form.about = this.form.about
        },
        decodeURI(val) {
            return decodeURI(val)
        },
        toggleEdit() {
            this.edit = !this.edit
        },
        update() {

            let data = {};

            Object.keys(this.form).filter(el => {
                return this.form[el]
            }).forEach(el => {
                data[el] = this.form[el]
            })

            data.languages = this.form.langs.map((lang, key) => {
                return { id: lang, level: this.langs[key] || 1 }
            })

            axios.put('/user/update', data)
                .then(res => {
                    this.$swal('Datos actualizados');
                })
                .catch(err => {
                    console.log('error', err)
                }).finally(() => {
                    console.log('finished')
                })
        },
        saveCrop() {
            let data = new FormData();
            
            data.append('file', this.$refs.croppieRef.croppie.data.url)

            axios.post(`/user/set-avatar`, data, {
                'Content-Type': 'multipart/form-data'
            })
            .then(res => {
                this.$swal('Datos actualizados');
                location.reload()
            })
            .catch(err => {
                console.log('error', err)
            }).finally(() => {
                console.log('finished')
            })
        },
        toggleStatus(e) {
            axios.patch(`/user/change-status/${e.target.checked}`)
                .then(res => {
                    this.$swal(e.target.checked ? `Habilitado` : `Deshabilitado`);
                })
                .catch(err => {
                    console.log('error', err)
                }).finally(() => {
                    console.log('finished')
                })
        },
        updatePicture(e) {
            $('#myModal').modal('show')
            let reader = new FileReader()

            reader.onload = () => {
                this.$refs.croppieRef.bind({
                    url: reader.result,
                });
            }

            reader.readAsDataURL(e.target.files[0]);
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
    },
    mounted () {
        this.form = this.user
        this.form.langs = this.user.languages.map(el => el.id)
        this.langs = this.user.languages.map(el => el.pivot.level)
    }
}
</script>

<style lang="scss" scoped>
    .picture_wrapper {
        position: relative;
        cursor: pointer;

        .fa.fa-camera {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            // width: 60px;
            font-size: 24px;
            border-radius: 50px;
            background: white;
            color: #eee;
            background: rgba(0, 0, 0, .4);
            padding: 10px;
            transition: all .1s;
        }

        &:hover > .fa.fa-camera {
            transform: translate(-50%, -50%) scale(1.1);
            color: white;
            transition: all .1s;
        }

        #user_image {
            border-radius: 50%;
        }
    }
</style>