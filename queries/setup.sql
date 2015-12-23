--
-- Setup module training
--

-- --------------------------------------------------------

--
-- Table structure for table `training_diary`
--

CREATE TABLE IF NOT EXISTS `training_diary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'M male, F female, U undefined',
  `birthday` date DEFAULT NULL,
  `addDate` datetime NOT NULL,
  `addIdAccount` int(11) unsigned NOT NULL,
  `updDate` datetime DEFAULT NULL,
  `updIdAccount` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`firstname`,`lastname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Dati della tabelle `settings_permissions`
--

INSERT INTO `settings_permissions` (`id`, `module`, `action`, `description`, `locked`) VALUES
(NULL, 'training', 'address_view', 'View address', 0),
(NULL, 'training', 'address_edit', 'Edit address', 0),
(NULL, 'training', 'address_del', 'Delete address', 0);

-- --------------------------------------------------------