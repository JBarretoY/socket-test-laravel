<template>
    <div class="fre-profile-box">
        <div class="profile-employer-secure-wrap active">
            <h2 class="freelance-account-title">Mi cuenta</h2>
            <div class="profile-employer-secure cnt-profile-hide" id="cnt-account-default" v-if="!edit">
                <p><span>Dirección Email:</span>{{ user.email }}</p>
                <div class="employer-secure-edit text-right">
                    <button class="cons-button profile-show-edit-tab-btn" @click="edit = true">Editar</button>
                </div>
            </div>
            <div v-else class="profile-employer-secure-edit cnt-profile-hide" id="ctn-edit-account">
                <form id="account_form" novalidate="" @submit.prevent="changeEmail">
                    <div class="fre-input-field">
                        <label>Dirección Email:</label>
                        <input type="email" class="" id="user_email" name="user_email" :placeholder="user.email" v-model="emailForm.email">
                    </div>
                    <div class="employer-info-save btn-update-profile text-right">
                        <input type="submit" class="fre-normal-btn fre-btn" name="" style="width: 100%" value="Guardar">
                        <span class="employer-info-cancel-btn profile-show-edit-tab-btn" @click="edit = false">Cancelar</span>
                    </div>
                </form>
            </div>
        </div>
        <div class="profile-secure-code-wrap">
            <p v-if="!editPassword">
                <span>Contraseña</span>
                <button class="cons-button profile-show-edit-tab-btn" @click="editPassword = true" style="width: unset;">Cambiar Contraseña</button>
            </p>
            <template v-else>
                <div>
                    <div class="form-group">
                        <label for="">Contraseña actual</label>
                        <input type="password" class="form-control" v-model="formPass.old_pass">
                    </div>
                    <div class="form-group">
                        <label for="">nueva contraseña</label>
                        <input type="password" class="form-control" v-model="formPass.new_pass">
                    </div>
                    <div class="form-group">
                        <label for="">Repita contraseña</label>
                        <input type="password" class="form-control" v-model="formPass.re_new_pass">
                    </div>
                    <button class="cons-button profile-show-edit-tab-btn" @click="editPassword = false">Cancelar</button>
                    <button class="cons-button profile-show-edit-tab-btn" @click="updatepass">Actualizar</button>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: { required: true, type: Object }
    },
    data: () => ({
        edit: false,
        editPassword: false,
        emailForm: {
            email: ''
        },
        formPass: {
            new_pass: '',
            old_pass: '',
            re_new_pass: ''
        }
    }),
    methods: {
        updatepass() {
            axios.patch(`/user/updatepass`, this.formPass)
                .then(() => {
                    this.$swal('Datos actualizados')
                    location.reload()
                })
        },
        changeEmail() {
            axios.patch(`/user/show`, this.emailForm)
                .then(() => {
                    this.$swal('Datos actualizados')
                    location.reload()
                })
        }
    }
}
</script>
