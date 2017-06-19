# SHOPBACK BATCHPROCESSOR #

ENV File

    ;PATH
    MONO_LOG = ..\logs\

Vendor
- including monolog, env

Logs :
- including spend, redeem, signup logs

Apps :

* Helper : 
    - FormHelper, including rounded 2 decimal places

* Library :
    - shopbackLib, including Award Cashback calculation function, that can be used by another task 
* Task :
    - including spend, redeem, signup task