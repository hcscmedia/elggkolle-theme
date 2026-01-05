<?php
/**
 * TXTR.ME Theme - Modern messaging theme for Elgg 6.3.2
 */

return [
    'id' => 'elggkolle_theme',
    'name' => 'TXTR.ME Theme',
    'description' => 'Modern messaging theme for TXTR.ME - YOUR MESSAGE IS THE WORLD',
    'version' => '1.2.0',
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
            'version' => '1.2.0',
        ],
    ],
    'screenshots' => [],
    'license' => 'MIT',
];
