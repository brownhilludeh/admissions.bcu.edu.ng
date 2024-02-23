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

INSERT INTO academic_years VALUES('1','2023','2023-2024','2023-12-26 17:06:20','2023-12-26 17:16:08');
INSERT INTO academic_years VALUES('2','2024','2024-2025','2023-12-26 17:09:56','2023-12-26 17:16:26');
INSERT INTO academic_years VALUES('3','2022','2022-2023','2023-12-26 19:25:06','2024-01-01 01:45:20');



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
INSERT INTO migrations VALUES('6','2023_12_26_135521_create_academic_years_table','2');
INSERT INTO migrations VALUES('7','2023_12_26_135534_create_settings_table','2');



DROP TABLE IF EXISTS password_reset_tokens;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO settings VALUES('1','logo','logo.png','2022-09-04 09:56:37','2024-01-01 02:57:29');
INSERT INTO settings VALUES('2','school_name','brownportal School','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('3','site_title','brownportalng','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('4','phone','2349098090777','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('5','email','info@lightshowersschool.com.ng','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('6','language','English','2022-09-04 10:06:16','2023-11-18 16:47:09');
INSERT INTO settings VALUES('7','currency_symbol','N','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('8','motto','neeting every child\'s needs','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('9','academic_year','3','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('10','youtube','','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('11','instagram','','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('12','facebook','','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('13','other','','2022-09-04 10:06:16','2022-09-04 10:06:16');
INSERT INTO settings VALUES('14','address','Block 60, Plot 1295, Oye Akapoo Crescent Lake View Estate, Amuwwo Odofin.','2022-09-04 10:06:16','2024-01-01 02:57:04');
INSERT INTO settings VALUES('15','mission','To provide a safe and stimulating environment that will nurture the unique gifts of the young child and lay foundation for a lifetime learning.','2022-09-14 02:18:51','2023-12-26 19:53:25');
INSERT INTO settings VALUES('16','vision','To develop maximally, the child’s ability to learn from the inspiring environment.','2022-09-14 02:20:08','2023-12-26 19:53:25');
INSERT INTO settings VALUES('17','mail_type','mail','2023-11-10 19:53:59','2023-11-10 20:26:01');
INSERT INTO settings VALUES('18','from_email','info@bronwportal.com','2023-11-10 19:53:59','2023-11-10 20:26:01');
INSERT INTO settings VALUES('19','from_name','BrownPortal NG','2023-11-10 19:53:59','2023-11-10 20:26:01');
INSERT INTO settings VALUES('20','stamp','stamp.png','2023-11-10 20:16:55','2023-12-26 19:51:31');
INSERT INTO settings VALUES('21','about','this is the text about asection changing it ','2023-11-18 16:49:37','2023-12-26 19:53:25');
INSERT INTO settings VALUES('23','value','value is shitty ','2023-11-18 16:50:42','2023-12-26 19:53:25');
INSERT INTO settings VALUES('24','version','v.3.10.3
','2023-11-18 16:50:42','2023-11-18 16:51:01');
INSERT INTO settings VALUES('25','escription','hello worldl description thing','2023-12-26 19:53:25','2023-12-26 19:53:25');



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Applicant',
  `phone` varchar(14) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'avatar.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES('1','0','udeh browhn','23/4539BO','brownhilludeh@gmail.com','Admin','','1','$2y$12$.ZqZANPYKdpJhObAyt0HuegIHT1rP7AtuchkoK6wO.kupR.1vrvoW','profile.png','','','2023-12-26 01:47:56','2024-01-01 12:20:53','');
INSERT INTO users VALUES('2','0','udeh browhn','','0
brownhilludeh@gmail.com','Admin','','1','$2y$12$UHMR2/zPpftwdLHNtJOtw.7G1jbNz84E5yB4S55Cv3AOQIGN7/eqm','avatar.png','','','2023-12-26 01:47:56','2023-12-26 01:47:56','');
INSERT INTO users VALUES('3','1','udeh browhn','','brfownhilludeh@gmail.com','Admin','','1','$2y$12$UHMR2/zPpftwdLHNtJOtw.7G1jbNz84E5yB4S55Cv3AOQIGN7/eqm','avatar.png','','','2023-12-26 01:47:56','2023-12-26 01:47:56','');
INSERT INTO users VALUES('4','0','udeh browhn','','0
brownhilluderfh@gmail.com','Admin','','1','$2y$12$UHMR2/zPpftwdLHNtJOtw.7G1jbNz84E5yB4S55Cv3AOQIGN7/eqm','avatar.png','','','2023-12-26 01:47:56','2023-12-26 01:47:56','');
INSERT INTO users VALUES('5','1','udeh browhn','','brownffhilludeh@gmail.com','Admin','','0','$2y$12$UHMR2/zPpftwdLHNtJOtw.7G1jbNz84E5yB4S55Cv3AOQIGN7/eqm','avatar.png','','','2023-12-26 01:47:56','2023-12-26 01:47:56','');
INSERT INTO users VALUES('6','2','udeh browhn','','02
brownhilludeh@gmail.com','Admin','','1','$2y$12$UHMR2/zPpftwdLHNtJOtw.7G1jbNz84E5yB4S55Cv3AOQIGN7/eqm','avatar.png','','','2023-12-26 01:47:56','2023-12-26 01:47:56','');
INSERT INTO users VALUES('7','0','udeh browhn','','br23fownhilludeh@gmail.com','Admin','','1','$2y$12$UHMR2/zPpftwdLHNtJOtw.7G1jbNz84E5yB4S55Cv3AOQIGN7/eqm','avatar.png','','','2023-12-26 01:47:56','2023-12-26 01:47:56','');



