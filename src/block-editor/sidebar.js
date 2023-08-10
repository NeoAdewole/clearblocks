import { registerPlugin } from "@wordpress/plugins";
import { PluginSidebar } from "@wordpress/edit-post";
import { __ } from "@wordpress/i18n";
import { useSelect } from "@wordpress/data";
import { PanelBody, TextControl, TextareaControl, ToggleControl } from "@wordpress/components";

registerPlugin("ccb-sidebar", {
  render(){
    const { og_title, og_image, og_description, og_override_image } = useSelect((select)=> {
      return select('core/editor').getEditedPostAttribute('meta');
    });

    return (
      <PluginSidebar
        name="ccb_sidebar"
        icon="share"
        title={__("Clearblocks Sidebar", "cc-clearblocks")}
      >
        <PanelBody title={__("Opengraph Options", "udemy-plus")}>
          <TextControl 
            label={__("Title", "udemy-plus")}
            value={og_title}
            onChange={og_title => {

            }}
          />
          <TextareaControl 
            label={__("Description", "udemy-plus")}
            value={og_description}
            onChange={og_description => {

            }}
          />
          <ToggleControl 
            label={__("Override Featured Image", "udemy-plus")}
            checked={og_override_image}
            help={__(
            "By default, the featured image will be used as the image. Check this option to use a different image.",
            "udemy-plus"
            )}
            onChange={og_override_image => {

            }}
          />
        </PanelBody>
      </PluginSidebar>
    );
  },
});

