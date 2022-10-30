# About this extension

c1_fsc_slider is an example extension that provides everything to create a custom content element
for TYPO3 CMS 7 based on the system extension fluid_styled_content (FSC).

A more detailed explanaition of the following can be found at: https://usetypo3.com/custom-fsc-element.html

## System Requirements
Obviously FSC needs to be installed in TYPO3 which is only possible in version 7.5 or higher. Since the tt_content field "assets" is used in version 1.1.0 and higher and this field is not present in TYPO3 7.5, only version 1.0.0 of this extension will run on TYPO3 7.5. Newer releases are supposed to work with TYPO3 7 LTS.

## Installation
Install the extension and include the static TypoScript. Simple as that.

## Components of a content element based on FSC
This extension adds a content element called `fsc_slider` to the system. The following steps are necessary to get it up and running:

## Miscellaneous
This extension includes jQuery in `JSFooterLibs`. If you already have jQuery on your site, overwrite this in your TypoScript
or set the constant `plugin.tx_c1fscslider.settings.includejQuery` to 0.
