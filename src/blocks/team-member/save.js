import { 
  useBlockProps, RichText
} from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export default function({ attributes }) {
  const { 
    name, title, bio, imgURL, imgID, imgAlt, socialHandles, imageShape
  } = attributes;
  const blockProps = useBlockProps.save();

  const imageClass = `wp-image-${imgID} img-${imageShape}`;

  return (
    <div {...blockProps}>
      <div className="author-meta">
        { imgURL && <img src={imgURL} alt={imgAlt} className={imageClass}/> }
        <p>
          <RichText.Content tagName="strong" value={name} />
          <RichText.Content tagName="span" value={title} />
        </p>
      </div>
      <div className="member-bio">
        <RichText.Content tagName="p" value={bio} />
      </div>
      <div className="social-links">
        {socialHandles.map((handle, index) => {
          return (
            <a href={handle.url} data-icon={handle.icon}>
              <i className={`bi bi-${handle.icon}`}></i>
            </a>
          )
        })}
      </div>
    </div>
  )
}