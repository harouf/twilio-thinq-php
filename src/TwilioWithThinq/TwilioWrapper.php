<?php
namespace TwilioWithThinq;
require_once __DIR__ . '/../../vendor/autoload.php'; // Loads the library

class TwilioWrapper {
    private $client;
    private $customer_number;
    private $twilio_account_sid;
    private $twilio_account_token;
    private $twilio_phone_number;

    const TWIML_RESOURCE_URL = "http://cris.viralearnings.com/twiml/get_response";

    function __construct($customer_number, $twilio_account_sid, $twilio_account_token, $twilio_phone_number){
        $this->customer_number = $customer_number;
        $this->twilio_account_sid = $twilio_account_sid;
        $this->twilio_account_token = $twilio_account_token;
        $this->twilio_phone_number = $twilio_phone_number;

        $this->client = new Services_Twilio($twilio_account_sid, $twilio_account_token);        
    }

    public function isClientValid(){
        return $this->client != null && $this->client->account != null;
    }

    public function call()
    {
        if(!$this->isClientValid()) {
            return "Invalid Twilio Account details.";
        }

        try{
            $call = $this->client->account->calls->create($this->twilio_phone_number, $this->customer_number, self::TWIML_RESOURCE_URL, array());
            return $call->sid;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}