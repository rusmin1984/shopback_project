<?php

//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;

class SpendTask extends MainTask
{
    //private $log_spend;

    public function initialize()
    {
        parent::initialize();
        //$this->log_spend = new Logger("Shopback Spend");
        //$this->log_spend->pushHandler(new StreamHandler($_ENV['MONO_LOG']."shopback_spend.log", Logger::INFO ));
    }

    public function indexAction($params){
        $shopbackLib = new \Library\ShopbackLib();
        $finalCashback = $shopbackLib->awardCashback($params);

        /**
         * ToDo : show final result by rounded to 2 decimal places
         */
        if($finalCashback > 0){
            $result = "Award Cashback: ".\FormHelper::numberFormat($finalCashback);
        }else{
            $result = "No cashback";
        }

        echo $result;
        //$this->log_spend->addInfo($result);
    }

}