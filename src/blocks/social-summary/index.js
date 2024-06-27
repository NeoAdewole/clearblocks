import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { useEntityProp } from '@wordpress/core-data';
import { useSelect } from '@wordpress/data';
import { Spinner } from '@wordpress/components';
import Rating from '@mui/material/Rating/index.js';
import icons from '../../icons.js';
import './main.scss';

registerBlockType('clearblocks/social-summary', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes, context }) {
    const { prepTime, cookTime, course } = attributes;
    const blockProps = useBlockProps();
    const { postId } = context

    const [termIDs] = useEntityProp('postType', 'social', 'channel', postId)

    const { channels, isLoading } = useSelect((select) => {
      const { getEntityRecords, isResolving } = select('core')

      const taxonomyArgs = [
        'taxonomy',
        'channel',
        { include: termIDs }
      ]

      return {
        channels: getEntityRecords(...taxonomyArgs),
        isLoading: isResolving('getEntityRecords', taxonomyArgs)
      }
    }, [termIDs]);

    const { rating } = useSelect(select => {
      const { getCurrentPostAttribute } = select('core/editor')

      return {
        rating: getCurrentPostAttribute('meta').social_rating
      }
    });

    return (
      <>
        <div {...blockProps}>
          <i className="bi bi-alarm"></i>
          <div className="social-columns-2">
            <div className="social-metadata">
              <div className="social-title">{__('Prep Time', 'clearblocks')}</div>
              <div className="social-data social-prep-time">
                <RichText
                  tagName="span"
                  value={prepTime}
                  onChange={prepTime => setAttributes({ prepTime })}
                  placeholder={__('Prep time', 'clearblocks')}
                />
              </div>
            </div>
            <div className="social-metadata">
              <div className="social-title">{__('Cook Time', 'clearblocks')}</div>
              <div className="social-data social-cook-time">
                <RichText
                  tagName="span"
                  value={cookTime}
                  onChange={cookTime => setAttributes({ cookTime })}
                  placeholder={__('Cook time', 'clearblocks')}
                />
              </div>
            </div>
          </div>
          <div className="social-columns-2-alt">
            <div className="social-columns-2">
              <div className="social-metadata">
                <div className="social-title">{__('Course', 'clearblocks')}</div>
                <div className="social-data social-course">
                  <RichText
                    tagName="span"
                    value={course}
                    onChange={course => setAttributes({ course })}
                    placeholder={__('Course', 'clearblocks')}
                  />
                </div>
              </div>
              <div className="social-metadata">
                <div className="social-title">{__('Channel', 'clearblocks')}</div>
                <div className="social-data social-channel">
                  {
                    isLoading &&
                    <Spinner />
                  }
                  {
                    !isLoading && channels && channels.map((item, index) => {
                      const comma = channels[index + 1] ? ',' : ''
                      return (
                        <>
                          <a href={item.meta.more_info_url}>
                            {item.name}
                          </a> {comma}
                        </>
                      )
                    })
                  }
                </div>
              </div>
              <i className="bi bi-egg-fried"></i>
            </div>
            <div className="social-metadata">
              <div className="social-title">{__('Rating', 'clearblocks')}</div>
              <div className="social-data">
                <Rating
                  value={rating}
                  readOnly
                />
              </div>
              <i className="bi bi-hand-thumbs-up"></i>
            </div>
          </div>
        </div>
      </>
    );
  }
});