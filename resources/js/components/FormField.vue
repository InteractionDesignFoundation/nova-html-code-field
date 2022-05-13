<template>
    <DefaultField :field="field" :errors="errors" :show-help-text="showHelpText" :full-width-content="true">
        <template #field>
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
<!--                    new-->
                    <textarea
                        v-bind="extraAttributes"
                        class="w-full form-control form-input form-input-bordered py-3 h-auto"
                        :id="field.name"
                        :dusk="field.attribute"
                        :value="value"
                        @input="handleChange"
                    />
<!--                    old-->
<!--                    <textarea-->
<!--                            :id="field.name"-->
<!--                            type="text"-->
<!--                            class="w-full form-control form-input form-input-bordered"-->
<!--                            :class="errorClasses"-->
<!--                            :placeholder="field.name"-->
<!--                            v-model="value"-->
<!--                            v-bind="extraAttributes"-->
<!--                    />-->
                </div>

                <div class="w-1/2 m-3">
                    <PreviewHtml
                            class="resize-y"
                            :fieldNameToPreview="field.name"
                            :src="value"
                            :styles="field.styles"
                            :template="field.template"
                    />

                </div>
            </div>

        </template>
    </DefaultField>
</template>

<script>
    import PreviewHtml from './PreviewHtml'
    import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'

    export default {
        mixins: [HandlesValidationErrors, DependentFormField],

        components: {
            PreviewHtml
        },

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
            // handleChange(event) {
            //     this.$emit('change', event.target.value)
            // },
        },

        computed: {
            defaultAttributes() {
                return {
                    rows: this.currentField.rows,
                    class: this.errorClasses,
                    placeholder: this.field.name,
                }
            },

            extraAttributes() {
                const attrs = this.field.extraAttributes;

                return {
                    ...this.defaultAttributes,
                    ...attrs,
                }
            },
        },
    }
</script>
