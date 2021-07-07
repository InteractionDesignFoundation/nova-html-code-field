<template>
    <panel-item :field="field">
        <template slot="value">
            <div class="overflow-hidden">
                <preview-html
                        class="resize-y"
                        :fieldNameToPreview="field.name"
                        :src="field.value"
                        :styles="field.styles"
                        :template="field.template"
                />
            </div>
        </template>
    </panel-item>
</template>

<script>
    import {PreviewHtml} from './PreviewHtml'

    export default {
        components: [
            PreviewHtml,
        ],

        props: ['resource', 'resourceName', 'resourceId', 'field'],
    }
</script>
