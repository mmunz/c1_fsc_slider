<?php

$EM_CONF[$_EXTKEY] = [
    'title'              => 'C1 Fluid Styled Slider',
    'description'        => 'A slider Content Element based on fluid_styled_content.',
    'category'           => 'plugin',
    'shy'                => false,
    'version'            => '1.3.0',
    'dependencies'       => '',
    'conflicts'          => '',
    'priority'           => '',
    'loadOrder'          => '',
    'module'             => '',
    'state'              => 'stable',
    'uploadfolder'       => 0,
    'createDirs'         => '',
    'modify_tables'      => '',
    'clearcacheonload'   => true,
    'lockType'           => '',
    'author'             => 'Manuel Munz',
    'author_email'       => 't3dev@comuno.net',
    'author_company'     => 'comuno.net',
    'CGLcompliance'      => null,
    'CGLcompliance_note' => null,
    'constraints'        => [
        'depends'   => [
            'typo3' => '7.6.0-8.99.99',
            'c1_fluid_styled_responsive_images' => '',
        ],
        'conflicts' => [],
        'suggests'  => []
    ],
    'autoload' => [
        'psr-4' => [
            'C1\\C1FscSlider\\' => 'Classes',
        ]
    ]
];
