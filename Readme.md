# About this extension

c1_fsc_slider provides a slider content element (based on slick slider) for TYPO3 CMS, built on
the system extension fluid_styled_content (FSC).

A more detailed explanaition of the following can be found at: https://usetypo3.com/custom-fsc-element.html

## System Requirements
TYPO3 v13.4 or v14.3 with fluid_styled_content.

## Installation
Install the extension and add the site set `c1/fsc-slider-default` to your site.

## Components of a content element based on FSC
This extension adds a content element called `fsc_slider` to the system. The following steps are necessary to get it up and running:

## Miscellaneous
This extension includes jQuery in `JSFooterLibs`. If you already have jQuery on your site, overwrite this in your TypoScript
or set the constant `plugin.tx_c1fscslider.settings.includejQuery` to 0.
