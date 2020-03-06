<template>
    <div id="workspace-conversation" class="project-workplace-details workplace-details workspace-conversation tab-pane">
        <h2 class="workspace-title">Conversación</h2>
        <div class="message-container">
            <div class="list-chat-work-place-wrap fre-conversation-wrap fre-conversation mCustomScrollbar _mCS_1 mCS_no_scrollbar" style="height: 524px;">
                <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0">
                    <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                        <ul class="fre-conversation-list list-chat-work-place new-list-message-item upload_file_file_list">
                            <li class="message-time">29 February 2020</li>

                            
                            <chat-message v-for="(message, key) in messages" :key="key" :message="message" />

                            <li class="milestone-item-noti">Alejandra ha resuelto  none section</li>
                            <li class="milestone-item-noti">clientdorcy ha cerrado  none section</li>
                        </ul>
                    </div>
                </div>
            </div>
            <chat-input v-model="message" @send="send"/>
        </div>
    </div>
</template>

<script>

import { mapState, mapActions } from 'vuex';
import ChatMessage from './chat-message';
import ChatInput from './chat-input';
export default {
    components: {
        ChatMessage,
        ChatInput
    },
    data: () => ({
        message: '',
    }),
    computed: mapState({
        // messages: state => state.chat.messages,
        session: state => state.user,
        project: state => state.project.project,
        messages: state => state.project.chat
    }),
    methods: {
        ...mapActions({
            appendMessage: 'chat/appendMessage'
        }),
        isSameProject(current, incoming) {
            return current === incoming
        },
        isRealDestination(destination) {
            return true
        },
        send() {
            axios.post('/message/store', {
                user_id_to: this.project.client_id === this.session.id ? this.project.consulter_id : this.project.client_id,
                message: this.message,
                work_space: true
            }).then(() => {
                // this.$socket.emit('workspace_message', {
                //     project_id: this.project.id,
                //     user_id_from: this.session.id,
                //     user_id_to: 2,
                //     message: this.message,
                //     from: this.session,
                //     to: {}
                // })
            })
            
            this.message = ''
        }
    },
    sockets: {
        on_message_receive(message) {
            if (this.isSameProject(this.project.id, message.project_id)) {
                this.appendMessage(message)
            }
        }
    },
}
</script>