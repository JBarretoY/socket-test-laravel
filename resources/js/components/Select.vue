<template>
    <div class="select-wrapper" v-click-outside="() => active = false">
        <div class="select-wrapper-selection" @click.stop="active = !active">
            <template v-if="tags">
                <ul class="select-wrapper-selection-tag">
                    <li class="select-wrapper-selection-tag-item" v-for="(tag, key) in names" :key="key">
                        {{ tag.label }} <i class="fa fa-close" @click="removeTag(key)"></i>
                    </li>
                    <li v-if="!savedTags.length">
                        Seleccione
                    </li>
                </ul>
            </template>
            <template v-else>
                <span>{{ selected || `Seleccione` }}</span>
            </template>
            <template v-if="active">
                <i class="fa fa-caret-up"></i>
            </template>
            <template v-else>
                <i class="fa fa-caret-down"></i>
            </template>
        </div>

        <ul class="select-wrapper-list-content" v-if="active">
            <li style="padding: 10px;" v-if="filterable">
                <input type="text" placeholder="buscar" class="input-filter" v-model="search">
            </li>
            <li class="select-wrapper-list-content-item" v-for="(src, key) in filteredItems" :key="key" @click="handleSelection(src, key, 0, true)">
                <div class="select-wrapper-list-content-item-selectable" :class="[src.childrens && 'parent']">{{ src.label }}</div>
                <template v-if="src.hasOwnProperty('childrens') && src.childrens && src.childrens.length > 0">
                    <ul style="list-style: none; padding-left: 0;">
                        <li v-for="(child, s_key) in src.childrens" :key="s_key" @click="handleSelection(child, key, s_key, false)" style="display: flex; align-items: center; padding: 5px; margin-left: -20px; padding-left: 40px;">
                            <div class="select-wrapper-list-content-item-selectable"><i class="fa fa-caret-right"></i> {{ child.label }}</div>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="select-wrapper-list-content-item" v-if="!filteredItems.length">
                No se encontraron coincidencias
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        source: { required: false, type: Array, default: () => [] },
        tags: { required: false, type: Boolean, default: false },
        max: { required: false, type: [String, Number], default: 9999 },
        filterable: { required: false, type: Boolean, default: false },
        defaultValue: { required: false, type: [String, Number, Array], default: null }
    },
    data: () => ({
        selected: '',
        active: false,
        search: '',
        savedTags: []
    }),
    methods: {
        handleSelection(src, key, s_key, isParent) {
            if (!src.hasOwnProperty('childrens')) {
                this.selected = src.label
                if (this.tags) {
                    if (!this.savedTags.some(tag => tag === src.value)) {
                        if (this.savedTags.length < parseInt(this.max)) {
                            this.savedTags.push(src.value)
                        }
                    }
                    this.$emit('input', this.savedTags)
                } else {
                    this.$emit('input', src.value)
                    this.active = false
                }
            } else {
                if (!isParent) {
                    if (this.tags) {
                        if (!this.savedTags.some(tag => tag === src.value)) {
                            if (this.savedTags.length < parseInt(this.max)) {
                                this.savedTags.push(src.value)
                            }
                        }
                        this.$emit('input', this.savedTags)
                    } else {
                        this.$emit('input', item.value)
                    }
                }
            }
        },
        removeTag(key) {
            this.savedTags.splice(key, 1)
            this.$emit('input', this.savedTags)
        }
    },
    computed: {
        filteredItems() {
            return this.source.filter(el => el.label.toLowerCase().includes(this.search.toLowerCase()))
        },
        names() {
            return this.savedTags.map(tag => {
                return this.source.find(src => src.value === tag) || this.source.find(src => src.childrens.some(el => el.value === tag)).childrens.find(el => el.value === tag) || 'unknown'
            })
        }
    },
    mounted () {
        if (this.tags) {
            if (this.defaultValue) {
                this.savedTags = this.defaultValue
                this.$emit('input', this.savedTags)
            }
        } else {
            if (this.defaultValue) {
                const found = this.source.find(el => parseInt(el.value) === parseInt(this.defaultValue))
                if (found) {
                    this.selected = found.label
                    this.$emit('input', found.value)
                }
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.select-wrapper {
    border: 1px solid #ccc;
    border-radius: 3px;
    position: relative;

    &-selection {
        padding: 5px 20px;
        min-height: 36px;
        display: flex;
        align-items: center;
        justify-content: space-between;

        &-tag {
            width: 100%;
            list-style: none;
            height: 100%;
            margin-bottom: 0;
            padding-left: 0;

            &-item {
                float: left;
                padding: 2.5px 10px;
                margin-right: 2.5px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
        }
    }

    &-list-content {
        border-top: 1px solid #ccc;
        list-style: none;
        position: absolute;
        top: 100%;
        max-height: 300px;
        margin: 0;
        padding: 0;
        left: -1px;
        background: white;
        border: 1px solid #ccc;
        z-index: 1;
        overflow-y: scroll;
        width: calc(100% + 2px);

        &-item {

            &-selectable {
                padding: 5px 20px;

                &:not(.parent) {
                    width: 100%;
                    display: block;
                    cursor: pointer;

                    &:hover {
                        background: #e9f9f9;
                    }
                }

                &.parent {
                    font-weight: bold;
                }
            }
        }
    }
}

.input-filter {
    margin: 5px;
    border-radius: 0;
}
</style>