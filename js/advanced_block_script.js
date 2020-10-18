wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'overlapping-text',
    label: 'Überlappender Text',
} );

wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'overlapping-title',
    label: 'Überlappender Titel',
} );


if (tinyMCEPreInit) {
    if (tinyMCEPreInit.mceInit.acf_content.body_class.indexOf('page-template-full-width') >= 0) {
        document.body.classList.add('page-template-full-width');
    }
}
