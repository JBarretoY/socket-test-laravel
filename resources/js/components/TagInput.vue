<template>
<div class="tag-input-wrapper">
    <v-draggable v-model="tags" @end="$emit('input', tags)" class="dragger" handle=".drag-zone">
        <div v-for="(tag, key) in tags" :key="key" class="drag-item">
            <span class="drag-zone">
                <i class="fa fa-arrows-v"></i>
            </span>
            <span class="content-zone">{{ `${key + 1}) ${tag}` }}</span>
            <span class="delete-zone" @click="remove(key)">
                <i class="fa fa-close"></i>
            </span>
        </div>
    </v-draggable>

    <input type="text" v-model="input" @input="$emit('input', tags)" @keyup.enter="push" v-if="tags.length < max">
</div>
</template>

<script>
export default {
    props: {
        max: { required: false, type: Number, default: 9999 }
    },
    data: () => ({
        tags: [],
        input: '',
        drag: false
    }),
    methods: {
        push(e) {
            this.tags.push(this.input)
            this.input = ''
            this.$emit('input', this.tags)
        },
        remove(key) {
            this.tags.splice(key, 1)
            this.$emit('input', this.tags)
        }
    }
}
</script>

<style lang="scss" scoped>
.dragger {
    .drag-item {
        margin-bottom: 4px;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: center;

        .content-zone {
            flex-grow: 1;
        }

        .content-zone {
            padding: 8px 10px;
        }

        .drag-zone, .delete-zone {
            padding: 10px 15px;
            cursor: pointer;
        }

        .delete-zone {
            margin-left: 10px;
            border-left: 1px solid #ccc;
        }

        .drag-zone {
            margin-right: 10px;
            border-right: 1px solid #ccc;
        }
    }
}
</style>