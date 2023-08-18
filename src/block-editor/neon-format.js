import './neon.css';
import { registerFormatType, toggleFormat } from "@wordpress/rich-text";
import { RichTextToolbarButton } from "@wordpress/block-editor"
import { __ } from "@wordpress/i18n";
import { useSelect } from "@wordpress/data";

registerFormatType("clearblocks/neon", {
  title: __("Neon", "cc-clearblocks"),
  tagName: "span",
  className: 'neon',
  edit({ isActive, onChange, value }) {
    const selectedBlock = useSelect(select => select('core/block-editor').getSelectedBlock());
    return (
      <>
        {console.log(selectedBlock)}
        {selectedBlock?.name === "core/paragraph" &&
          <RichTextToolbarButton
            title={__("Neon", "cc-clearblocks")}
            icon="superhero"
            isActive={isActive}
            onClick={() => {
              onChange(toggleFormat(value, {
                type: "clearblocks/neon",
              })
              );
            }}
          />
        }
      </>
    );
  },

});