<?php
$shopier_secret_key = "";

$status = $_POST["status"];
$invoiceId = $_POST["platform_order_id"];
$transactionId = $_POST["payment_id"];
$installment = $_POST["installment"];
$signature = $_POST["signature"];


$data = $_POST["random_nr"] . $_POST["platform_order_id"] . $_POST["total_order_value"] . $_POST["currency"];
$signature = base64_decode($signature);
$expected = hash_hmac('SHA256', $data, $shopier_secret_key, true);
if ($signature == $expected) {
    $status = strtolower($status);

    if ($status == "success") {
        print_r(json_encode(array("payment_amount" => $_POST["total_order_value"], "merchant_oid" => $_POST['platform_order_id'], "log" => $_POST)));
    } else {
        print_r(json_encode(array("error" => "This payment is failed!", "log" => $_POST)));
    }

} else {
    print(json_encode(array("error" => "Did not come the post data!")));
}
?>
