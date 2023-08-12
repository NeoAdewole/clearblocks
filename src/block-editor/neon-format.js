import './neon.css';
import { registerFormatType, toggleFormat } from "@wordpress/rich-text";
import { RichTextToolbarButton } from "@wordpress/block-editor"
import { __ } from "@wordpress/i18n";

registerFormatType("clearblocks/neon", {
    title: __("Neon", "cc-clearblocks"),
    tagName: "span",
    edit({ isActive, onChange, value }) {
        return (
            <RichTextToolbarButton
                title={__("Neon", "cc-clearblocks")}
                icon="superhero"
                isActive={isActive}
                onClick ={ () => {
                    onChange(toggleFormat(value, {
                            type: "clearblocks/neon",
                        })
                    );
                }}
            />
        );
    },
    className: 'neon',
});