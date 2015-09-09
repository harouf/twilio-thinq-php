<?php
/**
 * Created by PhpStorm.
 * User: Fujio Harou
 * Date: 8/16/15
 * Time: 6:21 AM
 */

require_once __DIR__ . '/../vendor/autoload.php'; 
use TwilioWithThinq\TwilioWrapper as TwilioWrapper;

//$customer_phone_no = $_REQUEST['customer_phone_no'];
$customer_phone_no = '+8613130511523';

if(!empty($customer_phone_no)){
    $obj = new TwilioWrapper(
        $customer_phone_no,                             // Customer phone number
        //'+1234567890',
        'ACa5a21802beff96f147d40bf98c957038',           // twilio account sid  
        '7852c807435af28d468344ca57a49d2a',            // twilio account token
        '+1 754-333-6811'                               // twilio phone number
    );
    echo "Call sid: ". $obj->call();
}

?>