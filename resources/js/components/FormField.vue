<template>
    <default-field :field="field" :errors="errors" :full-width-content="true">
        <template slot="field">
            <div class="flex mb-4">
                <div class="w-1/2 m-3">
                    <label :for="field.name" class="block mb-1">Code</label>
                </div>

                <div class="w-1/2 m-3">
                    <label class="block mb-1">Preview</label>
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-1/2 m-3">
                    <textarea
                            :id="field.name"
                            type="text"
                            class="w-full form-input form-input-bordered"
                            :class="errorClasses"
                            :placeholder="field.name"
                            v-model="value"
                            v-bind="extraAttributes"
                    />
                </div>

                <div class="w-1/2 m-3">
                    <preview-html
                            class="resize-y"
                            :fieldNameToPreview="field.name"
                            :src="value"
                            :styles="field.styles"
                            :template="field.template"
                    />

                </div>
            </div>

        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'
    import {PreviewHtml} from './PreviewHtml'

    export default {
        mixins: [FormField, HandlesValidationErrors],

        components: [
            PreviewHtml,
        ],

        props: ['resourceName', 'resourceId', 'field'],

        methods: {
            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                this.value = this.field.value || ''
            },

            /**
             * Fill the given FormData object with the field's internal value.
             */
            fill(formData) {
                formData.append(this.field.attribute, this.value)
            },

            /**
             * Update the field's internal value.
             */
            handleChange(value) {
                this.value = value
            },
        },

        computed: {
            defaultAttributes() {
                return {
                    rows: 10,
                    class: this.errorClasses,
                    placeholder: this.field.name,
                }
            },

            extraAttributes() {
                const attrs = this.field.extraAttributes || [];

                return {
                    ...this.defaultAttributes,
                    ...attrs,
                }
            },

        },
    }
</script>
