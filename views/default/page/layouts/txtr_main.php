<?php
/**
 * TXTR.ME Custom Activity/Index page layout
 */

$owner = elgg_extract('entity', $vars);
$title = elgg_extract('title', $vars, '');
$content = elgg_extract('content', $vars, '');
$sidebar = elgg_extract('sidebar', $vars, '');

// TXTR.ME specific wrapper
?>
<div class="txtr-layout txtr-layout-main">
    <div class="txtr-container">
        <?php if ($sidebar): ?>
        <aside class="txtr-sidebar">
            <div class="txtr-sidebar-sticky">
                <?php echo $sidebar; ?>
            </div>
        </aside>
        <?php endif; ?>
        
        <main class="txtr-main-content">
            <?php if ($title): ?>
            <div class="txtr-page-header">
                <h1 class="txtr-page-title"><?php echo $title; ?></h1>
            </div>
            <?php endif; ?>
            
            <div class="txtr-content-area">
                <?php echo $content; ?>
            </div>
        </main>
        
        <?php if (elgg_is_logged_in()): ?>
        <aside class="txtr-widgets">
            <div class="txtr-widgets-sticky">
                <?php
                // Trending topics or suggestions
                echo elgg_view('page/elements/trending');
                ?>
            </div>
        </aside>
        <?php endif; ?>
    </div>
</div>

<style>
.txtr-layout {
    max-width: 1400px;
    margin: 0 auto;
    padding: var(--space-lg);
}

.txtr-container {
    display: grid;
    grid-template-columns: 280px 1fr 350px;
    gap: var(--space-2xl);
}

.txtr-sidebar {
    position: sticky;
    top: var(--space-lg);
    height: calc(100vh - var(--space-2xl));
    overflow-y: auto;
}

.txtr-sidebar-sticky {
    padding: var(--space-lg);
}

.txtr-main-content {
    min-width: 0;
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.txtr-page-header {
    padding: var(--space-2xl);
    border-bottom: 1px solid var(--color-border);
    background: var(--color-background-secondary);
}

.txtr-page-title {
    margin: 0;
    font-size: var(--font-size-2xl);
    font-weight: 700;
    color: var(--color-text-primary);
}

.txtr-content-area {
    /* Content styling */
}

.txtr-widgets {
    position: sticky;
    top: var(--space-lg);
    height: calc(100vh - var(--space-2xl));
    overflow-y: auto;
}

.txtr-widgets-sticky {
    padding: var(--space-lg);
}

/* Responsive */
@media (max-width: 1200px) {
    .txtr-container {
        grid-template-columns: 80px 1fr 350px;
    }
}

@media (max-width: 1024px) {
    .txtr-container {
        grid-template-columns: 80px 1fr;
    }
    
    .txtr-widgets {
        display: none;
    }
}

@media (max-width: 768px) {
    .txtr-container {
        grid-template-columns: 1fr;
    }
    
    .txtr-sidebar {
        display: none;
    }
}
</style>
