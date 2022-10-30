<?php
defined('TYPO3') or die();

// Include new content elements to modWizards
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:c1_fsc_slider/Configuration/PageTSconfig/C1FscSlider.ts">'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('c1_fsc_slider', 'Configuration/TypoScript', 'Fluid Styled Slider');

// Add a flexform to the fsc_slider CType
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '',
    'FILE:EXT:c1_fsc_slider/Configuration/FlexForms/c1_fsc_slider_flexform.xml',
    'fsc_slider'
);
