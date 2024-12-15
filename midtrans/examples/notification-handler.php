<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '/../Midtrans.php';

Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-WAynVo6MB-VqCP4859Ra067G';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
} catch (\Exception $e) {
    exit($e->getMessage());
}

// Mengambil data dari notifikasi
$notifResponse = $notif;
$transaction = $notifResponse->transaction_status;
$transaction_id = $notifResponse->transaction_id;

$type = $notifResponse->payment_type;
$order_id = $notifResponse->order_id;
$fraud = $notifResponse->fraud_status;

// Proses status transaksi
include "db.php";
if ($transaction == 'settlement') {
    mysqli_query($conn, "UPDATE pemesanan SET transaction_status='3', transaction_id='$transaction_id' WHERE order_id='$order_id'");
} else if ($transaction == 'pending') {
    mysqli_query($conn, "UPDATE pemesanan SET transaction_status='2' WHERE order_id='$order_id'");
} else if ($transaction == 'deny') {
    mysqli_query($conn, "UPDATE pemesanan SET transaction_status='1' WHERE order_id='$order_id'");
} else if ($transaction == 'expire') {
    mysqli_query($conn, "UPDATE pemesanan SET transaction_status='1' WHERE order_id='$order_id'");
} else if ($transaction == 'cancel') {
    mysqli_query($conn, "UPDATE pemesanan SET transaction_status='1' WHERE order_id='$order_id'");
}

function printExampleWarningMessage() {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<Server Key>\';');
        die();
    }
}
