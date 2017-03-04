<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {

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

    if (intval($typo3_major_version[0]) < 8) {

        $GLOBALS['TCA']['tt_content']['types']['fsc_slider'] = [
            'showitem' => '
                --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
                image_format,
                --palette--;' . $languageFilePrefix . 'tt_content.palette.mediaAdjustments;mediaAdjustments,
                pi_flexform,
                --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
                    layout;LLL:EXT:cms/locallang_ttc.xlf:layout_formlabel,
            --div--;' . $customLanguageFilePrefix . 'tca.tab.sliderElements,
                 assets
        ',
            'columnsOverrides' => [
                'media' => [
                    'label' => $languageFilePrefix . 'tt_content.media_references',
                    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('media', [
                        'appearance' => [
                            'createNewRelationLinkTitle' => $languageFilePrefix . 'tt_content.media_references.addFileReference'
                        ],
                        // custom configuration for displaying fields in the overlay/reference table
                        // behaves the same as the image field.
                        'foreign_types' => $GLOBALS['TCA']['tt_content']['columns']['image']['config']['foreign_types']
                    ], $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'])
                ]
            ]
        ];

    } else {
        $GLOBALS['TCA']['tt_content']['types']['fsc_slider'] = [
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
            'columnsOverrides' => [
                'media' => [
                    'label' => $languageFilePrefix . 'tt_content.media_references',
                    'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('media', [
                        'appearance' => [
                            'createNewRelationLinkTitle' => $languageFilePrefix . 'tt_content.media_references.addFileReference'
                        ],
                        // custom configuration for displaying fields in the overlay/reference table
                        // behaves the same as the image field.
                        'foreign_types' => $GLOBALS['TCA']['tt_content']['columns']['image']['config']['foreign_types']
                    ], $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'])
                ]
            ]
        ];
    }
});




