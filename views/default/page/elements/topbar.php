<?php
/**
 * Custom topbar with X.com-style navigation
 */

$user = elgg_get_logged_in_user_entity();
?>

<div class="elgg-page-topbar">
    <div class="elgg-page-topbar-inner">
        <div class="elgg-topbar-left">
            <?php
            echo elgg_view('page/elements/logo');
            ?>
        </div>
        
        <div class="elgg-topbar-center">
            <?php
            // Search bar
            echo elgg_view_form('search', [
                'action' => elgg_get_site_url() . 'search',
                'method' => 'get',
                'disable_security' => true,
                'class' => 'elgg-search-form',
            ]);
            ?>
        </div>
        
        <div class="elgg-topbar-right">
            <?php
            // Dark mode toggle
            echo '<button class="theme-toggle" aria-label="Toggle dark mode"></button>';
            
            // User menu
            if ($user) {
                echo elgg_view_menu('topbar', [
                    'sort_by' => 'priority',
                    'class' => 'elgg-menu-topbar',
                ]);
                
                echo elgg_view_entity($user, [
                    'size' => 'small',
                    'class' => 'elgg-avatar-topbar',
                ]);
            } else {
                echo elgg_view('output/url', [
                    'text' => elgg_echo('login'),
                    'href' => 'https://txtr.me/login',
                    'class' => 'elgg-button elgg-button-action',
                ]);
            }
            ?>
        </div>
    </div>
</div>

<style>
.elgg-topbar-left,
.elgg-topbar-center,
.elgg-topbar-right {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
}

.elgg-topbar-center {
    flex: 1;
    max-width: 600px;
}

.elgg-search-form {
    width: 100%;
}

.elgg-search-form input[type="search"] {
    width: 100%;
    padding: var(--space-sm) var(--space-lg);
    background-color: var(--color-background-secondary);
    border: 1px solid transparent;
    border-radius: var(--radius-full);
    font-size: var(--font-size-base);
}

.elgg-search-form input[type="search"]:focus {
    background-color: var(--color-background);
    border-color: var(--color-primary);
}

.elgg-avatar-topbar {
    cursor: pointer;
    transition: opacity var(--transition-fast);
}

.elgg-avatar-topbar:hover {
    opacity: 0.8;
}
</style>
