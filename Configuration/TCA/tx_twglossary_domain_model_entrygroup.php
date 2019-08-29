<?php

return [
    'ctrl'      => [
        'title'                    => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entrygroup',
        'label'                    => 'character',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'cruser_id'                => 'cruser_id',
        'delete'                   => 'deleted',
        'sortby'                   => 'sorting',
        'searchFields'             => 'character',
        'iconfile'                 => 'EXT:tw_glossary/Resources/Public/Icons/Backend/tx_twglossary_domain_model_entrygroup.svg',
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden, character',
    ],
    'types'     => [
        '1' => ['showitem' => 'hidden, character,'],
    ],
    'columns'   => [
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
        'sorting'        => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

        'character' => [
            'exclude' => true,
            'label'   => 'LLL:EXT:tw_glossary/Resources/Private/Language/locallang_db.xlf:tx_twglossary_domain_model_entrygroup.character',
            'config'  => [
                'type' => 'input',
                'size' => 5,
                'max'  => 255,
            ],
        ],
    ],
];

