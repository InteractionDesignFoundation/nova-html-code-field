Nova.booting((Vue, router, store) => {
    Vue.component('preview-html', require('./components/PreviewHtml'))

    Vue.component('index-html-code-field', require('./components/IndexField'))
    Vue.component('detail-html-code-field', require('./components/DetailField'))
    Vue.component('form-html-code-field', require('./components/FormField'))

})
