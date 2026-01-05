<?php
/**
 * TXTR.ME Theme Bootstrap Class
 */

namespace Elggkolle\Theme;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {
    
    /**
     * {@inheritdoc}
     */
    public function init() {
        // Register CSS
        elgg()->views->extendView('elgg.css', 'elggkolle_theme/elgg.css');
        elgg()->views->extendView('admin.css', 'elggkolle_theme/admin.css');
        
        // Register JavaScript
        elgg()->views->extendView('elgg.js', 'elggkolle_theme/elgg.js');
        
        // Register custom view locations
        elgg()->hooks->registerHandler('view_vars', 'page/elements/head', [$this, 'modifyHeadVars']);
        
        // Add dark mode support
        elgg()->hooks->registerHandler('head', 'page', [$this, 'setupDarkMode']);
    }
    
    /**
     * Modify head variables
     *
     * @param \Elgg\Event $event The event object
     * @return array
     */
    public function modifyHeadVars(\Elgg\Event $event) {
        $value = $event->getValue();
        $value['viewport'] = 'width=device-width, initial-scale=1.0, viewport-fit=cover';
        return $value;
    }
    
    /**
     * Setup dark mode
     *
     * @param \Elgg\Event $event The event object
     * @return void
     */
    public function setupDarkMode(\Elgg\Event $event) {
        // Dark mode JavaScript is already included via elgg.js extension
        return;
    }
}
