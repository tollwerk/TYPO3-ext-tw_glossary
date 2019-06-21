<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Tollwerk.TwGlossary',
            'Glossary',
            'Glossary'
        );
        
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tw_glossary', 'Configuration/TypoScript/Static', 'tollwerk Glossary');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_twglossary_domain_model_entry', 'EXT:tw_glossary/Resources/Private/Language/locallang_csh_tx_twglossary_domain_model_entry.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_twglossary_domain_model_entry');
    }
);
