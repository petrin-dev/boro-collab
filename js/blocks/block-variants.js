// BUTTONS

wp.blocks.registerBlockStyle( 'core/button', {
    name: 'hover-light',
    label: 'Hover Light',
} );

wp.blocks.registerBlockStyle( 'core/button', {
    name: 'hover-dark',
    label: 'Hover Dark',
} );

wp.blocks.registerBlockStyle( 'core/button', {
    name: 'plus-button',
    label: 'Plus Button',
} );

wp.blocks.registerBlockStyle( 'core/button', {
    name: 'play-button-hd',
    label: 'Play Btn (HD)',
} );

wp.blocks.registerBlockStyle( 'core/button', {
    name: 'play-button-hl',
    label: 'Play Btn (HL)',
} );

wp.blocks.unregisterBlockVariation( 'core/button', 'outline' );

// IMAGES

wp.blocks.registerBlockStyle( 'core/image', {
    name: 'play-button-image',
    label: 'Play Button',
} );

// SEPARATORS

wp.blocks.registerBlockStyle( 'core/separator', {
    name: 'narrowed',
    label: 'Narrowed',
} );

// HEADINGS

wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'flanked-lines',
    label: 'Flanked Lines',
} );

wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'flanked-r-line',
    label: 'Flanked R Line',
} );

wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'pulse-in-h1',
    label: 'Pulse In (H1)',
} );

// QUOTES

wp.blocks.registerBlockStyle( 'core/quote', {
    name: 'fancy-quote',
    label: 'Fancy Quote',
} );

// LISTS

wp.blocks.registerBlockStyle( 'core/list', {
    name: 'two-column',
    label: 'Two Column',
} );

// PARAGRAPHS

wp.blocks.registerBlockStyle( 'core/paragraph', {
    name: 'two-column',
    label: 'Two Column',
} );

// BREADCRUMBS -- proof of concept applying these to custom blocks

wp.blocks.registerBlockStyle( 'acf/breadcrumb', {
    name: 'chevron',
    label: 'Chevron',
} );

wp.blocks.registerBlockStyle( 'acf/breadcrumb', {
    name: 'arrow',
    label: 'Arrow',
} );