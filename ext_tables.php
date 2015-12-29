<?php
defined('TYPO3_MODE') or die();

// Include new content elements to modWizards
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:c1_fsc_slider/Configuration/PageTSconfig/C1FscSlider.ts">'
);

// Register for hook to show preview of tt_content element of CType="c1_fsc_slider" in page module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['c1_fsc_slider']
    = \C1\C1FscSlider\Hooks\FscSliderPreviewRenderer::class;

//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(get_declared_classes());

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid Styled Slider');

// Add a flexform to the fsc_slider CType
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '',
    'FILE:EXT:c1_fsc_slider/Configuration/FlexForms/c1_fsc_slider_flexform.xml',
    'fsc_slider'
);
