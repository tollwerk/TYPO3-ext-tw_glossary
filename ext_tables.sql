#
# Table structure for table 'tx_twglossary_domain_model_entry'
#
CREATE TABLE tx_twglossary_domain_model_entry (

	title varchar(255) DEFAULT '' NOT NULL,
	description text,
	image int(11) DEFAULT '0' NOT NULL,
	similar_entries varchar(255) DEFAULT '' NOT NULL,
	first_character varchar(255) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_twglossary_domain_model_entrygroup'
#
CREATE TABLE tx_twglossary_domain_model_entrygroup (

    uid          INT(11)                         NOT NULL AUTO_INCREMENT,
    pid          INT(11) DEFAULT '0'             NOT NULL,
    tstamp       INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
    crdate       INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
    cruser_id    INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
    deleted      TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
    hidden       TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,

	character    varchar(5) DEFAULT '' NOT NULL,
	sorting      INT(11) DEFAULT '0'   NOT NULL,

	PRIMARY KEY (uid),
    KEY parent (pid)
);
