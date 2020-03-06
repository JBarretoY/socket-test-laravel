<template>
    <div class="fre-profile-box" :style="[create && { padding: 0 }]">
        <div class="portfolio-container">
            <template v-if="!edit">
                <div class="profile-freelance-portfolio" v-if="!create">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2 class="freelance-portfolio-title mb-3">Portafolio de Proyectos<a class="aler-rec">Recomendado</a></h2>
                        </div>
                    </div>
                    <p class="fre-empty-optional-profile">Menciona aquí los proyectos y/o empresas en los que has trabajado y te hacen sentir orgulloso</p>
                    <div class="mt-2">
                        <div class="grid-portfolio">
                            <div v-for="(i, k) in user.portfolios" :key="k" class="portfolio relative">
                                <span class="name-overlay">{{ i.name.length > 20 ? `${i.name.substring(0, 20)}...` : i.name }}</span>
                                <template v-if="i.files.length">
                                    <img :src="`/file/${i.files[0].name}`" style="width: 180px;">
                                </template>
                                <template v-else>No files</template>
                                <div class="bottom-overlay">
                                    <button class="ghost-button" @click="select(i)">
                                        <i class="fa fa-pencil" style="color: white;"></i>
                                    </button>
                                    <button class="ghost-button" @click="destroy(i.id)">
                                        <i class="fa fa-trash" style="color: white;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="cons-button portfolio-add-btn add-portfolio" @click="create = true">Agregar</button>
                    </div>
                </div>
                <div v-else class="card" style="border: none;">
                    <div class="card-header d-flex justify-content-between" style="background: white;">
                        <h2 class="freelance-portfolio-title mb-3" style="flex-grow: 1;">Portafolio de Proyectos <a class="aler-rec">Recomendado</a></h2>
                        <button href="#" class="cons-button portfolio-add-btn add-portfolio" @click="create = false">
                            Cancelar
                        </button>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="">Titulo del portafolio</label>
                                <input type="text" class="form-control" name="name" v-model="form.name">
                                <span class="help text-danger" v-if="hasError('name')">{{ getError('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción del potafolio</label>
                                <wysiwyg v-model="form.description" name="description" placeholder="Ingresa aqui la descripción" />
                                <span class="help text-danger" v-if="hasError('description')">{{ getError('description') }}</span>
                            </div>
                            <div class="form-group">
                                <dropzone multiple style="height: 200px;" name="file" v-model="form.file" accept=".jpg,.jpeg,.png,.gif">
                                    <h4 style="text-align: center;">Presione aquí o arrastre los archivos</h4>
                                </dropzone>
                                <span class="help text-danger" v-if="hasError('file')">{{ getError('file') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Selecciona las habilidades de tu portafolios</label>
                                <select-picker :default-value="[]" name="categories" :source="user.sub_categories.map(el => ({label: el.name, value: el.id}))" tags :max="5" v-model="form.categories"/>
                                <span class="help text-danger" v-if="hasError('categories')">{{ getError('categories') }}</span>
                            </div>
                        </form>
                    </div>
                    <div class="card-foote">
                        <div class="text-right p-3">
                            <button class="cons-button portfolio-add-btn add-portfolio" @click="send">Confirmar</button>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
                <div class="card" style="border: none;">
                    <div class="card-header d-flex justify-content-between" style="background: white;">
                        <h2 class="freelance-portfolio-title mb-3" style="flex-grow: 1;">Portafolio de Proyectos <a class="aler-rec">Recomendado</a></h2>
                        <button href="#" class="cons-button portfolio-add-btn add-portfolio" @click="select(null)">
                            Cancelar
                        </button>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="">Titulo del portafolio</label>
                                <input type="text" class="form-control" v-model="portfolio.name">
                            </div>
                            <div class="form-group">
                                <label for="">Descripción del potafolio</label>
                                <wysiwyg v-model="portfolio.description" placeholder="Ingresa aqui la descripción" />
                            </div>

                            <div class="form-group">
                                <dropzone multiple style="height: 200px;" v-if="portfolio.files.length < 3" :max="3 - portfolio.files.length" v-model="portfolio.file" accept=".jpg,.jpeg,.png,.gif">
                                    <h4 style="text-align: center;">Presione aquí o arrastre los archivos</h4>
                                </dropzone>

                                <div class="row mt-2">
                                    <div class="col">
                                        <span class="relative" v-for="(file, key) in portfolio.files" :key="key">
                                            <button type="button" class="close removable-img" data-dismiss="alert" aria-label="Close" @click="deleteFile(file, key)">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <img :src="`/file/${file.name}`" class="img-thumbnail" style="width: 160px; height: 160px; margin: 2.5px;">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Selecciona las habilidades de tu portafolios</label>
                                <select-picker :default-value="portfolio.sub_categories.map(el => el.id)" :source="user.sub_categories.map(el => ({label: el.name, value: el.id}))" tags :max="5" v-model="portfolio.categories"/>
                            </div>
                        </form>
                    </div>
                    <div class="card-foote">
                        <div class="text-right p-3">
                            <button class="cons-button portfolio-add-btn add-portfolio" @click="update">Actualizar</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: { required: true, type: Object },
        categories: { required: false, type: Array, default: () => [] }
    },
    data: () => ({
        create: false,
        edit: false,
        form: {
            name: '',
            description: '',
            file: [],
            categories: []
        },
        errors: {},
        modal: false,
        portfolio: {},
        selected: null,
        updatingFiles: []
    }),
    methods: {
        send() {
            let data = new FormData();
            for(let file of this.form.file) {
                data.append('file[]', file)
            }

            data.append('name', this.form.name)
            data.append('description', this.form.description)

            for (let a of this.form.categories) {
                data.append('categories[]', a)
            }

            axios.post(`/portfolio/store`, data)
                .then(el => {
                    this.errors = {}
                    this.$swal('Datos actualizados')
                })
                .catch(err => this.addErrors(err.response.data.errors))
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
        clearError(error) {
            delete this.errors[error]
        },
        removeImg(key) {
            this.portfolio.files.splice(key, 1)
        },
        destroy(id) {
            this.$swal({
                title: 'Seguro que desea realizar esta accion?',
                text: 'Esto no se podra deshacer',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar!',
                cancelButtonText: 'Conservar!',
                showCloseButton: true,
                showLoaderOnConfirm: true
            }).then((result) => {
                if(result.value) {
                    axios.delete(`/portfolio/destroy/${id}`)
                        .then(() => location.reload())
                }
            })
        },
        select(portfolio) {
            this.edit = portfolio !== null
            this.portfolio = portfolio
        },
        close () {
            document.body.classList.remove('unscroll')
            this.modal = false
        },
        update() {
            delete this.portfolio.files
            axios.put(`/portfolio/update`, this.portfolio)
                .then(el => this.$swal('Datos actualizados'))
                .catch(err => alert('error'))
        },
        deleteFile(file, key) {
            axios.post(`/portfolio/del-files`, {
                file: [file.id]
            })
            .then(() => this.removeImg(key))
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
    }
}
</script>

<style lang="scss" scoped>
.portfolios {
    .portfolio {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }
}


li {
    position: relative;

    .bottom-overlay {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;

        .ghost-button {
            background: transparent;
            display: block;
            flex-grow: 1;
            border: none;
            padding: 10px;
        }
    }


    &:hover .bottom-overlay {
        display: block;
        background: rgba(0, 0, 0, .4);
        display: flex;
        justify-content: space-between;
    }
}

.modal-overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background: rgba(0, 0, 0, .7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;

    .modal-content {
        position: relative;
        height: 90%;
        width: 90%;
    }
}

.img-slidable {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    background: rgba(0, 0, 0, 0.7);
}

.grid-portfolio {
    display: grid;
    grid-template-columns: repeat(4, 180px);
    grid-gap: 10px;
    grid-auto-rows: 180px;

    .name-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 5px;
        background: rgba(0, 0, 0, .4);
        color: white;
        text-align: center;
    }

    div, div img {
        height: 100%;
        width: 100%;
        padding: 2px;
    }

    div {
        .bottom-overlay {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 45px;

        .ghost-button {
            background: transparent;
            display: block;
            flex-grow: 1;
            border: none;
            padding: 10px;
        }
    }


        &:hover .bottom-overlay {
            display: block;
            background: rgba(0, 0, 0, .4);
            display: flex;
            justify-content: space-between;
        }
    }
}

.removable-img {
    position: absolute;
    top: 3px;
    right: 5px;
    color: white;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 0 0 0 8px;
    background: rgba(0, 0, 0, .7);
}
</style>
