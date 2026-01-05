<?php
/**
 * Custom page shell with X.com-inspired layout
 */

$site_name = elgg_get_site_entity()->name;
$title = elgg_extract('title', $vars, '');
$body = elgg_extract('body', $vars, '');
$sidebar = elgg_extract('sidebar', $vars, '');
?>
<!DOCTYPE html>
<html lang="<?php echo elgg_get_current_language(); ?>" data-theme="light">
<head>
    <?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body class="elgg-page-default">
    <div class="elgg-page">
        <?php echo elgg_view('page/elements/topbar', $vars); ?>
        
        <?php if ($sidebar): ?>
        <aside class="elgg-page-sidebar">
            <?php echo $sidebar; ?>
        </aside>
        <?php endif; ?>
        
        <div class="elgg-page-body">
            <main class="elgg-main">
                <?php
                if ($title) {
                    echo elgg_view_title($title);
                }
                
                echo elgg_view('page/elements/messages', ['object' => $vars]);
                echo $body;
                ?>
            </main>
        </div>
    </div>
    
    <?php echo elgg_view('page/elements/foot'); ?>
</body>
</html>
