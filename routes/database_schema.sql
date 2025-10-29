-- migrations table
INSERT INTO migrations (id, migration, batch) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_02_041021_create_media_table', 1),
(5, '2025_09_02_041022_add_tenant_aware_column_to_media_table', 1),
(6, '2025_10_02_091735_create_pages_table', 2),
(7, '2025_10_06_062733_create_locations_table', 2),
(8, '2025_10_06_073122_create_specialities_table', 2),
(9, '2025_10_06_081536_create_location_has_specialities_table', 2),
(10, '2025_10_06_093422_add_table_locations', 2),
(11, '2025_10_07_015318_remove_speciality_on_location', 2),
(12, '2025_10_07_033952_create_coes_table', 2),
(13, '2025_10_07_040058_add_column_speciality', 2),
(14, '2025_10_07_065626_create_services_table', 2),
(15, '2025_10_07_065736_create_subservices_table', 2),
(16, '2025_10_08_020258_add_location_on_subservice', 3),
(17, '2025_10_08_022406_add_meta_speciality_on_location', 4),
(18, '2025_10_08_041942_add_column_on_coes', 5),
(19, '2025_10_08_062813_change_location_id_on_specialist', 6),
(20, '2025_10_08_070752_remove_location_on_specialist', 7),
(21, '2025_10_08_073949_create_location_has_coes_table', 8),
(23, '2025_10_08_081342_remove_location_on_subservice', 9),
(24, '2025_10_08_081626_create_location_has_subservices_table', 10),
(25, '2025_10_13_024149_create_facilities_table', 11),
(26, '2025_10_13_024211_create_location_has_facilities_table', 11),
(27, '2025_10_13_040824_create_emergencies_table', 12),
(28, '2025_10_13_040838_create_location_has_emergencies_table', 12),
(29, '2025_10_13_064803_create_departments_table', 13),
(30, '2025_10_13_081200_create_career_categories_table', 14),
(31, '2025_10_13_081702_create_careers_table', 15),
(32, '2025_10_13_081729_create_location_has_careers_table', 15),
(33, '2025_10_14_020955_create_news_categories_table', 16),
(34, '2025_10_14_021802_create_news_table', 17),
(35, '2025_10_14_025037_create_testimonies_table', 18),
(36, '2025_10_14_045523_create_doctors_table', 19),
(37, '2025_10_14_045935_create_doctor_has_locations_table', 20),
(38, '2025_10_15_040655_update_doctor_fk_on_location', 21),
(40, '2025_10_15_042403_create_category_ages_table', 22),
(41, '2025_10_15_050107_create_categories_table', 23),
(42, '2025_10_15_062643_create_health_screening_categories_table', 23),
(43, '2025_10_15_070532_create_health_screenings_table', 24),
(44, '2025_10_15_074513_create_health_screening_has_locations_table', 25),
(45, '2025_10_15_081243_create_health_screening_has_ages_table', 26),
(46, '2025_10_15_085300_create_offers_categories_table', 27),
(47, '2025_10_15_090121_create_offers_table', 28),
(48, '2025_10_15_090404_create_offer_has_locations_table', 29),
(51, '2025_10_20_015053_create_sliders_table', 30),
(54, '2025_10_20_040046_create_settings_table', 31),
(55, '2025_10_20_041721_add_status_on_sliders', 31),
(56, '2025_10_20_044914_set_nullable_on_slider', 32),
(58, '2025_10_21_024024_create_menu_headers_table', 33),
(59, '2025_10_23_031130_create_menu_headers_table', 34),
(61, '2025_10_23_064201_add_controller_on_pages', 35),
(62, '2025_10_23_072621_add_pages_on_menu_header', 36),
(64, '2025_10_24_035015_create_menu_footers_table', 37),
(65, '2025_10_27_071518_create_career_submissions_table', 38);

-- users table
INSERT INTO users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES
(1, 'Test User', 'test@example.com', '2025-09-17 02:35:43', '$2y$12$zFqX5WZGfmqsW2OGKh4By.8Z60f0GTyE./QELgQC1.tUs1GDwJVSu', 'IFxU6XwdQC7QsgbiVCU5ru39vQyzUPJ68EPP7GVrMk0vSQlejLBI6HgFDsgn', '2025-09-17 02:35:44', '2025-09-17 02:35:44');

-- sessions table
INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity) VALUES
('mFk49OyD4eMGc0pgzAp1pHwrDlrEszLgSUdO7Rv1', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFp0TXRMWGVIbFdFZXRuRmtSMDAxdHJyTDdPaVJuVldEOWJ2d2ZSRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vYWx0aXVzLnRlc3QvaWQvdGVudGFuZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1761660877),
('pmVKRTTlKnhyey3Hm4G6Z2Xjg1o4FLy7Qf7YWAny', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:144.0) Gecko/20100101 Firefox/144.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEdXZ1RIZjh0bWZoNEpRWHhmUGxLRXJNREFjcTJKbEJCdldDUGVXSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vYWx0aXVzLnRlc3QvaWQvdGhhbmsteW91Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1761662679);

