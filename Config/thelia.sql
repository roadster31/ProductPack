
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- product_pack
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product_pack`;

CREATE TABLE `product_pack`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `position` INTEGER DEFAULT 1 NOT NULL,
    `host_product_id` INTEGER NOT NULL,
    `product_id` INTEGER NOT NULL,
    `quantity` INTEGER DEFAULT 1 NOT NULL,
    `price` DECIMAL(16,6) DEFAULT 0.000000 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `FI_product_pack_produit_host_product_id` (`host_product_id`),
    INDEX `FI_product_pack_produit_product_id` (`product_id`),
    CONSTRAINT `fk_product_pack_produit_host_product_id`
        FOREIGN KEY (`host_product_id`)
        REFERENCES `product` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `fk_product_pack_produit_product_id`
        FOREIGN KEY (`product_id`)
        REFERENCES `product` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- product_pack_order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product_pack_order`;

CREATE TABLE `product_pack_order`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_product_id` INTEGER NOT NULL,
    `description` LONGTEXT,
    PRIMARY KEY (`id`),
    INDEX `idx_product_pack_order_order_product_id` (`order_product_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
