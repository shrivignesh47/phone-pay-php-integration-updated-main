<?php

define("BASE_URL", "http://localhost/ppay/");
define("API_STATUS", "UAT"); //LIVE OR UAT
define("MERCHANTIDLIVE", "999999");
define("MERCHANTIDUAT", "M22T6NWEV1X8R");  //Sandbox testing
define("SALTKEYLIVE", "");
define("SALTKEYUAT", "bf5622f5-16e6-4f3d-bc2c-96588f33310b");
define("SALTINDEX", "1");
define("REDIRECTURL", "paymentstatus.php");
define("SUCCESSURL", "success.php");
define("FAILUREURL", "failure.php");
define("UATURLPAY", "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay");
define("LIVEURLPAY", "https://api.phonepe.com/apis/hermes/pg/v1/pay");
define("STATUSCHECKURL", "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/");
define("LIVESTATUSCHECKURL", "https://api.phonepe.com/apis/hermes/pg/v1/status/");
