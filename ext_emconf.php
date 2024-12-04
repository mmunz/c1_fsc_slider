<?php

$EM_CONF[$_EXTKEY] = [
    'title'              => 'C1 Fluid Styled Slider',
    'description'        => 'A slider Content Element based on fluid_styled_content.',
    'category'           => 'plugin',
    'version'            => '3.0.0',
    'state'              => 'stable',
    'author'             => 'Manuel Munz',
    'author_email'       => 't3dev@comuno.net',
    'author_company'     => 'comuno.net',
    'constraints'        => [
        'depends'   => [
            'typo3' => '13.4.0-13.5.99',
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
