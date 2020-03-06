<template>
    <div class="fre-page-wrapper">
        <div class="container">
            <div class="fre-project-detail-wrap">
                <div class="project-detail-box">
                    <div class="project-detail-info">
                        <div class="row">
                            <div class="col-lg-8 col-md-7">
                                <h1 class="project-detail-title">
                                    <a :href="`/projects/${project.slug}`">{{ project.name }}</a>
                                </h1>
                                <ul class="project-bid-info-list">
                                    <li>
                                        <span>Cliente</span>
                                        <a href="http://betatest.consultaneo.com/author/clientdorcy/" target="_blank">
                                            <span>{{ project.user.name }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <span>Oferta Ganadora</span>
                                        <span>$221.00</span>
                                    </li>
                                    <li>
                                        <span>Fecha de entrega</span>
                                        <span>marzo 31, 2020</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <p class="project-detail-posted">Publicado el 29 febrero 2020</p>
                                <span class="project-detail-status">
                                    Procesando
                                </span>
                                <div class="project-detail-action"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="workspace-project-box">
                    <div class="row">
                        <div class="col-md-8">
                            <chat-box />
                        </div>
                        <div class="col-md-4">
                            <milestones-box />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import ChatBox from './chat/chat';
import MilestonesBox from './milestones/milestones';
export default {
    components: {
        ChatBox,
        MilestonesBox
    },
    props: {
        user: { required: true, type: Object },
        project: { required: true, type: Object },
        chat: { required: false, type: Array, default: () => [] }
    },
    computed: mapState({
        session: state => state.user
    }),
    methods: mapActions({
        setUser: 'setUser',
        setProject: 'project/setProject',
        setChat: 'project/setChat',
    }),
    created() {
        if (this.user.id === this.project.client_id || this.user.id === this.project.consulter_id) {
            this.setUser(this.user)
            this.setProject(this.project)
            this.setChat(this.chat)
        } else {
            location.href = `/projects/${this.project.slug}`
        }
    }
}
</script>