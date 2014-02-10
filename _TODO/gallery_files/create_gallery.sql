CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(200) character set utf8 collate utf8_bin default 'New Gallery',
  `content` text character set utf8 collate utf8_bin,
  `rank` int(10) unsigned default NULL,
  `image` varchar(200) character set utf8 collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `gallery_id` int(10) unsigned default NULL,
  `name` varchar(200) character set utf8 collate utf8_bin default NULL,
  `content` text character set utf8 collate utf8_bin,
  `image` varchar(200) character set utf8 collate utf8_bin default NULL,
  `rank` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

