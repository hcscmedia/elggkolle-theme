<?php
/**
 * Custom river item display (activity feed)
 * X.com-style post layout
 */

$item = elgg_extract('item', $vars);
if (!$item instanceof \ElggRiverItem) {
    return;
}

$subject = $item->getSubjectEntity();
$object = $item->getObjectEntity();
$action = $item->action_type;
$type = $item->type;
$subtype = $item->subtype;

$summary = elgg_view('river/elements/summary', [
    'item' => $item,
    'vars' => $vars,
]);

$message = elgg_view('river/elements/body', [
    'item' => $item,
    'vars' => $vars,
]);

$attachments = elgg_view('river/elements/attachments', [
    'item' => $item,
    'vars' => $vars,
]);

$responses = elgg_view('river/elements/responses', [
    'item' => $item,
    'vars' => $vars,
]);
?>

<div class="elgg-river-item" id="elgg-river-item-<?php echo $item->id; ?>">
    <div class="elgg-item-image">
        <?php
        echo elgg_view_entity_icon($subject, 'medium', [
            'use_hover' => false,
            'use_link' => true,
        ]);
        ?>
    </div>
    
    <div class="elgg-item-body">
        <div class="elgg-river-summary">
            <?php echo $summary; ?>
            <span class="elgg-river-timestamp">
                <?php echo elgg_view_friendly_time($item->posted); ?>
            </span>
        </div>
        
        <?php if ($message): ?>
        <div class="elgg-river-message">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>
        
        <?php if ($attachments): ?>
        <div class="elgg-river-attachments">
            <?php echo $attachments; ?>
        </div>
        <?php endif; ?>
        
        <div class="elgg-river-actions">
            <?php
            echo elgg_view('river/elements/actions', [
                'item' => $item,
            ]);
            ?>
        </div>
        
        <?php if ($responses): ?>
        <div class="elgg-river-responses">
            <?php echo $responses; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
.elgg-river-item {
    display: flex;
    gap: var(--space-md);
    padding: var(--space-lg);
    border-bottom: 1px solid var(--color-border);
    transition: background-color var(--transition-fast);
}

.elgg-river-item:hover {
    background-color: var(--color-background-hover);
}

.elgg-river-summary {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-bottom: var(--space-sm);
    font-size: var(--font-size-sm);
    color: var(--color-text-secondary);
}

.elgg-river-timestamp {
    color: var(--color-text-tertiary);
}

.elgg-river-message {
    margin-bottom: var(--space-md);
    font-size: var(--font-size-base);
    line-height: 1.5;
    color: var(--color-text-primary);
    word-wrap: break-word;
}

.elgg-river-attachments {
    margin-bottom: var(--space-md);
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--color-border);
}

.elgg-river-attachments img {
    width: 100%;
    height: auto;
    display: block;
}

.elgg-river-actions {
    display: flex;
    gap: var(--space-3xl);
    margin-top: var(--space-md);
    color: var(--color-text-tertiary);
}

.elgg-river-actions a {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    color: var(--color-text-tertiary);
    font-size: var(--font-size-sm);
    transition: color var(--transition-fast);
}

.elgg-river-actions a:hover {
    color: var(--color-primary);
    text-decoration: none;
}

.elgg-river-responses {
    margin-top: var(--space-lg);
    padding-top: var(--space-lg);
    border-top: 1px solid var(--color-border);
}
</style>
