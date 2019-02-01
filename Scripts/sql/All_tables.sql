/*  Servers Table */
CREATE TABLE `servers` (
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','COMPLETE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `maps_table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diff_table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `servers_server_id_unique` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Users Auth table */
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Password Resets */
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Sessions table */
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Maps Table */
CREATE TABLE `maps` (
  `map_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','TRUNCATED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `maps_server_id_foreign` (`server_id`),
  CONSTRAINT `maps_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Maps_details table */
CREATE TABLE `maps_details` (
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worldid` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aid` int(11) NOT NULL,
  `alliance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `population` int(11) NOT NULL,
  `table_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatetime` time NOT NULL,
  KEY `maps_details_server_id_foreign` (`server_id`),
  CONSTRAINT `maps_details_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* diff table */
CREATE TABLE `diff_details` (
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `alliance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diffPop` int(11) DEFAULT NULL,
  `pop1` int(11) NOT NULL DEFAULT '0',
  `pop2` int(11) NOT NULL DEFAULT '0',
  `pop3` int(11) NOT NULL DEFAULT '0',
  `pop4` int(11) NOT NULL DEFAULT '0',
  `pop5` int(11) NOT NULL DEFAULT '0',
  `pop6` int(11) NOT NULL DEFAULT '0',
  `pop7` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Players table */
CREATE TABLE `players` (
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `tribe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villages` int(11) NOT NULL,
  `population` int(11) NOT NULL,
  `diffpop` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `alliance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* PLUS Table */
CREATE TABLE `plus` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus` tinyint(1) NOT NULL DEFAULT '1',
  `leader` tinyint(1) NOT NULL DEFAULT '0',
  `defense` tinyint(1) NOT NULL DEFAULT '0',
  `offense` tinyint(1) NOT NULL DEFAULT '0',
  `artifact` tinyint(1) NOT NULL DEFAULT '0',
  `resources` tinyint(1) NOT NULL DEFAULT '0',
  `wonder` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `plus_server_id_foreign` (`server_id`),
  KEY `plus_user_foreign` (`user`),
  CONSTRAINT `plus_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`),
  CONSTRAINT `plus_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Profile */
CREATE TABLE `profiles` (
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tribe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PRIMARY','DUAL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitter1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitter2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `profiles_server_id_foreign` (`server_id`),
  CONSTRAINT `profiles_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* migrations */
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Units Details */
CREATE TABLE `units` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tribe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tribe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upkeep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offense` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offense_max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defense_inf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defense_inf_max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defense_cav` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defense_cav_max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_wood` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_clay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_iron` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_crop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `units_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* contacts */
CREATE TABLE `contacts` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `contacts_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Hero details */
CREATE TABLE `hero` (
  `account_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `fs` int(11) NOT NULL,
  `fp` int(11) NOT NULL,
  `off` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `res` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* troops details */
CREATE TABLE `troops` (
  `account_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `unit01` int(11) NOT NULL DEFAULT '0',
  `unit02` int(11) NOT NULL DEFAULT '0',
  `unit03` int(11) NOT NULL DEFAULT '0',
  `unit04` int(11) NOT NULL DEFAULT '0',
  `unit05` int(11) NOT NULL DEFAULT '0',
  `unit06` int(11) NOT NULL DEFAULT '0',
  `unit07` int(11) NOT NULL DEFAULT '0',
  `unit08` int(11) NOT NULL DEFAULT '0',
  `unit09` int(11) NOT NULL DEFAULT '0',
  `unit10` int(11) NOT NULL DEFAULT '0',
  `upkeep` int(11) NOT NULL DEFAULT '0',
  `Tsq` int(11) NOT NULL DEFAULT '0',
  `type` enum('OFFENSE','DEFENSE','SCOUT','SUPPORT','ARTIFACT','NONE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NONE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Support */
CREATE TABLE `support` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Suggest','Defect','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('New','Inprocess','Complete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Resource Tasks */
CREATE TABLE `resourcetasks` (
  `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','COMPLETE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('wood','clay','iron','crop','all') COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_total` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `target_time` datetime DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `res_received` int(11) NOT NULL DEFAULT '0',
  `res_remain` int(11) NOT NULL DEFAULT '0',
  `res_percent` int(11) NOT NULL DEFAULT '0',
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  KEY `resourcetasks_server_id_foreign` (`server_id`),
  CONSTRAINT `resourcetasks_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Resources Updates */
CREATE TABLE `resourceupdates` (
  `task_id` int(11) NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resources` int(11) NOT NULL DEFAULT '0',
  `percent` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `resourceupdates_server_id_foreign` (`server_id`),
  CONSTRAINT `resourceupdates_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Defense tasks */
CREATE TABLE `defensetasks` (
  `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','COMPLETE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('defend','snipe','stand','scout','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` enum('high','medium','low','none') COLLATE utf8mb4_unicode_ci NOT NULL,
  `def_total` int(11) NOT NULL,
  `crop` tinyint(1) NOT NULL DEFAULT '0',
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `target_time` datetime DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `def_received` int(11) NOT NULL DEFAULT '0',
  `def_remain` int(11) NOT NULL DEFAULT '0',
  `def_percent` int(11) NOT NULL DEFAULT '0',
  `def_inf` int(11) NOT NULL DEFAULT '0',
  `def_cav` int(11) NOT NULL DEFAULT '0',
  `resources` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Defense Updates */
CREATE TABLE `defenseupdates` (
  `task_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resources` int(11) NOT NULL DEFAULT '0',
  `tribe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit01` int(11) NOT NULL,
  `unit02` int(11) NOT NULL,
  `unit03` int(11) NOT NULL,
  `unit04` int(11) NOT NULL,
  `unit05` int(11) NOT NULL,
  `unit06` int(11) NOT NULL,
  `unit07` int(11) NOT NULL,
  `unit08` int(11) NOT NULL,
  `unit09` int(11) NOT NULL,
  `unit10` int(11) NOT NULL,
  `upkeep` int(11) NOT NULL,
  `def_inf` int(11) NOT NULL,
  `def_cav` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/* Accounts table */
CREATE TABLE `accounts` (
  `uid` int(11) NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tribe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PRIMARY','DUAL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitter1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitter2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `accounts_server_id_foreign` (`server_id`),
  CONSTRAINT `accounts_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


/* Offense Plans */
CREATE TABLE `offenseplans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waves` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `real` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fake` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `attackers` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `targets` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Offense Waves */
CREATE TABLE `offensewaves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_uid` int(11) NOT NULL,
  `a_x` int(11) NOT NULL,
  `a_y` int(11) NOT NULL,
  `a_player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_uid` int(11) NOT NULL,
  `d_player` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_x` int(11) NOT NULL,
  `d_y` int(11) NOT NULL,
  `waves` int(11) NOT NULL,
  `type` enum('Real','Fake','Cheif','Scout','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* Subscriptions */
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `status` enum('INPROCESS','ACTIVE','EXPIRED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` time NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_update` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_server_id_foreign` (`server_id`),
  CONSTRAINT `subscriptions_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`server_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


























