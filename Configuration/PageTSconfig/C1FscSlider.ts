# **************************************************
# Add the slider to the "New Content Element Wizard"
# **************************************************
mod.wizards.newContentElement.wizardItems.common {
	elements {
		fsc_slider {
			iconIdentifier = content-image
			title = LLL:EXT:c1_fsc_slider/Resources/Private/Language/locallang_be.xlf:wizard.title
			description = LLL:EXT:c1_fsc_slider/Resources/Private/Language/locallang_be.xlf:wizard.description
			tt_content_defValues {
				CType = fsc_slider
			}
		}
	}
	show := addToList(fsc_slider)
}