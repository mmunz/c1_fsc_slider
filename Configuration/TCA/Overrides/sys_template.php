<?php
defined('TYPO3') or die();

// Add a flexform to the fsc_slider CType
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '',
    'FILE:EXT:c1_fsc_slider/Configuration/FlexForms/c1_fsc_slider_flexform.xml',
    'fsc_slider'
);
