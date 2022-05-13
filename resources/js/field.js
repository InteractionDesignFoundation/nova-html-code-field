/* global Nova */
import PreviewHtml from './components/PreviewHtml';
import IndexField from './components/IndexField';
import DetailField from './components/DetailField';
import FormField from './components/FormField';

Nova.booting((app, store) => {
    app.component('html-code-preview', PreviewHtml);

    app.component('index-nova-html-code-field', IndexField);
    app.component('detail-nova-html-code-field', DetailField);
    app.component('form-nova-html-code-field', FormField);
})
