import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, InspectorControls, RichText
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { PanelBody, QueryControls } from '@wordpress/components';
import {useSelect} from "@wordpress/data";
import icons from '../../icons.js';
import './main.css';

registerBlockType('clearblocks/popular-socials', {
  icon: {
    src: icons.primary
  },
	edit({ attributes, setAttributes }) {
    const { title, count, channels } = attributes
    const blockProps = useBlockProps()

    const terms = useSelect((select)=> {
      return select("core").getEntityRecords("taxonomy", "channel", {
        per_page: -1
      });
    });
    const suggestions = {};
    
    // optional chaining uses the '?' operator to check that the value exists before looping
    terms?.forEach((term) =>{
      suggestions[term.name] = term;
    });

    return (
      <>
        <InspectorControls>
          <PanelBody title={__('Settings', 'cc-clearblocks')}>
            <QueryControls 
              numberOfItems={count}
              minItems={1}
              maxItems={10}
              onNumberOfItemsChange={count => {
                setAttributes({count})
              }}
              categorySuggestions={suggestions}
              onCategoryChange={(newTerms) => {
                const newChannels = []

                newTerms.forEach(channel => {
                  if(typeof channel === 'object') {
                    return newChannels.push(channel);
                  }
                  const channelTerm = terms?.find(
                    (term) => term.name === channel
                  );

                  if(channelTerm) newChannels.push(channelTerm);
                });

                setAttributes({ channels: newChannels});
              }}
              selectedCategories={channels}
            />            
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <RichText
            tagName="h6"
            value={ title }
            withoutInteractiveFormatting
            onChange={ title => setAttributes({ title }) }
            placeholder={ __('Title', 'cc-clearblocks') }
          />
          <div class="single-post">
            <a class="single-post-image" href="#">
              <img src="" alt="" />
            </a>
            <div class="single-post-detail">
              <a href="#">Example Title</a>
              <span>
                by <a href="#">John Doe</a>
              </span>
            </div>
          </div>
        </div>
      </>
    );
  }
});