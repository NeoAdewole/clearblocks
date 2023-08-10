import { registerPlugin } from "@wordpress/plugins";
import { PluginSidebar } from "@wordpress/edit-post";
import { __ } from "@wordpress/i18n";

registerPlugin("ccb-sidebar", {
    render(){
        return (
            <PluginSidebar
                name="ccb_sidebar"
                icon="share"
                title={__("Clearblocks Sidebar", "cc-clearblocks")}
            >
                Random Text
            </PluginSidebar>
        );
    },
});

