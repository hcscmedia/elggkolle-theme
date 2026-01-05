<?php
/**
 * Custom sidebar navigation with X.com-style menu
 */

$user = elgg_get_logged_in_user_entity();
?>

<nav class="elgg-sidebar-nav">
    <?php
    $menu_items = [
        [
            'name' => 'home',
            'text' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 12h3v9h6v-6h2v6h6v-9h3L12 2z"/></svg><span>Startseite</span>',
            'href' => 'https://txtr.me/',
            'priority' => 100,
        ],
        [
            'name' => 'activity',
            'text' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/><circle cx="12" cy="12" r="3"/></svg><span>Aktivität</span>',
            'href' => 'https://txtr.me/activity',
            'priority' => 200,
        ],
        [
            'name' => 'messages',
            'text' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg><span>Nachrichten</span>',
            'href' => 'https://txtr.me/messages',
            'priority' => 300,
        ],
        [
            'name' => 'groups',
            'text' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg><span>Gruppen</span>',
            'href' => 'https://txtr.me/groups/all',
            'priority' => 400,
        ],
    ];
    
    if ($user) {
        $menu_items[] = [
            'name' => 'profile',
            'text' => '<svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg><span>Profil</span>',
            'href' => $user->getURL(),
            'priority' => 500,
        ];
    }
    
    echo '<ul class="elgg-menu elgg-menu-site">';
    foreach ($menu_items as $item) {
        $active = (strpos(current_page_url(), $item['href']) !== false) ? 'elgg-state-selected' : '';
        echo '<li class="elgg-menu-item ' . $active . '">';
        echo '<a href="' . $item['href'] . '">' . $item['text'] . '</a>';
        echo '</li>';
    }
    echo '</ul>';
    
    // Post button (Messaging-style)
    if ($user) {
        echo '<div style="margin-top: var(--space-xl);">';
        echo elgg_view('output/url', [
            'text' => 'Neue Nachricht',
            'href' => 'https://txtr.me/thewire/add',
            'class' => 'elgg-button elgg-button-action',
            'style' => 'width: 100%; padding: var(--space-lg); font-size: var(--font-size-lg); font-weight: 700;',
        ]);
        echo '</div>';
    }
    ?>
</nav>

<style>
.elgg-sidebar-nav {
    position: sticky;
    top: var(--space-lg);
}

.elgg-menu-site {
    display: flex;
    flex-direction: column;
    gap: var(--space-xs);
}

.elgg-menu-site a {
    display: flex;
    align-items: center;
    gap: var(--space-lg);
    padding: var(--space-md) var(--space-lg);
    border-radius: var(--radius-full);
    color: var(--color-text-primary);
    font-size: var(--font-size-lg);
    font-weight: 500;
    transition: background-color var(--transition-fast);
}

.elgg-menu-site a:hover {
    background-color: var(--color-background-hover);
    text-decoration: none;
}

.elgg-menu-site .elgg-state-selected a {
    font-weight: 700;
}

.elgg-menu-site svg {
    width: 26px;
    height: 26px;
    flex-shrink: 0;
}

@media (max-width: 1024px) {
    .elgg-menu-site a span {
        display: none;
    }
    
    .elgg-menu-site a {
        justify-content: center;
        padding: var(--space-md);
    }
}
</style>
