<template>
	<table class="fre-table">
		<thead>
			<tr class="fre-table-head">
				<th class="fre-table-col" v-for="(column, key) in columns" :key="key">{{ column.title }}</th>
			</tr>
		</thead>
		<tbody>
            <template v-if="source.length > 0">
                <tr v-for="(src, key) in source" :key="key">

                    <td v-for="(column, keyC) in columns" :key="keyC" class="text-center" style="padding: 10px 40px;">
                        <slot :name="`td:${column.slot}`" :it="src, key">
                            {{ render(src, column) }}
                        </slot>
                    </td>
                </tr>
            </template>
            <template v-else>
                <tr>
                    <td :colspan="columns.length" style="padding: 10px 40px;">
                        <span style="display: flex; justify-content: center;">
                            <slot name="empty">No data</slot>
                        </span>
                    </td>
                </tr>
            </template>
		</tbody>
	</table>
</template>

<script>
	export default {
		props: {
			source: { required: false, type: Array, default: () => [] },
			columns: { required: false, type: Array, default: () => [] },
        },
        methods: {
            render(src, column) {
                let keys = column.key.split('.');
                let data = '';
                keys.forEach(e => data = src[e]);
                return data
            }
        }
	}
</script>