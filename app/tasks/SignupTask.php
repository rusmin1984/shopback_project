<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class SignupTask extends MainTask
{
    private $log_signup;

    public function initialize()
    {
        parent::initialize();
        $this->log_signup = new Logger("Shopback Signup");
        $this->log_signup->pushHandler(new StreamHandler($_ENV['MONO_LOG']."shopback_signup.log", Logger::INFO ));

    }

    public function indexAction($params){
        $result = "";
        if(isset($this->signupData[$params[0]])){
            $result = "Award bonus: ".\FormHelper::numberFormat($this->signupData[$params[0]]['value'])." ".$this->signupData[$params[0]]['currency_alias'];
        }else{
            $result = "No Award Bonus";
        }

        echo $result;
        $this->log_signup->addInfo($result);
    }

}