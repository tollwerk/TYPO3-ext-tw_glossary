<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function() {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Tollwerk.TwGlossary',
            'Glossary',
            [
                'Entry' => 'list, show, sitemap',
            ]
        );

        // wizards

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        glossary {
                            iconIdentifier = tw_glossary-plugin-glossary
                            title = LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_tw_glossary_glossary.name
                            description = LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_tw_glossary_glossary.description
                            tt_content_defValues {
                                CType = list
                                list_type = twglossary_glossary
                            }
                        }
                    }
                    show = *
                }
           }'
        );


        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'tw_glossary-plugin-glossary',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:tw_glossary/Resources/Public/Icons/user_plugin_glossary.svg']
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:tw_glossary/Configuration/TypoScript/Main/TSconfig/page.t3s">');
    }
);
