<?php

class FormHelper
{

    static function numberFormat($value = 0){
        return number_format($value,2,".",",");
    }

    static function currencyFormat($value = 0){
        return number_format($value,2,",",".");
    }
}


