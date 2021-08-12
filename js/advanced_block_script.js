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
const softpurple = '#51509d'
const pink = '#e95197'
const deepgrey = '#52575b'
const softgrey = '#e7eaed'
const colors = {softblue, softgreen, softorange, softpurple, softred, softyellow: '#ffe50c', deepblue, deepgreen, deeporange, deeppurple, deepred, deepyellow: '#ffd003', frkrcoolblue: '#2969b2', pink, deepgrey, softgrey, white: '#ffffff'}

wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'overlapping-title',
    label: 'Überlappender Titel',
} );
wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'huge-title',
    label: 'Riesiger Titel',
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


(function(blocks, editor, element, data, blockEditor) {
	const el = element.createElement; // The wp.element.createElement() function to create elements.
	const registerBlockType = blocks.registerBlockType; // The registerBlockType() to register blocks.

	registerBlockType( 'advancedblock/event', {
		title: 'Event Block',
		icon: 'calendar-alt',
		category: 'common',
		keywords: [ 'event', 'termine', 'liste' ],
		attributes: {},
		example: {
			attributes: {},
		},
		edit: data.withSelect(function(select, ownProps) {
			const query = {
				hide_empty: true,
			}
			return {
				places: select('core').getEntityRecords('taxonomy', 'location', query)
			}
		})(function( props ) {
			if (props.places) {
				const places = props.places.filter(function(item) {
					return item.parent !== 0;
				})
				return el( 'div', { className: props.className + ' c-info-block' },
					el( 'div', { className: 'c-info-block__top' },
						el( 'h2', null, 'Events'),
						el( blockEditor.InnerBlocks, {allowedBlocks: 'core/paragraph'} )
					),
					el( 'div', { className: 'c-info-block__bottom' },
						places.map(function( item ) {
							return el( 'span', { className: 'c-info-block__link' }, item.name)
						})
					)
				)
			}
			return null;
		}),
		save: props =>  el('div', { className: props.className }, el( blockEditor.InnerBlocks.Content ))
	} );
	registerBlockType( 'advancedblock/lab', {
		title: 'Lab Block',
		icon: 'admin-site-alt3',
		category: 'common',
		keywords: [ 'lab', 'liste' ],
		attributes: {},
		example: {
			attributes: {},
		},
		edit: data.withSelect(function(select) {
			const query = {
				hide_empty: true,
                                per_page: -1
			}
			return {
				labs: select('core').getEntityRecords('postType', 'lab', query)
			}
		})(function( props ) {
			if (props.labs) {
				return el( 'div', { className: props.className + ' c-info-block' },
					el( 'div', { className: 'c-info-block__top' },
						el( 'h2', null, 'Labs'),
						el( blockEditor.InnerBlocks, {allowedBlocks: 'core/paragraph'} )
					),
					el( 'div', { className: 'c-info-block__bottom' },
						props.labs.map(function( item ) {
							return el( 'span', { className: 'c-info-block__link' }, item.name)
						})
					)
				)
			}
			return null;
		}),
		save: props =>  el('div', { className: props.className }, el( blockEditor.InnerBlocks.Content ))
	} );
})(window.wp.blocks,
    window.wp.editor,
	window.wp.element,
	window.wp.data,
	window.wp.blockEditor
);
