( function () {
  var addFilter              = wp.hooks.addFilter;
  var createHigherOrderComponent = wp.compose.createHigherOrderComponent;
  var InspectorControls      = wp.blockEditor.InspectorControls;
  var PanelBody              = wp.components.PanelBody;
  var SelectControl          = wp.components.SelectControl;
  var el                     = wp.element.createElement;
  var Fragment               = wp.element.Fragment;

  var LANGUAGES = [
    { label: 'Geen (geen highlighting)',  value: '' },
    { label: 'PHP',        value: 'language-php' },
    { label: 'JavaScript', value: 'language-javascript' },
    { label: 'CSS',        value: 'language-css' },
    { label: 'HTML',       value: 'language-markup' },
    { label: 'Bash',       value: 'language-bash' },
    { label: 'JSON',       value: 'language-json' },
  ];

  var withLanguageSelector = createHigherOrderComponent( function ( BlockEdit ) {
    return function ( props ) {
      // Only add the panel to the Code block
      if ( props.name !== 'core/code' ) {
        return el( BlockEdit, props );
      }

      var className = props.attributes.className || '';

      // Find which language class is currently active
      var currentLanguage = '';
      LANGUAGES.forEach( function ( lang ) {
        if ( lang.value && className.indexOf( lang.value ) !== -1 ) {
          currentLanguage = lang.value;
        }
      } );

      function onChangeLanguage( newLanguage ) {
        // Strip any existing language-* class
        var stripped = className
          .split( ' ' )
          .filter( function ( cls ) {
            return cls.indexOf( 'language-' ) !== 0;
          } )
          .join( ' ' )
          .trim();

        // Add the new one (if not "none")
        var newClass = newLanguage
          ? ( stripped ? stripped + ' ' + newLanguage : newLanguage )
          : stripped;

        props.setAttributes( { className: newClass || undefined } );
      }

      return el(
        Fragment,
        null,
        el( BlockEdit, props ),
        el(
          InspectorControls,
          null,
          el(
            PanelBody,
            { title: 'Syntax highlighting', initialOpen: true },
            el( SelectControl, {
              label: 'Taal',
              value: currentLanguage,
              options: LANGUAGES,
              onChange: onChangeLanguage,
            } )
          )
        )
      );
    };
  }, 'withLanguageSelector' );

  addFilter(
    'editor.BlockEdit',
    'rules-by-rosita/code-language',
    withLanguageSelector
  );
} )();