-- cache table
INSERT INTO `cache` (`key`, `value`, expiration) VALUES
('altius-hospitals-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1761528193;', 1761528193),
('altius-hospitals-cache-livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1761528193),
('altius-hospitals-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1761557908;', 1761557908),
('altius-hospitals-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1761557908),
('altius-hospitals-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1761662306;', 1761662306),
('altius-hospitals-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1761662306);

-- media table
INSERT INTO media (id, disk, directory, visibility, name, path, width, height, size, type, ext, alt, title, description, caption, exif, curations, created_at, updated_at, tenant_id) VALUES
(1, 'public', 'media', 'public', 'ea5c1ce6-7c23-4513-88dd-7816c35283d7', 'media/ea5c1ce6-7c23-4513-88dd-7816c35283d7.jpg', 632, 381, 473240, 'image/jpeg', 'jpg', NULL, 'image-altius-hospitals-harapan-indah', NULL, NULL, '{"FileName":"hfbCVgpKCcPoUhNLKlkY1RC4fwFWrs-metaaW1hZ2UtYWx0aXVzLWhvc3BpdGFscy1oYXJhcGFuLWluZGFoLmpwZw==-.jpg","FileDateTime":1759897832,"FileSize":473240,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"632\\" height=\\"381\\"","Height":381,"Width":632,"IsColor":1}}', NULL, '2025-10-08 04:30:37', '2025-10-08 04:30:37', NULL),
(2, 'public', 'media', 'public', '861a3a86-0a23-4da8-ae0d-92a2234ee447', 'media/861a3a86-0a23-4da8-ae0d-92a2234ee447.jpg', 1400, 499, 1197780, 'image/jpeg', 'jpg', NULL, 'hero-altius-puri-indah', NULL, NULL, '{"FileName":"3RtesABfuCTmCijBOHa5jgnZbDhTAO-metaaGVyby1hbHRpdXMtcHVyaS1pbmRhaC5qcGc=-.jpg","FileDateTime":1759897852,"FileSize":1197780,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1400\\" height=\\"499\\"","Height":499,"Width":1400,"IsColor":1}}', NULL, '2025-10-08 04:32:07', '2025-10-08 04:32:07', NULL),
(3, 'public', 'media', 'public', '43a68fd5-bcd6-4a38-9a19-4b9cd62ea8be', 'media/43a68fd5-bcd6-4a38-9a19-4b9cd62ea8be.jpg', 1400, 494, 84807, 'image/jpeg', 'jpg', NULL, 'hero-about', NULL, NULL, '{"FileName":"lSgwdsJk8Bl7jBA3a3Ad4eR9qAYp3E-metaaGVyby1hYm91dC5qcGc=-.jpg","FileDateTime":1760411323,"FileSize":84807,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1400\\" height=\\"494\\"","Height":494,"Width":1400,"IsColor":1}}', NULL, '2025-10-14 03:08:50', '2025-10-14 03:08:50', NULL),
(4, 'public', 'images', 'public', 'f6efe40b-2e7d-438b-8147-3a085deeb2f8', 'images/f6efe40b-2e7d-438b-8147-3a085deeb2f8.webp', 2048, 1365, 196540, 'image/webp', 'webp', NULL, 'IMG_6530_11zon-2048x1365', NULL, NULL, 'null', NULL, '2025-10-14 03:11:27', '2025-10-14 03:11:27', NULL),
(5, 'public', 'media', 'public', '7cf55135-0f00-4634-837b-53c15bb8760e', 'media/7cf55135-0f00-4634-837b-53c15bb8760e.jpg', 443, 300, 61029, 'image/jpeg', 'jpg', NULL, 'image-tumb-video', NULL, NULL, '{"FileName":"vWSb9MRDeXP2qmlGQQEHefm8e9wLEj-metaaW1hZ2UtdHVtYi12aWRlby5qcGc=-.jpg","FileDateTime":1760425409,"FileSize":61029,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"443\\" height=\\"300\\"","Height":300,"Width":443,"IsColor":1}}', NULL, '2025-10-14 07:03:32', '2025-10-14 07:03:32', NULL),
(6, 'public', 'media', 'public', 'c169b22e-3d73-42e4-b04f-9d83515c63c4', 'media/c169b22e-3d73-42e4-b04f-9d83515c63c4.jpg', 2000, 1334, 183303, 'image/jpeg', 'jpg', NULL, 'attractive-asian-woman-nurse-doctor-working-with-smiling_002', NULL, NULL, '{"FileName":"FSuMlmSJ5UOzEQf7lttaJxcoYabYBE-metaYXR0cmFjdGl2ZS1hc2lhbi13b21hbi1udXJzZS1kb2N0b3Itd29ya2luZy13aXRoLXNtaWxpbmdfMDAyLmpwZw==-.jpg","FileDateTime":1760426917,"FileSize":183303,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"2000\\" height=\\"1334\\"","Height":1334,"Width":2000,"IsColor":1}}', NULL, '2025-10-14 07:28:39', '2025-10-14 07:28:39', NULL),
(7, 'public', 'media', 'public', '1a5fafdf-85b1-4746-a672-bede4015c84b', 'media/1a5fafdf-85b1-4746-a672-bede4015c84b.jpg', 480, 612, 119677, 'image/jpeg', 'jpg', NULL, 'dr-arya-cipta-widjaja', NULL, NULL, '{"FileName":"FH38PHiUBrEjWe0skhhSClbszh14BR-metaZHItYXJ5YS1jaXB0YS13aWRqYWphLmpwZw==-.jpg","FileDateTime":1760491285,"FileSize":119677,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"480\\" height=\\"612\\"","Height":612,"Width":480,"IsColor":1}}', NULL, '2025-10-15 01:21:47', '2025-10-15 01:21:47', NULL),
(8, 'public', 'media', 'public', '770829e2-ba7e-439d-ae5c-34b40dc9602e', 'media/770829e2-ba7e-439d-ae5c-34b40dc9602e.jpg', 480, 612, 142417, 'image/jpeg', 'jpg', NULL, 'dr-aswad-affandi', NULL, NULL, '{"FileName":"q6q112BH2zeBqPu7fV1tnytZ16Gl3y-metaZHItYXN3YWQtYWZmYW5kaS5qcGc=-.jpg","FileDateTime":1760491285,"FileSize":142417,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"480\\" height=\\"612\\"","Height":612,"Width":480,"IsColor":1}}', NULL, '2025-10-15 01:21:47', '2025-10-15 01:21:47', NULL),
(9, 'public', 'media', 'public', '27cd4d50-ae0b-4e92-b960-2d6038633d39', 'media/27cd4d50-ae0b-4e92-b960-2d6038633d39.jpg', 480, 612, 111726, 'image/jpeg', 'jpg', NULL, 'dr-riko-radityatama-susilo', NULL, NULL, '{"FileName":"FbNug9SJd5KYZwUPFagcY3vyLgND8b-metaZHItcmlrby1yYWRpdHlhdGFtYS1zdXNpbG8uanBn-.jpg","FileDateTime":1760491287,"FileSize":111726,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"480\\" height=\\"612\\"","Height":612,"Width":480,"IsColor":1}}', NULL, '2025-10-15 01:21:47', '2025-10-15 01:21:47', NULL),
(11, 'public', 'media', 'public', '3b253264-89eb-4ae3-9709-0e46eafa6540', 'media/3b253264-89eb-4ae3-9709-0e46eafa6540.jpg', 480, 612, 139558, 'image/jpeg', 'jpg', NULL, 'dr-juan-gunawan', NULL, NULL, '{"FileName":"AlEPunPSzTlmw8rwRlI66IJrLIWSOy-metaZHItanVhbi1ndW5hd2FuLmpwZw==-.jpg","FileDateTime":1760491300,"FileSize":139558,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"480\\" height=\\"612\\"","Height":612,"Width":480,"IsColor":1}}', NULL, '2025-10-15 01:21:47', '2025-10-15 01:21:47', NULL),
(12, 'public', 'media', 'public', 'c1b7e4c5-1833-4729-9895-5017a11949d0', 'media/c1b7e4c5-1833-4729-9895-5017a11949d0.jpg', 480, 612, 118848, 'image/jpeg', 'jpg', NULL, 'dr-satria-prawira-putra', NULL, NULL, '{"FileName":"9GAtt2XRCytbOf32WlhWMTHcvJMmT3-metaZHItc2F0cmlhLXByYXdpcmEtcHV0cmEuanBn-.jpg","FileDateTime":1760491304,"FileSize":118848,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"480\\" height=\\"612\\"","Height":612,"Width":480,"IsColor":1}}', NULL, '2025-10-15 01:21:47', '2025-10-15 01:21:47', NULL),
(13, 'public', 'media', 'public', '0abe4bd5-b8bd-4a80-937e-8d5a00a1b4bc', 'media/0abe4bd5-b8bd-4a80-937e-8d5a00a1b4bc.svg', NULL, NULL, 60907, 'image/svg+xml', 'svg', NULL, 'heart-screening', NULL, NULL, 'null', NULL, '2025-10-15 06:50:18', '2025-10-15 06:50:18', NULL),
(14, 'public', 'media', 'public', 'bc379661-525d-4533-97b2-fead49331db0', 'media/bc379661-525d-4533-97b2-fead49331db0.svg', NULL, NULL, 10179, 'image/svg+xml', 'svg', NULL, 'lite-checkup', NULL, NULL, 'null', NULL, '2025-10-15 06:50:18', '2025-10-15 06:50:18', NULL),
(15, 'public', 'media', 'public', '28c558f4-6db6-4840-931d-53146657b9bf', 'media/28c558f4-6db6-4840-931d-53146657b9bf.svg', NULL, NULL, 1645, 'image/svg+xml', 'svg', NULL, 'general-checkup', NULL, NULL, 'null', NULL, '2025-10-15 06:50:18', '2025-10-15 06:50:18', NULL),
(16, 'public', 'media', 'public', 'f9d7450b-3dcb-4dd8-8896-13d4d49b9448', 'media/f9d7450b-3dcb-4dd8-8896-13d4d49b9448.svg', NULL, NULL, 11646, 'image/svg+xml', 'svg', NULL, 'Vaccine', NULL, NULL, 'null', NULL, '2025-10-15 06:50:18', '2025-10-15 06:50:18', NULL),
(17, 'public', 'media', 'public', '06a96b47-0668-423e-a8f7-d51a8b53b79a', 'media/06a96b47-0668-423e-a8f7-d51a8b53b79a.jpg', 340, 340, 56054, 'image/jpeg', 'jpg', NULL, 'Image-sample', NULL, NULL, '{"FileName":"UIzjdk4ElMBD0060k9DTvSJpfnZaJb-metaSW1hZ2Utc2FtcGxlLmpwZw==-.jpg","FileDateTime":1760514214,"FileSize":56054,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"340\\" height=\\"340\\"","Height":340,"Width":340,"IsColor":1}}', NULL, '2025-10-15 07:43:37', '2025-10-15 07:43:37', NULL),
(18, 'public', 'media', 'public', 'cover-01', 'media/cover-01.jpg', 332, 332, 63435, 'image/jpeg', 'jpg', NULL, 'cover-01', NULL, NULL, '{"FileName":"YEtr8wx4xB9K8G4zdbI8DGXkaQtdVj-metaY292ZXItMDEuanBn-.jpg","FileDateTime":1760665501,"FileSize":63435,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"332\\" height=\\"332\\"","Height":332,"Width":332,"IsColor":1}}', NULL, '2025-10-17 01:45:04', '2025-10-17 01:45:04', NULL),
(19, 'public', 'media', 'public', '5fc40a54-c1f0-47ba-bfc4-77e2bef13f85', 'media/5fc40a54-c1f0-47ba-bfc4-77e2bef13f85.jpg', 1920, 1080, 173912, 'image/jpeg', 'jpg', NULL, 'slider-1', NULL, NULL, '{"FileName":"wMBcM2HiEylKgkzADEVgPWJd58FZ6b-metac2xpZGVyLTEuanBn-.jpg","FileDateTime":1760932329,"FileSize":173912,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1920\\" height=\\"1080\\"","Height":1080,"Width":1920,"IsColor":1}}', NULL, '2025-10-20 03:52:13', '2025-10-20 03:52:13', NULL),
(20, 'public', 'media', 'public', '027cecf6-6cc2-405a-9a7c-b3a198e8c53c', 'media/027cecf6-6cc2-405a-9a7c-b3a198e8c53c.jpg', 1920, 1080, 159113, 'image/jpeg', 'jpg', NULL, 'slider-2', NULL, NULL, '{"FileName":"saH29ft8UhR8U4bZxJyUUjXlvD54n7-metac2xpZGVyLTIuanBn-.jpg","FileDateTime":1760943196,"FileSize":159113,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1920\\" height=\\"1080\\"","Height":1080,"Width":1920,"IsColor":1}}', NULL, '2025-10-20 06:53:19', '2025-10-20 06:53:19', NULL),
(21, 'public', 'media', 'public', 'd8884c2b-5c97-4bff-84c7-20f6d8e0a711', 'media/d8884c2b-5c97-4bff-84c7-20f6d8e0a711.mp4', NULL, NULL, 13387967, 'video/mp4', 'mp4', NULL, 'Grapiku Portfolio Reels 2024', NULL, NULL, 'null', NULL, '2025-10-20 07:42:12', '2025-10-20 07:42:12', NULL),
(22, 'public', 'media', 'public', '3219c40f-5360-42a1-8e20-0e0eee019a5b', 'media/3219c40f-5360-42a1-8e20-0e0eee019a5b.jpg', 549, 730, 83968, 'image/jpeg', 'jpg', NULL, 'image-about-1', NULL, NULL, '{"FileName":"bx3AVz7PxVi0Y3J7w2uOTkGJ74OyuU-metaaW1hZ2UtYWJvdXQtMS5qcGc=-.jpg","FileDateTime":1761018824,"FileSize":83968,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"549\\" height=\\"730\\"","Height":730,"Width":549,"IsColor":1}}', NULL, '2025-10-21 03:54:05', '2025-10-21 03:54:05', NULL),
(23, 'public', 'media', 'public', '0d811353-7c40-4a31-93ec-6f90ac0af822', 'media/0d811353-7c40-4a31-93ec-6f90ac0af822.jpg', 600, 730, 80315, 'image/jpeg', 'jpg', NULL, 'image-about-2', NULL, NULL, '{"FileName":"DBgdlfxl6xVqSKIQeq3RYFKWQOXzDm-metaaW1hZ2UtYWJvdXQtMi5qcGc=-.jpg","FileDateTime":1761019600,"FileSize":80315,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"600\\" height=\\"730\\"","Height":730,"Width":600,"IsColor":1}}', NULL, '2025-10-21 04:06:42', '2025-10-21 04:06:42', NULL),
(24, 'public', 'media', 'public', 'd79a3889-a964-4659-be3f-e8d4d01f88e3', 'media/d79a3889-a964-4659-be3f-e8d4d01f88e3.jpg', 451, 332, 152271, 'image/jpeg', 'jpg', NULL, 'Image-visi', NULL, NULL, '{"FileName":"LyIJ0nUnp85XgSLE14yvz4MnAEhcum-metaSW1hZ2UtdmlzaS5qcGc=-.jpg","FileDateTime":1761019775,"FileSize":152271,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"451\\" height=\\"332\\"","Height":332,"Width":451,"IsColor":1}}', NULL, '2025-10-21 04:09:38', '2025-10-21 04:09:38', NULL),
(25, 'public', 'media', 'public', 'a9ec6c5b-ca29-46e2-96f3-c3ba0fb68f38', 'media/a9ec6c5b-ca29-46e2-96f3-c3ba0fb68f38.jpg', 475, 332, 176280, 'image/jpeg', 'jpg', NULL, 'Image-misi', NULL, NULL, '{"FileName":"KyqwZIRURwjGrgd7yxniCaArj631oz-metaSW1hZ2UtbWlzaS5qcGc=-.jpg","FileDateTime":1761019784,"FileSize":176280,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"475\\" height=\\"332\\"","Height":332,"Width":475,"IsColor":1}}', NULL, '2025-10-21 04:09:47', '2025-10-21 04:09:47', NULL),
(26, 'public', 'media', 'public', 'e40fb37c-ad18-4c16-9f61-b1f75db2062b', 'media/e40fb37c-ad18-4c16-9f61-b1f75db2062b.svg', NULL, NULL, 8519, 'image/svg+xml', 'svg', NULL, 'Perawatan-yang-dipersonalisasi', NULL, NULL, 'null', NULL, '2025-10-21 04:12:12', '2025-10-21 04:12:12', NULL),
(27, 'public', 'media', 'public', 'd264c882-e4e2-45ea-896b-f50621a6269a', 'media/d264c882-e4e2-45ea-896b-f50621a6269a.svg', NULL, NULL, 19975, 'image/svg+xml', 'svg', NULL, 'Profesional-Kesehatan', NULL, NULL, 'null', NULL, '2025-10-21 04:12:12', '2025-10-21 04:12:12', NULL),
(28, 'public', 'media', 'public', '20f2e683-fdab-4a85-b5e8-9c710accd20f', 'media/20f2e683-fdab-4a85-b5e8-9c710accd20f.svg', NULL, NULL, 5036, 'image/svg+xml', 'svg', NULL, 'Lingkungan', NULL, NULL, 'null', NULL, '2025-10-21 04:12:12', '2025-10-21 04:12:12', NULL),
(29, 'public', 'media', 'public', 'f8da3cd0-7f93-402c-bfc9-0d14c75317fa', 'media/f8da3cd0-7f93-402c-bfc9-0d14c75317fa.svg', NULL, NULL, 11486, 'image/svg+xml', 'svg', NULL, 'Layanan-Medis', NULL, NULL, 'null', NULL, '2025-10-21 04:12:12', '2025-10-21 04:12:12', NULL),
(30, 'public', 'media', 'public', '7041d1cc-13b2-4b19-9321-5bd6bfe92663', 'media/7041d1cc-13b2-4b19-9321-5bd6bfe92663.svg', NULL, NULL, 7986, 'image/svg+xml', 'svg', NULL, 'Komitmen', NULL, NULL, 'null', NULL, '2025-10-21 04:12:12', '2025-10-21 04:12:12', NULL),
(31, 'public', 'media', 'public', '715ecab7-e8ab-4d18-9d8a-28300432b7d3', 'media/715ecab7-e8ab-4d18-9d8a-28300432b7d3.svg', NULL, NULL, 8800, 'image/svg+xml', 'svg', NULL, 'Fasilitas-dan-Peralatan', NULL, NULL, 'null', NULL, '2025-10-21 04:12:12', '2025-10-21 04:12:12', NULL),
(32, 'public', 'media', 'public', 'e95dda7f-7ed5-4e5f-aae4-87afe332b4a5', 'media/e95dda7f-7ed5-4e5f-aae4-87afe332b4a5.png', 569, 579, 475944, 'image/png', 'png', NULL, 'Image-about', NULL, NULL, 'null', NULL, '2025-10-21 06:35:14', '2025-10-21 06:35:14', NULL),
(33, 'public', 'media', 'public', '81abe999-913a-461e-a504-8979ebdd97cc', 'media/81abe999-913a-461e-a504-8979ebdd97cc.jpg', 1920, 800, 250179, 'image/jpeg', 'jpg', NULL, 'image-home', NULL, NULL, '{"FileName":"VTbfzlRY7KzyPsGqhMbx3QkmtNgURf-metaaW1hZ2UtaG9tZS5qcGc=-.jpg","FileDateTime":1761028670,"FileSize":250179,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1920\\" height=\\"800\\"","Height":800,"Width":1920,"IsColor":1}}', NULL, '2025-10-21 06:37:53', '2025-10-21 06:37:53', NULL),
(34, 'public', 'media', 'public', '055e39c1-bc74-4fd1-8820-37f560ea7e01', 'media/055e39c1-bc74-4fd1-8820-37f560ea7e01.jpg', 1920, 700, 151055, 'image/jpeg', 'jpg', NULL, 'hero-medical-profesional', NULL, NULL, '{"FileName":"wjVcSCqYhcv9hBLRs3VKUyzQ6cvL7n-metaaGVyby1tZWRpY2FsLXByb2Zlc2lvbmFsLmpwZw==-.jpg","FileDateTime":1761032175,"FileSize":151055,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1920\\" height=\\"700\\"","Height":700,"Width":1920,"IsColor":1}}', NULL, '2025-10-21 07:36:36', '2025-10-21 07:36:36', NULL),
(35, 'public', 'media', 'public', '16688dda-8445-4a2a-abb4-8fd91f327e09', 'media/16688dda-8445-4a2a-abb4-8fd91f327e09.jpg', 1920, 700, 136692, 'image/jpeg', 'jpg', NULL, 'hero-career', NULL, NULL, '{"FileName":"TlI75hRstZc9aUlg45E4ghwgPFwtfb-metaaGVyby1jYXJlZXIuanBn-.jpg","FileDateTime":1761032850,"FileSize":136692,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1920\\" height=\\"700\\"","Height":700,"Width":1920,"IsColor":1}}', NULL, '2025-10-21 07:47:35', '2025-10-21 07:47:35', NULL),
(36, 'public', 'media', 'public', '1c12a63b-53fc-4f01-868d-f8af8b397321', 'media/1c12a63b-53fc-4f01-868d-f8af8b397321.jpg', 1400, 494, 84807, 'image/jpeg', 'jpg', NULL, 'hero-about', NULL, NULL, '{"FileName":"yNoa2VDc1pJbH64mOaw3SrJMecMK4i-metaaGVyby1hYm91dC5qcGc=-.jpg","FileDateTime":1761038011,"FileSize":84807,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":null,"COMPUTED":{"html":"width=\\"1400\\" height=\\"494\\"","Height":494,"Width":1400,"IsColor":1}}', NULL, '2025-10-21 09:13:33', '2025-10-21 09:13:33', NULL),
(37, 'public', 'media', 'public', '8e0c073f-b30a-4e14-8a74-b19b63997811', 'media/8e0c073f-b30a-4e14-8a74-b19b63997811.svg', NULL, NULL, 1638, 'image/svg+xml', 'svg', NULL, 'tiktok', NULL, NULL, 'null', NULL, '2025-10-24 02:49:47', '2025-10-24 02:49:47', NULL),
(38, 'public', 'media', 'public', 'ab0010ec-5763-4e91-9dd7-a08558113e41', 'media/ab0010ec-5763-4e91-9dd7-a08558113e41.svg', NULL, NULL, 998, 'image/svg+xml', 'svg', NULL, 'youtube', NULL, NULL, 'null', NULL, '2025-10-24 02:49:47', '2025-10-24 02:49:47', NULL),
(39, 'public', 'media', 'public', '26c557a8-21ec-46c3-8473-e9fabd38baf5', 'media/26c557a8-21ec-46c3-8473-e9fabd38baf5.svg', NULL, NULL, 747, 'image/svg+xml', 'svg', NULL, 'instagram', NULL, NULL, 'null', NULL, '2025-10-24 02:49:47', '2025-10-24 02:49:47', NULL);

-- pages table
INSERT INTO pages (id, title, slug, `view`, image, content, is_published, created_at, updated_at, controller, route_name, route_name_detail) VALUES
(9, '{"en":"Home","id":"Beranda"}', '{"en":"/","id":"/"}', 'pages.home.index', NULL, '{"en":{"about":{"image":32,"title":"Experience peace of mind","heading":"When Your Health, Is Our Priority","button_label":"Learn More About Us","content":"<p>Altius Hospitals delivers international-standard healthcare with the genuine warmth of Indonesian hospitality. Supported by advanced medical technology and experienced professionals, we are committed to providing the highest quality care for your optimal health and peace of mind.</p>"},"testimony":{"title":"Medical Testimony","heading":"Experience trusted Healthcare"},"full_screen":{"image":33},"health_screening":{"title":"Your Health, Your Priority","heading":"Discover Our Health Screening Package","button_label":"More Health Screening Package"},"offer":{"title":"Your Health, Your Priority","heading":"Latest Offers","button_label":"Discovers More Offers"}},"id":{"about":{"image":32,"title":"Rasakan ketenangan pikiran","heading":"Ketika Kesehatan Anda, Adalah Prioritas Kami","content":"<p>Rumah Sakit Altius menyediakan layanan kesehatan berstandar internasional dengan kehangatan sejati dari keramahan Indonesia. Didukung oleh teknologi medis canggih dan tenaga profesional berpengalaman, kami berkomitmen untuk memberikan perawatan berkualitas tertinggi demi kesehatan optimal dan ketenangan pikiran Anda.</p>","button_label":"Pelajari Lebih Lanjut Tentang Kami"},"full_screen":{"image":33},"testimony":{"title":"Saksi Ahli Medis","heading":"Nikmati layanan kesehatan yang terpercaya"},"health_screening":{"title":"Kesehatan Anda, Prioritas Anda","heading":"Temukan Paket Pemeriksaan Kesehatan Kami","button_label":"Paket Pemeriksaan Kesehatan Lebih Lengkap"},"offer":{"title":"Kesehatan Anda, Prioritas Anda","heading":"Penawaran Terbaru","button_label":"Temukan Penawaran Lainnya"}}}', 0, '2025-10-21 09:10:33', '2025-10-23 07:08:29', 'App\\Http\\Controllers\\Pages\\HomeController', 'home', NULL),
(10, '{"en":"About Altius Hospitals","id":"Tentang Rumah Sakit Altius"}', '{"en":"about","id":"tentang"}', 'pages.about.index', '36', '{"en":{"heading":{"heading":"Altius Hospitals is a hospital built by doctors","colored_heading":"with best practices in mind"},"about_us":{"image":22,"title":"Who we are","heading":"The Story of Altius Hospitals","content":"<p>Altius Hospitals was founded from the dream of Dr. Hartoyo Sutandar, a pioneer of Indonesian cardiology in the 1980s.</p>"}}}', 0, '2025-10-21 09:20:33', '2025-10-23 07:08:53', 'App\\Http\\Controllers\\Pages\\AboutController', 'about', NULL),
(11, '{"en":"Our Location","id":"Lokasi Kami"}', '{"en":"our-location","id":"lokasi-kami"}', 'pages.location.index', NULL, '{"en":{"section":{"title":"Our Location","heading":"Find an Altius Hospital near you"}},"id":{"section":{"title":"Lokasi Kami","heading":"Temukan Rumah Sakit Altius terdekat dari Anda"}}}', 0, '2025-10-21 13:53:47', '2025-10-23 07:09:00', 'App\\Http\\Controllers\\Pages\\LocationController', 'location', 'locationDetail'),
(12, '{"en":"Career","id":"Karier"}', '{"en":"career","id":"karir"}', 'pages.career.index', '35', '{"en":{"section":{"heading":"Career","subheading":"Join our team and make a difference"}}}', 0, '2025-10-21 13:56:30', '2025-10-23 07:09:09', 'App\\Http\\Controllers\\Pages\\CareerController', 'career', 'careerDetail'),
(13, '{"en":"Health Screening","id":"Pemeriksaan Kesehatan"}', '{"en":"health-screening","id":"pemeriksaan-kesehatan"}', 'pages.health-screening.index', NULL, '{"en":{"section":{"title":"Health Screening","heading":"Your Health in Your Hands"}},"id":{"section":{"title":"Pemeriksaan Kesehatan","heading":"Kesehatan Anda di Tangan Anda"}}}', 0, '2025-10-21 13:58:17', '2025-10-23 07:09:42', 'App\\Http\\Controllers\\Pages\\ScreeningController', 'screening', NULL),
(14, '{"en":"Medical Professional","id":"Tenaga Medis"}', '{"en":"medical-professional","id":"tenaga-medis"}', 'pages.medical-professional.index', '34', '{"en":{"section":{"heading":"Doctors and Medical Staff","subheading":"Explore Our Doctors by Using the Options Below"}},"id":{"section":{"heading":"Dokter dan Tenaga Medis","subheading":"Jelajahi Dokter Kami dengan Menggunakan Opsi di Bawah Ini"}}}', 0, '2025-10-21 13:59:24', '2025-10-23 07:09:52', 'App\\Http\\Controllers\\Pages\\DoctorController', 'doctor', 'doctorDetail'),
(15, '{"en":"News","id":"Berita"}', '{"en":"news","id":"berita"}', 'pages.news.index', '34', '{"en":{"section":{"heading":"News","subheading":"Stay Connected, Stay Healthy"}}}', 0, '2025-10-21 14:00:10', '2025-10-23 07:10:04', 'App\\Http\\Controllers\\Pages\\NewsController', 'news', 'newsDetail'),
(16, '{"en":"Offers","id":"Penawaran"}', '{"en":"offers","id":"penawaran"}', 'pages.offers.index', NULL, '{"en":{"section":{"title":"Get Now","heading":"Special Offers"}},"id":{"section":{"title":"Dapatkan Sekarang","heading":"Penawaran Khusus"}}}', 0, '2025-10-21 14:03:16', '2025-10-23 07:10:10', 'App\\Http\\Controllers\\OffersController', 'offers', NULL),
(17, '{"en":"Contact Us","id":"Hubungi Kami"}', '{"en":"contact-us","id":"hubungi-kami"}', 'pages.contact.index', NULL, '{"en":{"section":{"heading":"Contact Us","subheading":"Addresses and Phone Numbers"}}}', 0, '2025-10-23 08:33:05', '2025-10-23 08:35:42', 'App\\Http\\Controllers\\Pages\\ContactController', 'contact', NULL),
(18, '{"en":"Privacy Policy","id":"Kebijakan Privasi"}', '{"en":"privacy-policy","id":"kebijakan-privasi"}', 'pages.privacy.index', NULL, '{"en":{"content":"Privacy Policy Content"}}', 0, '2025-10-24 07:01:03', '2025-10-24 07:48:07', 'App\\Http\\Controllers\\Pages\\PrivacyController', 'privacy', NULL),
(19, '{"en":"Terms & Conditions","id":""}', '{"en":"terms-conditions","id":""}', 'pages.terms.index', NULL, '{"en":{"content":"Terms and Conditions Content","faq":[]}}', 0, '2025-10-24 07:23:57', '2025-10-24 08:02:39', 'App\\Http\\Controllers\\Pages\\TermsController', 'terms', NULL);

-- locations table
INSERT INTO locations (id, title, slug, heading, about_title, about_description, image, address, general_number, customer_care, link_maps, link_embedded, is_published, created_at, updated_at, `index`, cover_image, about_speciality) VALUES
(1, '{"en":"Altius Hospitals Harapan Indah"}', '{"en":"altius-hospitals-harapan-indah"}', '{"en":"Altius Hospitals Harapan Indah"}', '{"en":"When Your Health Is Our Priority"}', '{"en":"<p>Altius Hospitals, established in 2023, is a multi-specialty general hospital located in Kota Harapan Indah, Bekasi.</p>"}', '{"en":2}', '{"en":"Jl. Harapan Indah Boulevard Sektor V, Pusaka Rakyat, Kec. Tarumajaya, Kab. Bekasi, Jawa Barat 17214"}', '{"en":"021-3000 8877"}', '{"en":"0857 8877 8877"}', '{"en":"https://maps.app.goo.gl/7MXPsZJkdr1bqq4AA"}', '{"en":"<iframe src=\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5010.180261315358!2d106.98206359999999!3d-6.154437099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b3ab886b6fb%3A0x781659f27c35be4e!2sAltius%20Hospitals%20Harapan%20Indah!5e1!3m2!1sen!2sid!4v1759898052402!5m2!1sen!2sid\\" width=\\"400\\" height=\\"300\\" style=\\"border:0;\\" allowfullscreen=\\"\\" loading=\\"lazy\\" referrerpolicy=\\"no-referrer-when-downgrade\\"></iframe>"}', 1, '2025-10-08 04:34:27', '2025-10-08 04:34:27', 1, '{"en":2}', '[\"7\",\"28\",\"3\"]'),
(2, '{"en":"Altius Hospitals Puri Indah"}', '{"en":"altius-hospitals-puri-indah"}', '{"en":"Altius Hospitals Puri Indah"}', '{"en":"When Your Health Is Our Priority"}', '{"en":"<p>Altius Hospitals, established in 2023, is a multi-specialty general hospital.</p>"}', '{"en":2}', '{"en":"Jl. Harapan Indah Boulevard Sektor V, Pusaka Rakyat, Kec. Tarumajaya, Kab. Bekasi, Jawa Barat 17214"}', '{"en":"021-3000 8877"}', '{"en":"0857 8877 8877"}', '{"en":"https://maps.app.goo.gl/7MXPsZJkdr1bqq4AA"}', '{"en":"<iframe src=\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5010.180261315358!2d106.98206359999999!3d-6.154437099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b3ab886b6fb%3A0x781659f27c35be4e!2sAltius%20Hospitals%20Harapan%20Indah!5e1!3m2!1sen!2sid!4v1759898052402!5m2!1sen!2sid\\" width=\\"400\\" height=\\"300\\" style=\\"border:0;\\" allowfullscreen=\\"\\" loading=\\"lazy\\" referrerpolicy=\\"no-referrer-when-downgrade\\"></iframe>"}', 1, '2025-10-14 07:38:51', '2025-10-14 07:38:51', 2, '{"en":2}', '[\"7\",\"28\",\"3\"]');

-- specialities table
INSERT INTO specialities (id, title, created_at, updated_at, slug, image, content) VALUES
(3, '{"en":"Orthopaedic","id":"Ortopedi"}', '2025-10-08 01:53:19', '2025-10-13 08:34:38', '{"en":"orthopaedic","id":"ortopedi"}', '{"id":""}', '{"en":"<p>Orthopaedic content</p>","id":""}'),
(4, '{"en":"General Surgery","id":"Bedah Umum"}', '2025-10-08 01:53:44', '2025-10-08 07:29:20', '{"en":"general-surgery","id":"bedah-umum"}', '{"en":[]}', '{"en":null}'),
(5, '{"en":"Obstetrics & Gynaecology (Obgyn)","id":"Obstetri dan Ginekologi (Obgyn)"}', '2025-10-08 01:54:39', '2025-10-08 07:29:49', '{"en":"obstetrics-gynaecology-obgyn","id":"obstetri-dan-ginekologi-obgyn"}', '{"en":[]}', '{"en":null}'),
(6, '{"en":"ENT Specialist","id":"Spesialis THT"}', '2025-10-08 01:54:57', '2025-10-08 07:30:18', '{"en":"ent-specialist","id":"spesialis-tht"}', '{"en":[]}', '{"en":null}'),
(7, '{"en":"Urology","id":"Urologi"}', '2025-10-08 01:55:18', '2025-10-08 07:30:46', '{"en":"urology","id":"urologi"}', '{"en":[]}', '{"en":null}'),
(8, '{"en":"Anesthesiologist","id":"Dokter anestesi"}', '2025-10-08 01:55:37', '2025-10-08 07:31:16', '{"en":"anesthesiologist","id":"dokter-anestesi"}', '{"en":[]}', '{"en":null}'),
(9, '{"en":"Pulmonologist","id":"Spesialis Paru"}', '2025-10-08 01:55:52', '2025-10-08 07:31:45', '{"en":"pulmonologist","id":"spesialis-paru"}', '{"en":[]}', '{"en":null}'),
(10, '{"en":"Internist","id":"Dokter Spesialis Penyakit Dalam"}', '2025-10-08 01:56:09', '2025-10-08 07:32:16', '{"en":"internist","id":"dokter-spesialis-penyakit-dalam"}', '{"en":[]}', '{"en":null}'),
(11, '{"en":"Radiologist","id":"Ahli Radiologi"}', '2025-10-08 01:56:25', '2025-10-08 07:32:46', '{"en":"radiologist","id":"ahli-radiologi"}', '{"en":[]}', '{"en":null}'),
(12, '{"en":"Neurologist","id":"Ahli saraf"}', '2025-10-08 01:56:41', '2025-10-08 07:33:16', '{"en":"neurologist","id":"ahli-saraf"}', '{"en":[]}', '{"en":null}'),
(13, '{"en":"Dentist","id":"Dokter gigi"}', '2025-10-08 01:56:54', '2025-10-08 07:33:52', '{"en":"dentist","id":"dokter-gigi"}', '{"en":[]}', '{"en":null}'),
(27, '{"en":"Pediatric","id":"Pediatri"}', '2025-10-08 02:37:47', '2025-10-08 07:34:22', '{"en":"pediatric","id":"pediatri"}', '{"en":[]}', '{"en":null}'),
(28, '{"en":"Cardiology","id":"Kardiologi"}', '2025-10-08 02:38:49', '2025-10-08 07:15:44', '{"en":"cardiology","id":""}', '{"id":""}', '{"id":""}'),
(31, '{"en":"Thoracic and Cardiovascular Surgery","id":"Bedah Toraks dan Kardiovaskular"}', '2025-10-15 02:04:57', '2025-10-15 02:05:20', '{"en":"thoracic-and-cardiovascular-surgery","id":"bedah-toraks-dan-kardiovaskular"}', '{"en":[]}', '{"en":""}');

-- location_has_specialities table
INSERT INTO location_has_specialities (id, location_id, speciality_id, created_at, updated_at) VALUES
(3, 1, 28, '2025-10-08 07:26:57', '2025-10-08 07:26:57'),
(7, 1, 4, '2025-10-08 07:29:20', '2025-10-08 07:29:20'),
(9, 1, 5, '2025-10-08 07:29:49', '2025-10-08 07:29:49'),
(11, 1, 6, '2025-10-08 07:30:18', '2025-10-08 07:30:18'),
(13, 1, 7, '2025-10-08 07:30:46', '2025-10-08 07:30:46'),
(15, 1, 8, '2025-10-08 07:31:16', '2025-10-08 07:31:16'),
(17, 1, 9, '2025-10-08 07:31:45', '2025-10-08 07:31:45'),
(19, 1, 10, '2025-10-08 07:32:16', '2025-10-08 07:32:16'),
(21, 1, 11, '2025-10-08 07:32:46', '2025-10-08 07:32:46'),
(23, 1, 12, '2025-10-08 07:33:16', '2025-10-08 07:33:16'),
(25, 1, 13, '2025-10-08 07:33:52', '2025-10-08 07:33:52'),
(27, 1, 27, '2025-10-08 07:34:22', '2025-10-08 07:34:22'),
(28, 1, 3, '2025-10-13 08:34:38', '2025-10-13 08:34:38'),
(30, 1, 31, '2025-10-15 02:05:20', '2025-10-15 02:05:20');

-- coes table
INSERT INTO coes (id, created_at, updated_at, title, slug, image, content) VALUES
(2, '2025-10-08 07:49:59', '2025-10-08 07:56:02', '{"en":"Cardiac Center","id":"Pusat Jantung"}', '{"en":"cardiac-center","id":"pusat-jantung"}', '{"en":[]}', '{"en":null}'),
(3, '2025-10-08 07:56:30', '2025-10-09 10:03:06', '{"en":"Woman & Children Center","id":"Pusat Pelayanan Perempuan dan Anak"}', '{"en":"woman-children-center","id":"pusat-pelayanan-perempuan-dan-anak"}', '{"id":""}', '{"id":""}'),
(4, '2025-10-08 07:57:45', '2025-10-08 07:58:17', '{"en":"Orthopedic Center","id":"Pusat Ortopedi"}', '{"en":"orthopedic-center","id":"pusat-ortopedi"}', '{"en":[]}', '{"en":""}');

-- location_has_coes table
INSERT INTO location_has_coes (id, location_id, coe_id, created_at, updated_at) VALUES
(2, 1, 2, '2025-10-08 07:55:40', '2025-10-08 07:55:40'),
(3, 1, 2, '2025-10-08 07:56:02', '2025-10-08 07:56:02'),
(4, 1, 3, '2025-10-08 07:56:30', '2025-10-08 07:56:30'),
(5, 1, 3, '2025-10-08 07:57:18', '2025-10-08 07:57:18'),
(6, 1, 4, '2025-10-08 07:57:45', '2025-10-08 07:57:45'),
(7, 1, 4, '2025-10-08 07:58:17', '2025-10-08 07:58:17'),
(8, 1, 3, '2025-10-09 10:03:06', '2025-10-09 10:03:06'),
(9, 1, 3, '2025-10-09 10:03:06', '2025-10-09 10:03:06');

-- services table
INSERT INTO services (id, slug, title, created_at, updated_at) VALUES
(1, '{"en":"radiology-services","id":""}', '{"en":"Radiology Services","id":""}', '2025-10-08 01:58:13', '2025-10-08 01:59:10'),
(2, '{"en":"laboratory-services","id":"layanan-laborat"}', '{"en":"Laboratory Services","id":"Layanan Laborat"}', '2025-10-08 02:18:00', '2025-10-08 02:47:09');

-- subservices table
INSERT INTO subservices (id, service_id, slug, title, content, image, created_at, updated_at) VALUES
(1, 1, '{"en":"bone-mineral-densitometry","id":"densitometri-mineral-tulang"}', '{"en":"Bone Mineral Densitometry","id":"Densitometri Mineral Tulang"}', '{"en":null}', NULL, '2025-10-08 01:59:08', '2025-10-08 08:36:10'),
(2, 1, '{"en":"cath-lab","id":"laboratorium-kateterisasi-jantung"}', '{"en":"Cath Lab","id":"Laboratorium Kateterisasi Jantung"}', '{"en":null}', NULL, '2025-10-08 02:13:22', '2025-10-09 08:54:14'),
(3, 1, '{"en":"computed-tomography-ct-scan","id":"ct-scan-tomografi-terkomputasi"}', '{"en":"Computed Tomography (CT) Scan","id":"CT Scan (Tomografi Terkomputasi)"}', '{"id":null}', NULL, '2025-10-08 02:14:52', '2025-10-08 02:15:54'),
(4, 1, '{"en":"digital-x-ray","id":"rontgen-digital"}', '{"en":"Digital X-Ray","id":"Rontgen Digital"}', '{"id":null}', NULL, '2025-10-08 02:16:13', '2025-10-08 02:16:40'),
(5, 1, '{"en":"ultrasound-scan","id":"usg-ultrasonografi"}', '{"en":"Ultrasound Scan","id":"USG (Ultrasonografi)"}', '{"id":null}', NULL, '2025-10-08 02:17:06', '2025-10-08 02:17:35'),
(6, 2, '{"en":"blood-bank","id":"unit-transfusi-darah-utd"}', '{"en":"Blood Bank","id":"Unit Transfusi Darah (UTD)"}', '{"en":null}', NULL, '2025-10-08 02:18:24', '2025-10-09 09:51:13'),
(7, 2, '{"en":"clinical-histopathology","id":"histopatologi-klinis"}', '{"en":"Clinical Histopathology","id":"Histopatologi Klinis"}', '{"en":null}', NULL, '2025-10-08 02:19:33', '2025-10-09 09:51:48'),
(8, 2, '{"en":"clinical-microbiology","id":"mikrobiologi-klinik"}', '{"en":"Clinical Microbiology","id":"Mikrobiologi Klinik"}', '{"id":null}', NULL, '2025-10-08 02:20:24', '2025-10-08 02:20:41');

-- location_has_subservices table
INSERT INTO location_has_subservices (id, location_id, subservice_id, service_id, created_at, updated_at) VALUES
(3, 1, 1, 1, '2025-10-08 08:41:54', '2025-10-08 08:41:54'),
(4, 1, 2, 1, '2025-10-09 08:54:14', '2025-10-09 08:54:14'),
(5, 1, 6, 2, '2025-10-09 09:51:13', '2025-10-09 09:51:13'),
(6, 1, 7, 2, '2025-10-09 09:51:48', '2025-10-09 09:51:48');

-- facilities table
INSERT INTO facilities (id, slug, title, content, image, created_at, updated_at) VALUES
(3, '{"en":"nicu","id":""}', '{"en":"NICU","id":""}', '{"id":""}', NULL, '2025-10-13 04:04:08', '2025-10-13 04:04:59'),
(4, '{"en":"er-ambulance"}', '{"en":"ER & Ambulance"}', '{"en":null}', NULL, '2025-10-13 04:05:16', '2025-10-13 04:05:16'),
(5, '{"en":"picu"}', '{"en":"PICU"}', '{"en":null}', NULL, '2025-10-13 04:05:29', '2025-10-13 04:05:29');

-- location_has_facilities table
INSERT INTO location_has_facilities (id, location_id, facility_id, created_at, updated_at) VALUES
(10, 1, 3, '2025-10-13 04:04:59', '2025-10-13 04:04:59'),
(11, 1, 4, '2025-10-13 04:05:16', '2025-10-13 04:05:16'),
(12, 1, 5, '2025-10-13 04:05:30', '2025-10-13 04:05:30');

-- emergencies table
INSERT INTO emergencies (id, slug, title, content, image, created_at, updated_at) VALUES
(2, '{"en":"24-hour-emergency-department","id":""}', '{"en":"24-Hour Emergency Department","id":""}', '{"id":""}', NULL, '2025-10-13 04:27:39', '2025-10-13 04:27:54');

-- location_has_emergencies table
INSERT INTO location_has_emergencies (id, location_id, emergency_id, created_at, updated_at) VALUES
(4, 1, 2, '2025-10-13 04:27:54', '2025-10-13 04:27:54');

-- departments table
INSERT INTO departments (id, title, created_at, updated_at) VALUES
(1, '{"en":"Nurse","id":"Perawat"}', '2025-10-13 07:29:17', '2025-10-13 07:29:29'),
(2, '{"en":"Administration","id":"Administrasi"}', '2025-10-13 07:32:34', '2025-10-13 07:32:44'),
(3, '{"en":"Health Information Management","id":"Manajemen Informasi Kesehatan"}', '2025-10-13 07:36:35', '2025-10-13 07:37:23'),
(4, '{"en":"Sales","id":"Penjualan"}', '2025-10-13 07:37:51', '2025-10-13 07:38:19'),
(5, '{"en":"Manager","id":"Manajer"}', '2025-10-13 07:38:47', '2025-10-13 07:39:14'),
(6, '{"en":"Radiographer","id":"Ahli Radiologi"}', '2025-10-13 07:39:53', '2025-10-13 07:40:33');

-- career_categories table
INSERT INTO career_categories (id, title, created_at, updated_at) VALUES
(1, '{"en":"Medical","id":"Medis"}', '2025-10-13 08:15:14', '2025-10-13 08:15:47'),
(2, '{"en":"Non-Medical","id":"Non-Medis"}', '2025-10-13 08:15:20', '2025-10-13 08:15:53');

-- careers table (simplified - add more as needed)
INSERT INTO careers (id, career_category_id, slug, title, location_id, department_id, qualification, description, created_at, updated_at) VALUES
(1, NULL, '{"en":"medical-record-staff","id":"staf-rekam-medis"}', '{"en":"Medical Record Staff","id":"Staf Rekam Medis"}', 1, 3, '{"en":"Minimum Bachelor\'s Degree from Medical Records major","id":"Sarjana (S1) dalam bidang Rekam Medis"}', '{"en":"Responsible for medical records","id":"Bertanggung jawab atas rekam medis"}', '2025-10-13 09:22:29', '2025-10-14 02:18:28'),
(3, NULL, '{"en":"sales-executive","id":"eksekutif-penjualan"}', '{"en":"Sales Executive","id":"Eksekutif Penjualan"}', 1, 4, '{"en":"Bachelor Degree with at least 1 year experience","id":"Gelar Sarjana dengan pengalaman minimal 1 tahun"}', '{"en":"Coordinate sales programs","id":"Mengkoordinasikan program penjualan"}', '2025-10-14 02:14:03', '2025-10-14 02:24:59');

-- news_categories table
INSERT INTO news_categories (id, title, created_at, updated_at) VALUES
(1, '{"en":"News","id":"Berita"}', '2025-10-14 02:17:08', '2025-10-14 02:17:16');

-- news table
INSERT INTO news (id, title, slug, news_category_id, image, content, created_at, updated_at) VALUES
(3, '{"en":"Altius Hospitals Inaugurates Heart and Lung Center with Modern Technology","id":"Altius Hospitals Resmikan Pusat Jantung dan Paru dengan Teknologi Modern"}', '{"en":"altius-hospitals-inaugurates-heart-and-lung-center-with-modern-technology","id":"altius-hospitals-resmikan-pusat-jantung-dan-paru-dengan-teknologi-modern"}', 1, '3', '{"en":"Altius Hospitals has made another breakthrough by inaugurating the Heart and Lung Center.","id":"Rumah Sakit Altius telah mencatatkan terobosan baru dengan meresmikan Pusat Jantung dan Paru-paru."}', '2025-10-14 03:10:12', '2025-10-14 06:46:20');
