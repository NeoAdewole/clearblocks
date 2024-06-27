import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js'
import './main.css'

registerBlockType('clearblocks/auth-modal', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { showRegister } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__('General', 'clearblocks')}>
            <ToggleControl
              label={__('Show Register?', 'clearblocks')}
              help={
                showRegister ?
                  __('Showing registeration form', 'clearblocks') :
                  __('Hiding registeration form', 'clearblocks')
              }
              checked={showRegister}
              onChange={showRegister => setAttributes({ showRegister })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          {__('This block is not previewable from the editor. View your site for a live demo.', 'clearblocks')}
        </div>
      </>
    );
  }
});