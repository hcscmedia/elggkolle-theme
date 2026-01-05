<?php
/**
 * Elgg Kolle Theme - Modern X.com-style theme for Elgg 6.3.2
 */

return [
    'id' => 'elggkolle_theme',
    'name' => 'Elgg Kolle Theme',
    'description' => 'Modern app-like theme inspired by X.com (Twitter) for Elgg 6.3.2',
    'version' => '1.0.0',
    'author' => 'HCS Media',
    'website' => '',
    'category' => 'theme',
    'requires' => [
        [
            'type' => 'elgg_release',
            'version' => '6.3.2',
            'comparison' => 'ge',
        ],
    ],
    'suggests' => [],
    'conflicts' => [],
    'provides' => [
        [
            'type' => 'plugin',
            'name' => 'elggkolle_theme',
            'version' => '1.0.0',
        ],
    ],
    'screenshots' => [],
    'license' => 'MIT',
];
