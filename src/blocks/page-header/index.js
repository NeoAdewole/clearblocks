import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { icons } from '../../icons.js';
import './main.css';

registerBlockType('clearblocks/page-header', {
  // icon: icons.default,
  icon: 'star-filled',
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();
    const { content, showCategory } = attributes;
    return (
      <>
        <InspectorControls>
          <PanelBody title={__('General', 'clearblocks')}>
            <ToggleControl
              label={__('Show Category', 'clearblocks')}
              checked={showCategory}
              onChange={showCategory => setAttributes({ showCategory })}
              help={showCategory ? __('Displaying Category', 'clearblocks') : __('Displaying Custom Header', 'clearblocks')}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <div className="inner-page-header">
            {
              showCategory ?
                <h1>{__('Category: Some Category', 'clearblocks')}</h1> :
                <RichText
                  tagName='h1'
                  placeholder={__("Enter a custom header", "cc-clearblocks")}
                  value={content}
                  onChange={content => setAttributes({ content })}
                />
            }
          </div>
        </div>
      </>
    );
  }
})
