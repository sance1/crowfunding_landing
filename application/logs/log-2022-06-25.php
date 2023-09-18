<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-25 12:30:59 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 12:34:14 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 12:34:44 --> Severity: Warning --> fsockopen(): php_network_getaddresses: getaddrinfo failed: No such host is known.  D:\Sance\Xampp10\htdocs\crowfunding_landing\system\libraries\Email.php 2063
ERROR - 2022-06-25 12:34:44 --> Severity: Warning --> fsockopen(): Unable to connect to srv87.niagahoster.com:587 (php_network_getaddresses: getaddrinfo failed: No such host is known. ) D:\Sance\Xampp10\htdocs\crowfunding_landing\system\libraries\Email.php 2063
ERROR - 2022-06-25 12:38:41 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 12:41:01 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 13:20:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:20:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:21:57 --> Query error: View 'crowfunding.v_transaksi_jual' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them - Invalid query: SELECT SUM(`lembar_saham`) AS `lembar_saham`, SUM(`order_saham`) AS `order_saham`, `harga_saham`
FROM `v_transaksi_jual`
WHERE `status` != 'match'
AND `id_properti` = '35'
AND `keterangan` = 'jual'
GROUP BY `harga_saham`
ERROR - 2022-06-25 13:21:57 --> Severity: error --> Exception: Call to a member function result() on bool D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 72
ERROR - 2022-06-25 13:21:57 --> Query error: View 'crowfunding.v_transaksi_beli' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them - Invalid query: SELECT SUM(`lembar_saham`) AS `lembar_saham`, SUM(`order_saham`) AS `order_saham`, `harga_saham`
FROM `v_transaksi_beli`
WHERE `status` != 'match'
AND `keterangan` = 'beli'
AND `id_properti` = '35'
GROUP BY `harga_saham`
ERROR - 2022-06-25 13:21:57 --> Severity: error --> Exception: Call to a member function result() on bool D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 53
ERROR - 2022-06-25 13:21:57 --> Query error: View 'crowfunding.v_transaksi_beli' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them - Invalid query: SELECT *
FROM `v_transaksi_beli`
WHERE `keterangan` = 'beli'
AND `status` != 'Match'
ORDER BY `create_date` ASC
ERROR - 2022-06-25 13:21:57 --> Severity: error --> Exception: Call to a member function result() on bool D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 163
ERROR - 2022-06-25 13:22:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:22:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:22:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:23:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:23:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:23:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:25:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:25:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:25:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:26:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:26:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:26:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:26:26 --> Severity: Warning --> Undefined variable $lembarSaham D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 121
ERROR - 2022-06-25 13:26:26 --> Query error: Column 'convert_lembar_saham' cannot be null - Invalid query: INSERT INTO `tb_transaksi_jual_beli` (`id_properti`, `email`, `lembar_saham`, `harga_saham`, `order_saham`, `status`, `keterangan`, `create_date`, `modified_date`, `convert_lembar_saham`) VALUES ('35', 'izulluzi@yahoo.com', '2', '1000', 1, 'Parsial Match', 'jual', '2022-06-25 13:26:26', '2022-06-25 13:26:26', NULL)
ERROR - 2022-06-25 13:26:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:26:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:26:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:27:02 --> Severity: Warning --> Undefined variable $lembarSaham D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 121
ERROR - 2022-06-25 13:27:02 --> Query error: Column 'convert_lembar_saham' cannot be null - Invalid query: INSERT INTO `tb_transaksi_jual_beli` (`id_properti`, `email`, `lembar_saham`, `harga_saham`, `order_saham`, `status`, `keterangan`, `create_date`, `modified_date`, `convert_lembar_saham`) VALUES ('35', 'izulluzi@yahoo.com', '2', '1000', 1, 'Parsial Match', 'jual', '2022-06-25 13:27:02', '2022-06-25 13:27:02', NULL)
ERROR - 2022-06-25 13:27:20 --> Severity: Warning --> Undefined variable $lembarSaham D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 121
ERROR - 2022-06-25 13:27:20 --> Query error: Column 'convert_lembar_saham' cannot be null - Invalid query: INSERT INTO `tb_transaksi_jual_beli` (`id_properti`, `email`, `lembar_saham`, `harga_saham`, `order_saham`, `status`, `keterangan`, `create_date`, `modified_date`, `convert_lembar_saham`) VALUES ('35', 'izulluzi@yahoo.com', '2', '1000', 1, 'Parsial Match', 'jual', '2022-06-25 13:27:20', '2022-06-25 13:27:20', NULL)
ERROR - 2022-06-25 13:27:29 --> Severity: Warning --> Undefined variable $lembarSaham D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 121
ERROR - 2022-06-25 13:27:29 --> Query error: Column 'convert_lembar_saham' cannot be null - Invalid query: INSERT INTO `tb_transaksi_jual_beli` (`id_properti`, `email`, `lembar_saham`, `harga_saham`, `order_saham`, `status`, `keterangan`, `create_date`, `modified_date`, `convert_lembar_saham`) VALUES ('35', 'izulluzi@yahoo.com', '2', '1000', 1, 'Parsial Match', 'jual', '2022-06-25 13:27:29', '2022-06-25 13:27:29', NULL)
ERROR - 2022-06-25 13:27:56 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:27:56 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:27:56 --> 404 Page Not Found: /index
ERROR - 2022-06-25 13:29:19 --> Severity: error --> Exception: syntax error, unexpected double-quote mark, expecting ")" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 184
ERROR - 2022-06-25 13:29:19 --> Severity: error --> Exception: syntax error, unexpected double-quote mark, expecting ")" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 184
ERROR - 2022-06-25 13:52:49 --> Severity: error --> Exception: syntax error, unexpected token "echo" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 128
ERROR - 2022-06-25 13:52:49 --> Severity: error --> Exception: syntax error, unexpected token "echo" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 128
ERROR - 2022-06-25 13:52:49 --> Severity: error --> Exception: syntax error, unexpected token "echo" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 128
ERROR - 2022-06-25 13:52:49 --> Severity: error --> Exception: syntax error, unexpected token "echo" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 128
ERROR - 2022-06-25 14:03:37 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:04:28 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:04:31 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:04:37 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:04:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:04:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:04:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:04:39 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:04:41 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:05:11 --> 404 Page Not Found: ../modules/transaksi/controllers/Transaksi_Antar_Pemodal_Detail/ConvertBuySell
ERROR - 2022-06-25 14:26:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:26:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:26:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:26:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:26:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:26:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 14:30:00 --> Severity: error --> Exception: Undefined constant "lembarSahamJual" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 682
ERROR - 2022-06-25 14:30:00 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 16:35:42 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 16:35:43 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 16:35:51 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 16:35:51 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 16:35:51 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 16:35:51 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 16:36:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:36:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:36:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:38:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:38:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:38:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:39:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:39:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:39:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:53:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:53:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:53:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:54:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:54:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:54:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:54:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:54:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:54:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '3' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:55:08 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:55:08 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:55:08 --> 404 Page Not Found: /index
ERROR - 2022-06-25 16:55:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '3' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:55:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:55:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:56:00 --> Query error: Column 'id_properti' cannot be null - Invalid query: INSERT INTO `tb_transaksi_jual_beli` (`id_properti`, `email`, `lembar_saham`, `harga_saham`, `order_saham`, `status`, `keterangan`, `create_date`, `modified_date`, `convert_lembar_saham`) VALUES (NULL, 'izulluzi@yahoo.com', NULL, NULL, 1, 'Pending', NULL, '2022-06-25 16:56:00', '2022-06-25 16:56:00', NULL)
ERROR - 2022-06-25 16:56:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:57:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 16:57:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:01:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '3' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:01:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:01:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:01:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:01:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:05:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:05:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:05:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:06:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:06:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:06:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:06:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:06:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '201' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:06:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:06:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '3' where id = '201' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:06:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_sell_buy = '0' where id = '201' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:13:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '0' where id = '0' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:13:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '0' where id = '207' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:13:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '30' where id = '207' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:13:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:13:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:13:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:14:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '30' where id = '207' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:14:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '0' where id = '0' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:14:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '0' where id = '207' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:14:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= 'izulluzi@yahoo.com'' at line 1 - Invalid query: update tb_transaksi_jual_beli set status = 'Pending',convert_lembar_saham = '0' where id = '207' and email == 'izulluzi@yahoo.com'
ERROR - 2022-06-25 17:18:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:18:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:18:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:18:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:18:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:18:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:23:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:24:00 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:24:00 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:24:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:24:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:24:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:25:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:25:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:25:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:26:01 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:26:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:26:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:27:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:27:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:27:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:28:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:28:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:28:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:28:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:28:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:28:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:29:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:29:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:29:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:31:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:31:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:31:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:35:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:35:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:35:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:36:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:36:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:36:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:34 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:34 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:34 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:50 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:50 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:50 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:43:58 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:44:07 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:44:07 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:44:07 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:45:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:45:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:45:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:47:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:47:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 17:47:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:06:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:06:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:06:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:06:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:06:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:06:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:10:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:10:11 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:10:11 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:16:43 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:16:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:16:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:20:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:20:51 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:20:51 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:27:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:27:56 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:27:56 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:29 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:45 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:47 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:47 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:36:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:37:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:37:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:37:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:38:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:38:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:38:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:41:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:41:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:41:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:41:29 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:41:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:41:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:43:08 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:43:08 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:43:08 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:44:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:44:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:44:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:44:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:44:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:44:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:47:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:47:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:47:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:47:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:47:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:47:54 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:52:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:52:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:52:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:54:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:54:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:54:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:54:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:54:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:54:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:21 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:23 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:23 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:23 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:57:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:58:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:58:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:58:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:59:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:59:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 18:59:05 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:01:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:01:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:01:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:02:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:02:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:02:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:02:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:02:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:02:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:04:29 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:04:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:04:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:07:14 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:07:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:07:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:08:36 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:08:36 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:08:36 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:08:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:08:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:08:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:28 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:28 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:28 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:47 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:47 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:47 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:57 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:57 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:09:57 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:11:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:11:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:11:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:11:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:11:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:11:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:35:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:35:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:35:52 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:28 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:28 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:28 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:42 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:42 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:42 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:36:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:10 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:10 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:16 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:16 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:16 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:37:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:41:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:41:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:41:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:42:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:42:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 19:42:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:03:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:03:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:03:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:12 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:04:13 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:00 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:00 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:00 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:21 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 20:45:21 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 20:45:21 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 20:45:21 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 20:45:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:36 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:36 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:41 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:41 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:45:41 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:48:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:48:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:48:40 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:53:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:53:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:53:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:55:06 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:55:06 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:55:06 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:55:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:55:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:55:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:56:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:56:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:56:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:57:34 --> Severity: error --> Exception: syntax error, unexpected token "/" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 115
ERROR - 2022-06-25 20:57:34 --> Severity: error --> Exception: syntax error, unexpected token "/" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 115
ERROR - 2022-06-25 20:57:34 --> Severity: error --> Exception: syntax error, unexpected token "/" D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\controllers\Transaksi_Antar_Pemodal_Detail.php 115
ERROR - 2022-06-25 20:58:43 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:58:43 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:58:43 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:59:00 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 20:59:00 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 20:59:00 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 20:59:00 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 20:59:28 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 20:59:28 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 20:59:28 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 20:59:28 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 20:59:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:59:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:59:48 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:59:57 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:59:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 20:59:59 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:00:20 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:00:20 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:00:20 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:00:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:00:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:00:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:01:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:01:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:01:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:16 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:18 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:18 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:26 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:27 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:27 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:39 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:03:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:04:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:04:50 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:04:50 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:05:01 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:05:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:05:03 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:07:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:07:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:07:46 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:08:54 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 21:08:54 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 21:08:54 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 21:08:54 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 21:14:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:14:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:14:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:16:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:16:11 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:16:11 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:17:20 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:17:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:17:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:19:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:19:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:19:31 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:24:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:24:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:24:09 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:27:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:27:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:27:49 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:31:25 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:31:25 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:31:25 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:31:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:31:34 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:31:34 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:32:42 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:32:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:32:44 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:33:35 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:33:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:33:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:20 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:22 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:25 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:27 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:27 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:37 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:42 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:34:58 --> Severity: Warning --> Undefined variable $dana_saat_ini D:\Sance\Xampp10\htdocs\crowfunding_landing\application\views\other\header_landing.php 479
ERROR - 2022-06-25 21:34:58 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 477
ERROR - 2022-06-25 21:34:58 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 498
ERROR - 2022-06-25 21:34:58 --> Severity: Warning --> Attempt to read property "saldo" on null D:\Sance\Xampp10\htdocs\crowfunding_landing\application\modules\transaksi\views\Transaksi_Antar_Pemodal_Detail.php 500
ERROR - 2022-06-25 21:35:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:35:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:35:19 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:37:30 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:37:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:37:32 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:45:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:45:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:45:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:46:23 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:46:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:46:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:46:36 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:46:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:46:38 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:55:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:55:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:55:24 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:58:04 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:58:06 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:58:06 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:58:15 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:58:17 --> 404 Page Not Found: /index
ERROR - 2022-06-25 21:58:17 --> 404 Page Not Found: /index
