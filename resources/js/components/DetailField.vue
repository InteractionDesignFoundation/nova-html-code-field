<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <div class="overflow-hidden">
                <PreviewHtml
                        class="resize-y"
                        :fieldNameToPreview="field.name"
                        :src="field.value"
                        :styles="field.styles"
                        :template="field.template"
                />
            </div>
        </template>
    </PanelItem>
</template>

<script>
    import PreviewHtml from './PreviewHtml'

    export default {
        components: {
            PreviewHtml
        },

        props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
    }
</script>
