<?php
defined('TYPO3') or die();

call_user_func(function () {

    $focusAreaDefault = [
        'x' => 1 / 3,
        'y' => 1 / 3,
        'width' => 1 / 3,
        'height' => 1 / 3,
    ];

    $ratioNaN = [
        'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
        'value' => 0.0
    ];

    $typo3_major_version = \TYPO3\CMS\Core\Utility\VersionNumberUtility::getNumericTypo3Version();

    $languageFilePrefix = 'LLL:EXT:fluid_styled_content/Resources/Private/Language/Database.xlf:';
    $customLanguageFilePrefix = 'LLL:EXT:c1_fsc_slider/Resources/Private/Language/locallang_be.xlf:';
    $frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';

    // Add the CType "fsc_slider"
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:c1_fsc_slider/Resources/Private/Language/locallang_be.xlf:wizard.title',
            'fsc_slider',
            'content-image'
        ],
        'textmedia',
        'after'
    );

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['fsc_slider'] = $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['textmedia'];

    // Define what fields to display

    $GLOBALS['TCA']['tt_content']['types']['fsc_slider'] = [
        'previewRenderer' => \C1\C1FscSlider\Preview\SliderPreviewRenderer::class,
        'showitem' => '
            --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
            image_format,
            --palette--;' . $languageFilePrefix . 'tt_content.palette.mediaAdjustments;mediaAdjustments,
            pi_flexform,
            bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:bodytext_formlabel;bodytext,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;' . $customLanguageFilePrefix . 'tca.tab.sliderElements,
             assets
        ',
    ];

    $GLOBALS['TCA']['tt_content']['types']['fsc_slider']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config'] = [
        'cropVariants' => [
            'default' => [
                'title' => 'Desktop',
                'allowedAspectRatios' => [
                    '3:1' => [
                        'title' => '3:1',
                        'value' => 3 / 1
                    ],
                    '2:1' => [
                        'title' => '2:1',
                        'value' => 2 / 1
                    ],
                ],
                'focusArea' => $focusAreaDefault,
            ],
            'mobile' => [
                'title' => 'Mobile',
                'allowedAspectRatios' => [
                    '2:1' => [
                        'title' => '2:1',
                        'value' => 2 / 1
                    ],
                    '3:1' => [
                        'title' => '3:1',
                        'value' => 3 / 1
                    ],
                    'NaN' => $ratioNaN,
                ],
                'focusArea' => $focusAreaDefault,
            ],
        ],
    ];

});
