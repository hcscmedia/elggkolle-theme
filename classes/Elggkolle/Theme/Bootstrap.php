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
        // Extend CSS views
        $this->elgg()->views->extendView('elgg.css', 'elggkolle_theme/elgg.css');
        $this->elgg()->views->extendView('admin.css', 'elggkolle_theme/admin.css');
        
        // Extend JavaScript views
        $this->elgg()->views->extendView('elgg.js', 'elggkolle_theme/elgg.js');
    }
}
