<template>
    <li :class="[!isMyMessage && 'partner-message']">
        <span class="message-avatar">
            <img alt="" :src="renderedPhoto" class="avatar avatar-33 photo avatar-default mCS_img_loaded lazyload-loaded" height="33" width="33">
        </span>
        <div class="message-item">
            {{ message.message }}
        </div>
    </li>
</template>

<script>
import { mapState } from 'vuex'
export default {
    props: {
        message: { required: true, type: Object }
    },
    computed: {
        ...mapState({
            session: state => state.user
        }),
        isMyMessage() {
            return this.message.user_id_from === this.session.id
        },
        renderedPhoto() {
            const unknown_photo = `http://1.gravatar.com/avatar/11b2eafd830359ded09509d5ed02d897?s=33&amp;d=mm&amp;r=G`
            let photo = this.message.from.files.length > 0 ? this.message.from.files[0].path : unknown_photo
            return photo
        }
    }
}
</script>