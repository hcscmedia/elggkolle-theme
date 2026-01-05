<?php
/**
 * TXTR.ME Activity Stream Page
 */

use Elgg\Exceptions\Http\EntityPermissionsException;

$username = elgg_extract('username', $vars);

elgg_push_collection_breadcrumbs('object', 'activity');

if ($username) {
    $user = get_user_by_username($username);
    if (!$user instanceof ElggUser) {
        throw new EntityPermissionsException();
    }
    
    elgg_push_entity_breadcrumbs($user);
    
    $title = elgg_echo('activity:owner', [$user->getDisplayName()]);
    
    $filter_context = 'mine';
    
    $options = [
        'subject_guid' => $user->guid,
    ];
} else {
    $title = elgg_echo('activity:stream:all');
    
    $filter_context = 'all';
    
    $options = [];
}

// River filter
$river_filter = elgg_view('river/filter', [
    'filter_context' => $filter_context,
]);

// Get activity
$activity = elgg_list_river($options);
if (!$activity) {
    $activity = elgg_view('page/components/no_results', [
        'no_results' => elgg_echo('river:none'),
    ]);
}

// Build page
$content = $river_filter . $activity;

// Sidebar
$sidebar = elgg_view('page/layouts/content/sidebar');

// Layout
echo elgg_view_page($title, [
    'content' => $content,
    'sidebar' => $sidebar,
    'filter_id' => 'activity',
    'class' => 'elgg-page-activity txtr-page',
]);
