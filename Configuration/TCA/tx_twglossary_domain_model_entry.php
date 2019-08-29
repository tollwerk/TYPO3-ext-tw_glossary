<?php
return [
    'ctrl'      => [
        'title'                    => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entry',
        'label'                    => 'title',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'versioningWS'             => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled'  => 'hidden',
        ],
        'searchFields'             => 'title,description,similar_entries,first_character',
        'iconfile'                 => 'EXT:tw_glossary/Resources/Public/Icons/Backend/tx_twglossary_domain_model_entry.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, image, similar_entries, first_character',
    ],
    'types'     => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,--palette--;;entry_title, description, image, similar_entries, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes'  => [
        'entry_title' => ['showitem' => 'title, first_character'],
    ],
    'columns'   => [
        'sys_language_uid' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'special'    => 'languages',
                'items'      => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default'    => 0,
            ],
        ],
        'l10n_parent'      => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => true,
            'label'       => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config'      => [
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'default'             => 0,
                'items'               => [
                    ['', 0],
                ],
                'foreign_table'       => 'tx_twglossary_domain_model_entry',
                'foreign_table_where' => 'AND {#tx_twglossary_domain_model_entry}.{#pid}=###CURRENT_PID### AND {#tx_twglossary_domain_model_entry}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource'  => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label'      => [
            'label'  => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            ],
        ],
        'hidden'           => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config'  => [
                'type'       => 'check',
                'renderType' => 'checkboxToggle',
                'items'      => [
                    [
                        0                    => '',
                        1                    => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime'        => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
                'behaviour'  => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime'          => [
            'exclude' => true,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'eval'       => 'datetime,int',
                'default'    => 0,
                'range'      => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour'  => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'title'           => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entry.title',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'description'     => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entry.description',
            'config'  => [
                'type'           => 'text',
                'cols'           => 40,
                'rows'           => 15,
                'eval'           => 'trim',
                'enableRichtext' => true
            ]
        ],
        'image'           => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entry.image',
            'config'  => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance'       => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                        'fileUploadAllowed'          => false,
                    ],
                    // custom configuration for displaying fields in the overlay/reference table
                    // to use the image overlay palette instead of the basic overlay palette
                    'overrideChildTca' => [
                        'types' => [
                            '0'                                           => [
                                'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'similar_entries' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entry.similar_entries',
            'config'  => [
                'type'                             => 'select',
                'renderType'                       => 'selectMultipleSideBySide',
                'foreign_table'                    => 'tx_twglossary_domain_model_entry',
                'foreign_table_where'              => 'AND tx_twglossary_domain_model_entry.uid != ###THIS_UID###',
                'size'                             => 5,
                'minitems'                         => 0,
                'enableMultiSelectFilterTextfield' => true,
            ],
        ],
        'first_character' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entry.first_character',
            'config'  => [
                'type'       => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_twglossary_domain_model_entrygroup',
                'items' => [
                    ['------', 0],
                ],
            ],
        ],
    ],
];
