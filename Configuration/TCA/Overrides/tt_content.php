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

    $customLanguageFilePrefix = 'LLL:EXT:c1_fsc_slider/Resources/Private/Language/locallang_be.xlf:';
    $flexForm = 'FILE:EXT:c1_fsc_slider/Configuration/FlexForms/c1_fsc_slider_flexform.xml';

    // Add the CType "fsc_slider"
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLL:EXT:c1_fsc_slider/Resources/Private/Language/locallang_be.xlf:wizard.title',
            'value' => 'fsc_slider',
            'icon' => 'content-image',
        ],
        'textmedia',
        'after'
    );

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['fsc_slider'] = $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['textmedia'];

    // Define what fields to display. Palettes without an explicit label use their own one
    // (fluid_styled_content's Database.xlf no longer exists in TYPO3 v14).

    $GLOBALS['TCA']['tt_content']['types']['fsc_slider'] = [
        'previewRenderer' => \C1\C1FscSlider\Preview\SliderPreviewRenderer::class,
        'showitem' => '
            --palette--;;general,
            image_format,
            --palette--;;mediaAdjustments,
            pi_flexform,
            bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;;frames,
            --palette--;;appearanceLinks,
            --div--;' . $customLanguageFilePrefix . 'tca.tab.sliderElements,
             assets
        ',
    ];

    // FlexForm for the slider options. TYPO3 v14 removed ds_pointerField and deprecates
    // addPiFlexFormValue(); v13 does not support a data structure via columnsOverrides yet.
    // @todo: Drop the v13 branch when dropping support for v13
    if ((new \TYPO3\CMS\Core\Information\Typo3Version())->getMajorVersion() >= 14) {
        $GLOBALS['TCA']['tt_content']['types']['fsc_slider']['columnsOverrides']['pi_flexform']['config']['ds'] = $flexForm;
    } else {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('', $flexForm, 'fsc_slider');
    }

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
