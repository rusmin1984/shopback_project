<?php

namespace Library;

include __DIR__ . '/../../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

class ShopbackLib
{
    public function __construct()
    {

    }

    public function awardCashback($amount = array()){
        $finalResult = 0;
        $moreThan10 = FALSE;
        $moreThan20 = FALSE;
        $moreThan50 = FALSE;
        foreach($amount as $row){
            if($row >= 10){
                $moreThan10 = TRUE;
                if($row >= 20){
                    $moreThan20 = TRUE;
                    if($row >= 50){
                        $moreThan50 = TRUE;
                    }else{
                        $moreThan50 = FALSE;
                    }
                }else{
                    $moreThan20 = FALSE;
                    $moreThan50 = FALSE;
                }
            }else{
                $moreThan20 = FALSE;
                $moreThan50 = FALSE;
            }
        }

        /**
         * ToDo : Getting the Highest Amount
         */
        rsort($amount);

        $highest = $amount[0];

        if($moreThan10){
            $finalResult = $highest * 0.1;
            if($moreThan20){
                $finalResult = $highest * 0.15;
                if($moreThan50){
                    $finalResult = $highest * 0.2;
                }
            }
        }

        /**
         * ToDo : award 5% of the highest as cashback
         */
        return ($finalResult > 5)? 5:\FormHelper::numberFormat($finalResult);

    }

}