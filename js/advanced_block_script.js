wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'overlapping-text',
    label: 'Überlappender Text',
} );

const deepred = '#e52420'
const softred = '#e6414a'
const deeporange = '#ea680c'
const softorange = '#f3971b'
const deepgreen = '#4cad37'
const softgreen = '#00b48d'
const deepblue = '#00498c'
const softblue = '#00a6de'
const deeppurple = '#4c2582'
const softpurple = '#2969b2'
const pink = '#e95197'
const deepgrey = '#52575b'
const softgrey = '#e7eaed'
const colors = {softblue, softgreen, softorange, softpurple, softred, softyellow: '#ffe50c', deepblue, deepgreen, deeporange, deeppurple, deepred, deepyellow: '#ffd003', frkrcoolblue: '#2969b2', pink, deepgrey, softgrey, white: '#ffffff'}

wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'overlapping-title',
    label: 'Überlappender Titel',
} );

for (const key in colors) {
    if (colors.hasOwnProperty(key)) {
        wp.blocks.registerBlockStyle( 'core/image', {
            name: 'caption-' + key,
            label: 'Farbiger Titel (' + key + ')',
        } );
    }
}


if (tinyMCEPreInit) {
    if (tinyMCEPreInit.mceInit.acf_content.body_class.indexOf('page-template-full-width') >= 0) {
        document.body.classList.add('page-template-full-width');
    }
}
