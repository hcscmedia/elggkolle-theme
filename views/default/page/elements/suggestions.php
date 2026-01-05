<?php
/**
 * TXTR.ME Suggestions placeholder
 */
?>
<div class="txtr-suggestions">
    <p class="txtr-subtext"><?php echo elgg_echo('activity:explore'); ?></p>
    
    <?php
    // Get suggested users or content
    $suggestions = elgg_get_entities([
        'type' => 'user',
        'limit' => 5,
        'order_by' => 'e.time_created DESC',
    ]);
    
    if ($suggestions) {
        foreach ($suggestions as $user) {
            echo elgg_view('user/elements/summary', [
                'entity' => $user,
                'size' => 'small',
            ]);
        }
    }
    ?>
</div>

<style>
.txtr-suggestions {
    /* Styling for suggestions */
}

.txtr-subtext {
    color: var(--color-text-secondary);
    font-size: var(--font-size-sm);
    margin-bottom: var(--space-lg);
}
</style>
