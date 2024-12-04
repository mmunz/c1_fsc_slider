<?php

declare(strict_types=1);
/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace C1\C1FscSlider\Preview;

use TYPO3\CMS\Backend\Preview\StandardContentPreviewRenderer;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use TYPO3\CMS\Core\Resource\ProcessedFile;

/**
 * Contains a preview rendering for the page module of CType="c1_fsc_slider"
 */
class SliderPreviewRenderer extends StandardContentPreviewRenderer
{
    public function renderPageModulePreviewContent(GridColumnItem $item): string
    {
        $content = '';
        $row = $item->getRecord();
        $imageTags = [];

        if ($row['assets']) {
            $fileReferences = BackendUtility::resolveFileReferences('tt_content', 'assets', $row);
            foreach ($fileReferences as $fileReference) {
                $processedFile = $fileReference->getOriginalFile()->process(
                    ProcessedFile::CONTEXT_IMAGEPREVIEW,
                    [
                        'width' => '96',
                    ]
                );
                $imageTags[] = sprintf(
                    '<img alt="%s" src="%s"/>',
                    $processedFile->getProperty('alternative'),
                    $processedFile->getPublicUrl()
                );
            }
            if ($imageTags) {
                $content .= implode('', $imageTags);
            }
        } else {
            $content .= 'No images selected!';
        }
        return $content;
    }
}
