<?php
include 'includeshopier.php';

$api_key = "";
$api_secret = "";

$order_rand_id = rand();
$order_id = $order_rand_id;
$order_oid = $order_rand_id;
$order_total = "1";

$product_name = "Ürün Adı";

$customer_first_name = "Barış";
$customer_last_name = "Zıbahalat Mofrad";
$customer_email = "vastus.work@gmail.com";
$customer_phone = "5383544058";

$billing_address = "şişli merkez";
$billing_city = "istanbul";

$shopier = new Shopier($api_key, $api_secret);
$shopier->setBuyer([
'id' => $order_id,
'paket' => $product_name,
'first_name' => $customer_first_name, 'last_name' => $customer_last_name, 'email' => $customer_email, 'phone' => $customer_phone]); // Kullanıcının ad, soyad, telefon, email bilgileri
$shopier->setOrderBilling([
'billing_address' => $billing_address,
'billing_city' => $billing_city,
'billing_country' => 'Türkiye',
'billing_postcode' => '34000',
]);
$shopier->setOrderShipping([
'shipping_address' => $billing_address,
'shipping_city' => $billing_city,
'shipping_country' => 'Türkiye',
'shipping_postcode' => '34000',
]);
die($shopier->run($order_oid, $order_total, $_SERVER['HTTP_HOST'] . '/callback/shopier'));

