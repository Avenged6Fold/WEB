<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
<<<<<<< HEAD
Config::$serverKey = 'SB-Mid-server-WAynVo6MB-VqCP4859Ra067G';
=======
Config::$serverKey = '<your server key>';
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
}
catch (\Exception $e) {
    exit($e->getMessage());
}

$notif = $notif->getResponse();
$transaction = $notif->transaction_status;
<<<<<<< HEAD
$transaction_id = $notif->transaction_id;

=======
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

<<<<<<< HEAD
if ($transaction == 'settlement') {
    
   include "db.php";
   mysqli_query($conn,"update pemesanan set transaction_status='3' , transaction_id='$transaction_id' where order_id='$order_id'");
   
   

    
} else if ($transaction == 'pending') {
       include "db.php";
   mysqli_query($conn,"update pemesanan set transaction_status='2' where order_id='$order_id'");
 
} else if ($transaction == 'deny') {
      include "db.php";
   mysqli_query($conn,"update pemesanan set transaction_status='1' where order_id='$order_id'");
 
    
} else if ($transaction == 'expire') {
       include "db.php";
   mysqli_query($conn,"update pemesanan set transaction_status='1' where order_id='$order_id'");
 
      
} else if ($transaction == 'cancel') {
     include "db.php";
   mysqli_query($conn,"update pemesanan set transaction_status='1' where order_id='$order_id'");
 
=======
if ($transaction == 'capture') {
    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            echo "Transaction order_id: " . $order_id ." is challenged by FDS";
        } else {
            // TODO set payment status in merchant's database to 'Success'
            echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
        }
    }
} else if ($transaction == 'settlement') {
    // TODO set payment status in merchant's database to 'Settlement'
    echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
} else if ($transaction == 'pending') {
    // TODO set payment status in merchant's database to 'Pending'
    echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
} else if ($transaction == 'deny') {
    // TODO set payment status in merchant's database to 'Denied'
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'expire') {
    // TODO set payment status in merchant's database to 'expire'
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel') {
    // TODO set payment status in merchant's database to 'Denied'
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
}

function printExampleWarningMessage() {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
<<<<<<< HEAD
        echo htmlspecialchars('Config::$serverKey = \'<Server Key>\';');
=======
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
>>>>>>> a6d1d7fb59b49c614209c67b9cee60e1e520f41d
        die();
    }   
}
