plugin.tx_twglossary {
    view {
        templateRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_twglossary_glossary.view.templateRootPath}
        partialRootPaths.0 = EXT:tw_glossary/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_twglossary_glossary.view.partialRootPath}
        layoutRootPaths.0 = EXT:tw_glossary/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_twglossary_glossary.view.layoutRootPath}
    }

    persistence {
        storagePid = {$plugin.tx_twglossary_glossary.persistence.storagePid}
        #recursive = 1
    }

    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }

    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }

    settings {
        detailPid = {$plugin.tx_twglossary_glossary.persistence.detailPid}
        listPid = {$plugin.tx_twglossary_glossary.persistence.listPid}
    }
}

# CUSTOM LINKS
config.recordLinks.glossary {
    typolink {
        parameter = {$plugin.tx_twglossary_glossary.persistence.detailPid} - Glossary__link
        additionalParams {
            data = field:uid
            wrap = &tx_twglossary_glossary[controller]=Entry&tx_twglossary_glossary[action]=show&tx_twglossary_glossary[entry]=|
        }
        useCacheHash = 1
    }
}
