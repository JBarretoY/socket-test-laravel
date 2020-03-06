<template>
    <div class="conversation-typing-wrap">
        <div class="conversation-typing">
            <textarea name="comment_content" class="content-chat" placeholder="Tu mensaje aqui...." v-model="content" @input="$emit('input', $event.target.value)" @keyup.enter="$emit('send', content)"></textarea>
        </div>
        <div class="conversation-submit-btn">
            <label class="conversation-send-file-btn" for="conversation-send-file">
                <div id="upload_file_container" style="position: relative;">
                    <span class="et_ajaxnonce" id="2a7399bf35"></span>
                        <span class="project_id" data-project="640"></span>
                        <span class="author_id" data-author="21"></span>
                        <a href="#" class="attack attach-file" id="upload_file_browse_button" style="position: relative; z-index: 1;">
                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                        </a>
                    <div id="html5_1e2f0lrk9tgpde4178114lo1e7k6_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 2px; left: 7px; width: 16px; height: 25px; overflow: hidden; z-index: 0;"><input id="html5_1e2f0lrk9tgpde4178114lo1e7k6" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="application/zip,.zip,.rar,application/pdf,.pdf,application/msword,.doc,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.docx,image/png,.png,image/jpeg,.jpg,.jpeg,image/gif,.gif,application/vnd.ms-excel,.xls,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,.xlsx"></div>
                </div>
            </label>

            <label class="conversation-send-message-btn disabled" for="conversation-send-message">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </label>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        content: ''
    })
}
</script>