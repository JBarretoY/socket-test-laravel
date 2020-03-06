<template>
    <div class="dropzone-wrapper" @dragover.prevent @drop.prevent="processFiles($event.dataTransfer.files)">
        <label :for="_uid" style="width: 100%; display: flex; height: 100%; justify-content: center; align-items: center; flex-direction: column;">
            <i class="fa fa-upload" style="font-size: 28px;"></i>
            <template v-if="!files.length">
                <slot>No data</slot>
            </template>
            <template v-else>
                <div style="width: 100%; display: flex; margin-top: 5px; justify-content: center; align-items: center;">
                    <div class="rounded-card" v-for="(file, key) in files" :key="key">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click.stop="remove(key)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <span>{{ file.size | humanReadable }}</span>
                    </div>
                </div>
            </template>
            <input type="file" :id="_uid" v-show="false" :multiple="multiple" @change="processFiles($event.target.files)" :accept="accept">
        </label>
    </div>
</template>

<script>
export default {
    props: {
        multiple: { required: false, type: Boolean, default: false },
        accept: { required: false, type: String, default: null },
        max: { required: false, type: [String, Number], default: 9999 }
    },
    data: () => ({
        files: []
    }),
    methods: {
        processFiles(files) {
            for (let file of files) {
                if (this.files.length < parseInt(this.max)) {
                    this.files.push(file)
                }
            }
            this.$emit('input', this.files)
        },
        remove(key) {
            this.files.splice(key, 1)
            this.$emit('input', this.files)
        }
    },
    filters: {
        humanReadable(size) {
            var i = Math.floor(Math.log(size) / Math.log(1024));
            return (size / Math.pow(1024, i)).toFixed(2) * 1 + ''+['B', 'kB', 'MB', 'GB', 'TB'][i];
        }
    }
}
</script>

<style lang="scss" scoped>
.dropzone-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: #eee;
    border: 2px dashed cornflowerblue;
    border-radius: 8px;
    cursor: pointer;
}

.rounded-card {
    border: 1px solid slategrey;
    border-radius: 8px;
    min-width: 80px;
    min-height: 80px;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    flex-wrap: wrap;
    margin-right: 2px;
    position: relative;

    .close {
        position: absolute;
        top: 2px;
        right: 5px;
    }
}
</style>