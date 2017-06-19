<?php

use \Phalcon\Cli\Task;

class MainTask extends Task
{
    protected $signupData;

    public function initialize()
    {
        $this->signupData = array(
            'www.shopback.sg' =>
                array(
                    'currency_alias' => 'SGD',
                    'value' => 5,
                    'redirect_url' => 'http://www.shopback.sg'
                ),
            'www.shopback.my' =>
                array(
                    'currency_alias' => 'MYR',
                    'value' => 10,
                    'redirect_url' => 'http://www.shopback.my'
                ),
            'www.shopback.co.id' =>
                array(
                    'currency_alias' => 'IDR',
                    'value' => 25000,
                    'redirect_url' => 'http://www.shopback.co.id'
                ),
            'www.shopback.com.tw' =>
                array(
                    'currency_alias' => 'TWD',
                    'value' => 1000,
                    'redirect_url' => 'http://www.shopback.com.tw'
                ),
            'www.myshopback.co.th' =>
                array(
                    'currency_alias' => 'THB',
                    'value' => 500,
                    'redirect_url' => 'http://www.myshopback.co.th'
                ),
            'www.myshopback.com' =>
                array(
                    'currency_alias' => 'USD',
                    'value' => 5,
                    'redirect_url' => 'http://www.myshopback.com'
                )
        );
    }

    public function mainAction()
    {

    }
}