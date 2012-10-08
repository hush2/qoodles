CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL auto_increment,
  `ini` char(1) default NULL,
  `name` varchar(128) NOT NULL,
  `dob_md` varchar(32) default NULL,
  `dob_yr` int(4) default NULL,
  `dob_suf` char(2) default NULL,
  `dod_md` varchar(32) default NULL,
  `dod_yr` int(4) default NULL,
  `dod_suf` char(2) default NULL,
  `cat_id` int(11) default NULL,
  `nat_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(11) NOT NULL auto_increment,
  `cat` varchar(128) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `cat` (`cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `nats` (
  `id` int(11) NOT NULL auto_increment,
  `nat` varchar(128) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL auto_increment,
  `author_id` int(11) NOT NULL,
  `quote` text NOT NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `SEARCH_INDEX` (`quote`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
