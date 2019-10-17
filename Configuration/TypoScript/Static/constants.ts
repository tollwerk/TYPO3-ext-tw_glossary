
plugin.tx_twglossary_glossary {
    view {
        # cat=plugin.tx_twglossary_glossary/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:tw_glossary/Resources/Private/Templates/
        # cat=plugin.tx_twglossary_glossary/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:tw_glossary/Resources/Private/Partials/
        # cat=plugin.tx_twglossary_glossary/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:tw_glossary/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_twglossary_glossary//000; type=string; label=Default storage PID
        storagePid =
        # cat=plugin.tx_twglossary_glossary//010; type=string; label=Single view PID
        detailPid =
        # cat=plugin.tx_twglossary_glossary//011; type=string; label=List view PID
        listPid =

    }

    settings {
        # cat=plugin.tx_twglossary_glossary//010; type=string; label=Enable grouping
        enableGrouping = 1

        # cat=plugin.tx_twglossary_glossary//020; type=string; label=Show first entry
        showFirstEntry = 0
    }
}
