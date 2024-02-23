DROP TABLE IF EXISTS academic_years;

CREATE TABLE `academic_years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `academic_years_year_unique` (`year`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO academic_years VALUES('1','2022','2022-2023','2024-02-18 16:16:11','2024-02-18 16:17:53');
INSERT INTO academic_years VALUES('2','2023','2023-2024','2024-02-18 16:16:38','2024-02-18 16:16:38');
INSERT INTO academic_years VALUES('3','2024','2024-2025','2024-02-18 16:18:08','2024-02-18 16:18:08');



DROP TABLE IF EXISTS failed_jobs;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations VALUES('1','2014_10_12_000000_create_users_table','1');
INSERT INTO migrations VALUES('2','2014_10_12_100000_create_password_reset_tokens_table','1');
INSERT INTO migrations VALUES('3','2014_10_12_100000_create_password_resets_table','1');
INSERT INTO migrations VALUES('4','2019_08_19_000000_create_failed_jobs_table','1');
INSERT INTO migrations VALUES('5','2019_12_14_000001_create_personal_access_tokens_table','1');
INSERT INTO migrations VALUES('6','2024_02_18_042409_create_academic_years_table','2');
INSERT INTO migrations VALUES('7','2024_02_18_042811_create_settings_table','3');



DROP TABLE IF EXISTS password_reset_tokens;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO password_reset_tokens VALUES('brownhilludeh@gmail.com','$2y$12$jFird1wc2YIAVCoaeQk43OEFYq5T5h7YiOYA0Bkp8Ku6pJndgTm9m','2024-02-18 12:33:28');



DROP TABLE IF EXISTS password_resets;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS personal_access_tokens;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO settings VALUES('1','school_name','brownportal ng','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('2','site_title','brownportal','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('3','phone','08060091229','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('4','email','info@brownportal.com','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('5','currency_symbol','CAD','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('6','motto','neeting every child\'s needs','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('7','academic_year','1','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('8','instagram','','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('9','facebook','','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('10','youtube','','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('11','address','15 Yale Okeowo Street','2024-02-18 16:39:28','2024-02-18 16:41:32');
INSERT INTO settings VALUES('12','logo','logo.png','2024-02-20 04:29:14','2024-02-20 04:29:14');



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Applicant',
  `phone` varchar(14) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'avatar.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES('12','Super Admin','','brownhill@brownportal.com','SuperAdmin','08060091234','1','$2y$12$JtO85ofG8FvfgaSgi9kj0Oq4WvSfQLShtBXMTcTZc.IffsLWjrswe','avatar.png','','Ut9rsE7MQJFKfJVoWf3LNfiP4GgcR9YiRnNGMWfQBlxQC9rRc9jc4Q53vkB5','2024-02-18 14:06:38','2024-02-22 12:03:34','');
INSERT INTO users VALUES('13','Applicant Jambite','','coders@brownportal.com','Applicant','08160091229','1','$2y$12$diQAk.KnOxC8g6hltLXfFuPX9CJrjETQ1mwH52qyX9LGidK0mBa92','avatar.png','','','2024-02-22 03:54:42','2024-02-22 03:54:42','');



