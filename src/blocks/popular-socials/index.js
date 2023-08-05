import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, InspectorControls, RichText
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { PanelBody, QueryControls } from '@wordpress/components';
import {useSelect} from "@wordpress/data";
import { RawHTML } from '@wordpress/element';
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

    const channelIDs = channels.map((term) => term.id);
    const posts = useSelect(
      (select) => {
        return select("core").getEntityRecords('postType', 'social', {
          per_page: count,
          _embed: true,
          channel: channelIDs,
          order: "desc",
          orderByRating: 1,
        });
      },
      [count, channelIDs]
    );

    console.log(posts);

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
          {
            posts?.map(post => {
              const featuredImage = 
                post._embedded &&
                post._embedded['wp:featuredmedia'] &&
                post._embedded['wp:featuredmedia'].length >0 &&
                post._embedded['wp_featuredmedia'][0];

              return (
              <div class="single-post">
                {
                  featuredImage && (
                    <a class="single-post-image" href={post.link}>
                      <img src={featuredImage.media_details.sizes.thumbnail.source_ur} alt={featuredImage.alt_text} />
                    </a>
                  )}
                <div class="single-post-detail">
                  <a href={post.link}><RawHTML>{post.title.rendered}</RawHTML></a>
                  <span>
                    by <a href={post.link}>{post._embedded.author[0].name}</a>
                  </span>
                </div>
              </div>
              );
            })
          }
          
        </div>
      </>
    );
  }
});