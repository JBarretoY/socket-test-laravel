<template>
    <div>
        <div class="fre-page-wrapper list-profile-wrapper">
            <div class="fre-page-title">
                <div class="container">
                    <h2>Mi Perfil</h2>
                </div>
                <!-- {{ user }} -->
            </div>
            <div class="fre-page-section">
                <div class="container">
                    <div class="profile-freelance-wrap">
                        <div class="alert alert-light alert-dismissible fade show" role="alert" style="border-color: slategrey; position: fixed; bottom: 10px; right: 10px; z-index: 1;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="fa fa-warning"></i> Debes completar tu perfil para hacer cualquier actividad en el sitio
                        </div>

                        <div class="fre-profile-box" v-if="user.type === 4">
                            <h3> Progreso de mi perfil</h3>

                            <div class="card">
                                <div class="card-body">
                                    <ul style="list-style: none; margin-bottom: 0; padding-left: 5px;">
                                        <li class="checkbox checkbox-primary">
                                            <i class="fa fa-check" style="padding: 5px; background: green; color: white; border-radius: 50%;"></i>
                                            <label>Agregar información básica</label>
                                        </li>
                                        <li class="checkbox checkbox-primary">
                                            <i class="fa fa-check" style="padding: 5px; background: green; color: white; border-radius: 50%;"></i>
                                            <label>Agregar experiencia laboral y portafolio</label>
                                        </li>
                                        <li class="checkbox checkbox-primary">
                                            <i class="fa fa-check" style="padding: 5px; background: green; color: white; border-radius: 50%;"></i>
                                            <label>Agregar certificaciones a tu perfil</label>
                                        </li>
                                        <li class="checkbox checkbox-primary">
                                            <i class="fa fa-check" style="padding: 5px; background: green; color: white; border-radius: 50%;"></i>
                                            <label> Agregar experiencias académicas a tu perfil</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" :style="{width: `${percentCompleted}%`}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{ `${percentCompleted}%` }}
                                </div>
                            </div>

                            <!-- {{ Object.entries(user).filter(el => {
                                return el[1] === null
                            }).map(el => ({
                                [el[0]]: el[1]
                            })) }} -->
                        </div>
                        <br>

                        <profile-section :user="user" :categories="categories" :countries="countries" :done-projects="doneProjects" :languages="languages" />
                        <email-password-section :user="user" />
                        <template v-if="user.type === 4">
                            <portfolio-section :user="user" :categories="categories" />
                            <work-experience-section :user="user"/>
                            <certificates-section :user="user" />
                            <education-section :user="user" />
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import skills from '../../../data/skills.json';
import months from '../../../data/skills.json';
import years from '../../../data/skills.json';

import ProfileSection from './profile';
import EmailPasswordSection from './email_password';
import PortfolioSection from './portfolio';
import WorkExperienceSection from './work_experience';
import CertificatesSection from './certificate';
import EducationSection from './education';

export default {
    props: {
        user: { required: true, type: Object },
        doneProjects: { required: true, type: Number },
        categories: { required: false, type: Array, default: () => [] },
        countries: { required: false, type: Array, default: () => [] },
        languages: { required: false, type: Array, default: () => [] }
    },
    data: () => ({
        skills,
        months,
        years,
        edit: {
            profile: false,
            account: false
        },
        etc: '',
        myHTML: ''
    }),
    methods: {
        toggleEdit(type) {
            this.edit[type] = !this.edit[type]
        },
        handleSend(e) {
            let data = new FormData();
            for(let file of e.target.files) {
                data.append('file[]', file)
            }

            data.append('name', 'tegucigalpa')
            data.append('granted_by', 'aaaa')
            data.append('date_from', '1997-03-01')
            data.append('date_to', '1997-03-01')
            data.append('description', 'some fancy description')

            axios.post(`/certificate/store`, data)
                .finally(el => console.log('finished'))
        }
    },
    computed: {
        percentCompleted() {
            let data = this.user;
            const uncompleted = Object.values(data).filter(el => {
                if (el === null) {
                    return true
                }

                if (el instanceof Array) {
                    if (!el.length) {
                        return true
                    }
                }

                return false
            })

            const dataLength = Object.keys(data).length
            return ((dataLength - uncompleted.length) / dataLength * 100).toFixed(0);
        }
    },
    components: {
        ProfileSection,
        EmailPasswordSection,
        PortfolioSection,
        WorkExperienceSection,
        CertificatesSection,
        EducationSection
    }
}
</script>
