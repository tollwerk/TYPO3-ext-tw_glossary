
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
        # cat=plugin.tx_twglossary_glossary//a; type=string; label=Default storage PID
        storagePid =
        # cat=plugin.tx_twglossary_glossary//a; type=string; label=Single view PID
        detailPid =
        # cat=plugin.tx_twglossary_glossary//a; type=string; label=List view PID
        listPid =
    }
}
