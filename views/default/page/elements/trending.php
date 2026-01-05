<?php
/**
 * TXTR.ME Trending/Suggestions Widget
 */

// This can be customized based on your needs
?>
<div class="txtr-widget">
    <div class="txtr-widget-header">
        <h3><?php echo elgg_echo('widgets:trending'); ?></h3>
    </div>
    <div class="txtr-widget-body">
        <?php
        // Display trending topics, suggestions, etc.
        echo elgg_view('page/elements/suggestions');
        ?>
    </div>
</div>

<style>
.txtr-widget {
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    margin-bottom: var(--space-xl);
    overflow: hidden;
}

.txtr-widget-header {
    padding: var(--space-lg);
    border-bottom: 1px solid var(--color-border);
    background: var(--color-background-secondary);
}

.txtr-widget-header h3 {
    margin: 0;
    font-size: var(--font-size-lg);
    font-weight: 700;
}

.txtr-widget-body {
    padding: var(--space-lg);
}
</style>
