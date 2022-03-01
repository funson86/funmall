<?php

use yii\db\Migration;

class m130524_201899_mall_demo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $sql = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'mall_demo.sql');

        $this->execute($sql);
    }

    public function down()
    {
        $sql = "
SET FOREIGN_KEY_CHECKS=0;

TRUNCATE TABLE `fb_mall_address`;
TRUNCATE TABLE `fb_mall_brand`;
TRUNCATE TABLE `fb_mall_vendor`;
TRUNCATE TABLE `fb_mall_tag`;
TRUNCATE TABLE `fb_mall_category`;
TRUNCATE TABLE `fb_mall_attribute`;
TRUNCATE TABLE `fb_mall_attribute_item`;
TRUNCATE TABLE `fb_mall_attribute_set`;
TRUNCATE TABLE `fb_mall_attribute_set_attribute`;
TRUNCATE TABLE `fb_mall_product`;
TRUNCATE TABLE `fb_mall_product_sku`;
TRUNCATE TABLE `fb_mall_product_attribute_item_label`;
TRUNCATE TABLE `fb_mall_product_tag`;
TRUNCATE TABLE `fb_mall_cart`;
TRUNCATE TABLE `fb_mall_review`;
TRUNCATE TABLE `fb_mall_consultation`;
TRUNCATE TABLE `fb_mall_favorite`;
TRUNCATE TABLE `fb_mall_coupon_type`;
TRUNCATE TABLE `fb_mall_coupon`;
TRUNCATE TABLE `fb_mall_order`;
TRUNCATE TABLE `fb_mall_order_product`;
TRUNCATE TABLE `fb_mall_param`;
TRUNCATE TABLE `fb_mall_product_param`;
TRUNCATE TABLE `fb_mall_refund`;
TRUNCATE TABLE `fb_mall_invoice`;
TRUNCATE TABLE `fb_mall_order_log`;
TRUNCATE TABLE `fb_mall_point_log`;



delete from `fb_base_setting` where store_id = 5;
delete from `fb_base_lang` where store_id = 5;

SET FOREIGN_KEY_CHECKS=0;
        ";
        $this->execute($sql);
    }
}
