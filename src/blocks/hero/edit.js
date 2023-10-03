import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit({ attributes }) {
	const blockProps = useBlockProps();
	return (
		<>
			<div {...blockProps} className="hero">Are you a hero?</div>
		</>
	);
}
