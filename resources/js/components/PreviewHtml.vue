<template>
    <iframe
            :id="iframeId"
            :width="width"
            :height="height"
            :class="classes"
            :style="style"
            importance="low"
    />
</template>

<script>
    export default {
        name: 'html-code-preview',

        props: {
            fieldNameToPreview: {
                type: String,
                required: true,
            },
            src: {
                type: String,
                required: true,
            },
            template: {
                type: String,
                required: false,
                default: '%CODE%',
            },
            styles: {
                type: Array,
                required: false,
                default: [],
            },
        },

        data: () => ({
            width: "100%",
            height: 'auto',
            classes: null,
            style: null,
        }),

        created() {
            this.iframeId = `${this.fieldNameToPreview}__preview`;
        },

        mounted() {
            /** @type {HTMLIFrameElement} */
            this.iframe = document.getElementById(this.iframeId);
            this.iframe.onload = () => {
                this.updateIFrameContent(this.iframe, this.generateIFrameContent());
            };
        },

        methods: {
            /**
             * @param {HTMLIFrameElement} iframe
             * @param {string} htmlContent
             */
            updateIFrameContent(iframe, htmlContent) {
                iframe.contentWindow.document.body.innerHTML = htmlContent;
                iframe.height = iframe.contentWindow.document.body.scrollHeight;
            },

            generateIFrameContent() {
                const styles = this.styles.map(styleHref => `<link rel="stylesheet" href="${styleHref}">`);
                return `<body>
${styles.join("\n")}
${this.template.replace('%CODE%', this.src)}
</body>`;
            }
        },

        watch: {
            src() {
                this.updateIFrameContent(this.iframe, this.generateIFrameContent());
            },
        },
    }
</script>
