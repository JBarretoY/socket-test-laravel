<template>
    <div class="fre-page-wrappe conversation-panelr" id="tab_private_msg">
        <div class="fre-page-title">
            <div class="container">
                <h2>Mensajeria Privada</h2>
            </div>
        </div>
        <div class="fre-page-section">
            <div class="container">
                <div class="fre-inbox-wrap">
                    <div class="row">
                        <div class="col-md-4 private-message-conversation-contents ">
                            <div class="inbox-user-wrap">
                                <div class="search-inbox-user">
                                    <input class="search" type="text" name="s" placeholder="Buscar nombre de empleador">
                                    <i class="fa fa-search"></i>
                                </div>
                                <div class="chosen-inbox-read">
		                            <select class="fre-chosen-single fre-filter-conversation" data-chosen-width="20%" data-chosen-disable-search="1" data-placeholder="Select a status" name="conversation_status" style="display: block; position: absolute;">
                                        <option value="">Todo</option>
                                        <option value="unread">Sin leer</option>
                                    </select>
                                    <div class="chosen-container chosen-container-single fre-chosen-single fre-filter-conversation" title="" style="width: 100%;">
                                        <a class="chosen-single">
                                            <input class="chosen-search-input" type="text" autocomplete="off">
                                            <span>Todo</span>
                                            <div><b></b></div>
                                        </a>
                                        <div class="chosen-drop">
                                            <div class="chosen-search"></div>
                                            <ul class="chosen-results"></ul>
                                        </div>
                                    </div>
                                </div>      
                                <div class="no-message-wrap">
                                    <ul>
                                        <li v-for="(message, k) in messages" :key="k">
                                            {{ message }}
                                        </li>
                                    </ul>
                                    <!-- <p>Aún no has creado ninguna conversación. Regrese a su lista de consultores que le han ofertado en Detalles del proyecto para comenzar una conversación con un consultor.</p> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 private-message-reply-contents" style="display:block">
                            <div class="row">
                                <div class="col-md-12  col-sm-12 col-xs-12">
                                    <div class="inbox-content-wrap">
                                        <h2 class="inbox-project-title">
                                            <span class="fre-back-inbox-btn visible-sm visible-xs">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            </span>
                                            <span class="title-conversation" style="text-decoration: none"></span>
                                        </h2>
                                        <div class="fre-conversation-wrap fre-inbox-message" style="position: relative">
                                            <ul class="fre-conversation-list"></ul>
                                        </div>
                                        <div class="conversation-typing-wrap ae-pr-msg-reply-form">
                                                <div class="conversation-typing">
                                                    <textarea @keyup.enter="send" name="post_title" class="content-chat" placeholder="Escribe tu mensaje aqui..." style="height: 38px;" v-model="text"></textarea>
                                                    <input type="hidden" name="post_content" value="">
                                                    <input type="hidden" name="post_parent" value="">
                                                    <input type="hidden" name="sync_type" value="reply">
                                                </div>
                                                <div class="conversation-submit-btn">
                                                    <label class="conversation-send-message-btn disabled" for="conversation-send-message">
                                                        <input id="conversation-send-message" type="submit" class="ae-pr-msg-reply-submit" disabled="">
                                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                    </label>
                                                </div>
                                        </div>
                                    </div>
                                </div>
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
        user: { required: true, type: Object }
    },
    data: () => ({
        text: 'asdas',
        messages: []
    }),
    methods: {
        send() {
             this.$socket.emit('new-message', {
                 user_id: this.user.id,
                 text: this.text
             })
        }
    },
    sockets: {
        messages(data) {
            this.messages = data
        }
    }
}
</script>