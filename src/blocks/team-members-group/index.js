import { registerBlockType } from '@wordpress/blocks';
import {
  useBlockProps, InspectorControls, InnerBlocks
} from '@wordpress/block-editor';
import {
  PanelBody, RangeControl, SelectControl
} from '@wordpress/components'
import { __ } from '@wordpress/i18n';
import icons from '../../icons.js';
import './main.css';

registerBlockType('clearblocks/team-members-group', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { columns, imageShape } = attributes;
    const blockProps = useBlockProps({
      className: `cols-${columns}`
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title={__('Settings', 'clearblocks')}>
            <RangeControl
              label={__('Columns', 'clearblocks')}
              onChange={columns => setAttributes({ columns })}
              value={columns}
              min={2}
              max={4}
            />
            <SelectControl
              label={__('Image Shape', 'clearblocks')}
              value={imageShape}
              options={[
                { label: __('Hexagon', 'clearblocks'), value: 'hexagon' },
                { label: __('Rabbet', 'clearblocks'), value: 'rabbet' },
                { label: __('Pentagon', 'clearblocks'), value: 'pentagon' },
              ]}
              onChange={imageShape => setAttributes({ imageShape })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <InnerBlocks
            orientation="horizontal"
            allowedBlocks={[
              'clearblocks/team-member'
            ]}
            template={[
              [
                'clearblocks/team-member',
                {
                  name: 'John Doe',
                  title: 'CEO of ClearBlocks',
                  bio: 'This is an example of a bio.'
                }
              ],
              ['clearblocks/team-member'],
              ['clearblocks/team-member']
            ]}
          // templateLock="insert"
          />
        </div>
      </>
    );
  },
  save({ attributes }) {
    const { columns } = attributes
    const blockProps = useBlockProps.save({
      className: `cols-${columns}`
    });

    return (
      <div {...blockProps}>
        <InnerBlocks.Content />
      </div>
    )
  }
});