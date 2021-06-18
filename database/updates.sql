alter table tbl_product add column Colors text;
ALTER TABLE `tbl_product` CHANGE `Colors` `Colors` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL AFTER `Sizes`;