<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class RedeemTask extends MainTask
{
    private $log_redeem;

    public function initialize()
    {
        parent::initialize();
        $this->log_redeem = new Logger("Shopback Redeem");
        $this->log_redeem->pushHandler(new StreamHandler($_ENV['MONO_LOG']."shopback_redeem.log", Logger::INFO ));
    }

    public function indexAction($params){
        if(isset($this->signupData[$params[0]])){
            $result = "Visit ".$this->signupData[$params[0]]['redirect_url']." to start earning cashback!";
        }else{
            $result= "No Found Data Redeem";
        }

        echo $result;
        $this->log_redeem->addInfo($result);

    }

}