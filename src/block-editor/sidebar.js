import { registerPlugin } from "@wordpress/plugins";
import { PluginSidebar } from "@wordpress/edit-post";
import { __ } from "@wordpress/i18n";
import { useSelect, useDispatch } from "@wordpress/data";
import { PanelBody, TextControl, TextareaControl, ToggleControl, Button } from "@wordpress/components";
import { MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";

registerPlugin("ccb-sidebar", {
  render() {
    const postType = useSelect((select) => {
      return select("core/editor").getCurrentPostType();
    });
    const is_page_or_post = ((postType === "post") || (postType === "page"));
    if (!is_page_or_post) {
      return null;
    }

    const { editPost } = useDispatch("core/editor");
    const { og_title, og_image, og_description, og_override_image } = useSelect((select) => {
      return select('core/editor').getEditedPostAttribute('meta');
    });

    return (
      <PluginSidebar
        name="ccb_sidebar"
        icon="share"
        title={__("Clearblocks Sidebar", "cc-clearblocks")}
      >
        <PanelBody title={__("Opengraph Options", "cc-clearblocks")}>
          <TextControl
            label={__("Title", "cc-clearblocks")}
            value={og_title}
            onChange={og_title =>
              editPost({
                meta: {
                  og_title,
                },
              })
            }
          />
          <TextareaControl
            label={__("Description", "cc-clearblocks")}
            value={og_description}
            onChange={og_description =>
              editPost({
                meta: {
                  og_description,
                },
              })
            }
          />
          <ToggleControl
            label={__("Override Featured Image", "cc-clearblocks")}
            checked={og_override_image}
            help={__(
              "By default, the featured image will be used as the image. Check this option to use a different image.",
              "cc-clearblocks"
            )}
            onChange={og_override_image =>
              editPost({
                meta: {
                  og_override_image,
                },
              })
            }
          />
          {og_override_image &&
            <>
              <img src={og_image} />
              <MediaUploadCheck>
                <MediaUpload
                  accept={["image"]}
                  render={({ open }) => {
                    return (
                      <Button variant="primary" onClick={open}>
                        {__("Change Image", "cc-clearblocks")}
                      </Button>
                    )
                  }}
                  onSelect={(image) => {
                    editPost({
                      meta: {
                        og_image: (image.sizes.openGraph ? image.sizes.openGraph.url : image.url),
                      },
                    });
                  }}
                />
              </MediaUploadCheck>
            </>
          }
        </PanelBody>
      </PluginSidebar>
    );
  },
});

