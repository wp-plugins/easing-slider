<!-- Backbone template -->
<div class="editslideview media-modal wp-core-ui">
    <a class="media-modal-close" href="#" title="Close"><span class="media-modal-icon"></span></a>
    <div class="media-modal-content">
        <div class="media-frame wp-core-ui">
            <div class="media-frame-title">
                <h1><?php _e( 'Edit a Slide: #<%= id %>', 'easingsliderlite' ); ?></h1>
            </div>

            <div class="media-frame-router" style="height: 0;"></div>

            <div class="media-frame-content" style="top: 45px;">
                <div class="media-main media-embed">
                    <div id="general" class="media-tab">
                        <div class="embed-link-settings" style="top: 0;">
                            <div class="thumbnail">
                                <% var size = sizes.large || sizes.medium || sizes.thumbnail || url; %>
                                <img src="<%= size.url %>" class="slide-thumbnail" alt="<%= alt %>" />
                                <a href="#" id="change-image" class="button button-primary button-large change-image" data-editor="content" title="Change Image"><span class="wp-media-buttons-icon"></span> Change Image</a>
                            </div>

                            <label for="link" class="setting">
                                <span><?php _e( 'Link URL', 'easingsliderlite' ); ?></span>
                                <input type="text" id="link" value="<%= link %>">
                                <select id="linkTarget" style="margin-top: 5px;">
                                    <option value="_self" <% ( '_self' == linkTarget ) ? print('selected="selected"'): ''; %>><?php _e( 'Open link same tab/window', 'easingsliderlite' ); ?></option>
                                    <option value="_blank" <% ( '_blank' == linkTarget ) ? print('selected="selected"'): ''; %>><?php _e( 'Open link in new tab/window', 'easingsliderlite' ); ?></option>
                                </select>
                                <p class="description"><?php _e( 'Enter a URL to link this slide to another page.', 'easingsliderlite' ); ?></p>
                            </label>

                            <label for="title" class="setting">
                                <span><?php _e( 'Title', 'easingsliderlite' ); ?></span>
                                <input type="text" id="title" value="<%= title %>">
                                <p class="description"><?php _e( 'Enter a value for the image "title" attribute.', 'easingsliderlite' ); ?></p>
                            </label>

                            <label for="alt" class="setting">
                                <span><?php _e( 'Alt Text', 'easingsliderlite' ); ?></span>
                                <input type="text" id="alt" value="<%= alt %>">
                                <p class="description"><?php _e( 'Enter a value for the image "alt" text attribute.', 'easingsliderlite' ); ?></p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="media-frame-toolbar">
                <div class="media-toolbar">
                    <div class="media-toolbar-primary">
                        <a href="#" class="button media-button button-primary button-large media-button-select media-modal-save"><?php _e( 'Apply Changes', 'easingsliderlite' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="media-modal-backdrop"></div>